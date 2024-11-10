<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CHECKS_E5_Model extends Model
{

    public function fetch_checks_e5(Request $request)
    {
        $userId = 1;
        // number of pagination
        $perPage = 10;
        // request data for search
        $e5_search = $request->get('search');
        $sortby = $request->get('sortby') ?? 'full_name';
        $sorttype = $request->get('sorttype') ?? 'asc';
        // request for filter
        $member_type = $request->get('member_type');

        $checksE5 = DB::table('tbl_checks_e5 as e5')
            ->select(
                'e5.ID',
                DB::raw("CONCAT(e5.last_name, ', ', e5.first_name, ' ', e5.middle_initial, '.') AS full_name"),
                'e5.image_url',
                'e5.gender',
                'ftpt.description AS ftpt_code',
                'hda.description AS hda_code',
                DB::raw("CONCAT(primary_teaching.Program, ' ', primary_teaching.Major) AS ptd_code")
            )
            ->where('e5.user_ID', $userId)
            ->leftJoin('tbl_checks_e5_ftpt as ftpt', 'e5.ftpt_ID', '=', 'ftpt.ID')
            ->leftJoin('tbl_checks_e5_hda as hda', 'e5.hda_ID', '=', 'hda.ID')
            ->leftJoin('tbl_program as primary_teaching', 'e5.programcode_ID_1', '=', 'primary_teaching.ID')
            ->where(function($query) use ($e5_search) {
                if (!empty($e5_search)) {
                    $query->where('ftpt.description', 'like', '%'.$e5_search.'%')
                    ->orWhere('hda.description', 'like', '%'.$e5_search.'%')
                    ->orWhere(DB::raw("CONCAT(e5.last_name, ', ', e5.first_name, ' ', e5.middle_initial, '.')"), 'like', '%'.$e5_search.'%')
                    ->orWhere(DB::raw("CONCAT(primary_teaching.Program, ' ', primary_teaching.Major)"), 'like', '%'.$e5_search.'%');
                }
            })
            ->when($member_type && $member_type !== 'All', function($query) use ($member_type) {
                $query->where('e5.member_type', '=', $member_type);
            })
            ->whereIn('e5.status', ['Active', 'Modified'])
            ->orderBy($sortby, $sorttype)
            ->paginate($perPage);

        return $checksE5;
    }

    public function fetch_checks_e5_details(Request $request)
    {
        $userId = 1;

        $checksE5 = DB::select(
            "SELECT
                e5.ID,
                e5.last_name,
                e5.first_name,
                e5.middle_initial,
                e5.member_type,
                e5.gender,
                ftpt.ID AS ftpt_code,
                hda.ID AS hda_code,
                primary_teaching.ID AS ptd_code,
                bachelor.ID AS bachelor_code,
                masters.ID AS masters_code,
                doctorate.ID AS doctorate_code,
                pl.ID AS pl_code,
                e5.tenure,
                fr.ID AS fr_code,
                tl.ID AS tl_code,
                e5.subject_taught,
                annual_salary.ID AS as_code,
                e5.status
            FROM tbl_checks_e5 e5
            JOIN tbl_checks_e5_ftpt ftpt ON e5.ftpt_ID = ftpt.ID
            JOIN tbl_checks_e5_hda hda ON e5.hda_ID = hda.ID
            JOIN tbl_program primary_teaching ON e5.programcode_ID_1 = primary_teaching.ID
            JOIN tbl_program bachelor ON e5.programcode_ID_2 = bachelor.ID
            JOIN tbl_program masters ON e5.programcode_ID_3 = masters.ID
            JOIN tbl_program doctorate ON e5.programcode_ID_4 = doctorate.ID
            JOIN tbl_checks_e5_prof_license pl ON e5.pl_ID = pl.ID
            JOIN tbl_checks_e5_faculty_rank fr ON e5.fr_ID = fr.ID
            JOIN tbl_checks_e5_teaching_load tl ON e5.tl_ID = tl.ID
            JOIN tbl_checks_e5_annual_salary annual_salary ON e5.as_ID = annual_salary.ID
            WHERE e5.status IN('Active', 'Modified')
            AND e5.user_ID = ?
            AND e5.ID = ?", [$userId, $request->id]
        );
        return $checksE5;
    }

    public function save_checks_e5(Request $request)
    {
        $date = now();
        $status = "Active";
        $userId = 1;

        try {
            $heiId = DB::table('users')->where('ID', $userId)->value('Hei_ID');

            if (!$heiId) {
                throw new \Exception('Hei_ID not found for the given user_ID.');
            }
            $existingRecord = DB::table('tbl_checks_e5')
                ->where('first_name', $request->first_name)
                ->where('last_name', $request->last_name)
                ->where('middle_initial', $request->middle_initial)
                ->where('user_ID', $userId)
                ->where('status', 'Deleted')
                ->first();

            if ($existingRecord) {
                $status = "Modified";

                $result = DB::update("UPDATE `tbl_checks_e5`
                    SET `first_name` = ?, `last_name` = ?, `middle_initial` = ?,
                        `ftpt_ID` = ?, `member_type` = ?, `gender` = ?, `hda_ID` = ?,
                        `programcode_ID_1` = ?, `programcode_ID_2` = ?, `programcode_ID_3` = ?,
                        `programcode_ID_4` = ?, `pl_ID` = ?, `tenure` = ?, `fr_ID` = ?,
                        `tl_ID` = ?, `subject_taught` = ?, `as_ID` = ?, `status` = ?,
                        `created_at` = ?, `user_ID` = ?, `Hei_ID` = ?
                    WHERE `ID` = ?",
                    [
                        $request->first_name, $request->last_name, $request->middle_initial,
                        $request->ftpt_ID, $request->member_type, $request->gender, $request->hda_ID,
                        $request->programcode_ID_1, $request->programcode_ID_2, $request->programcode_ID_3,
                        $request->programcode_ID_4, $request->pl_ID, $request->tenure, $request->fr_ID,
                        $request->tl_ID, $request->subject_taught, $request->as_ID, $status, $date,
                        $userId, $heiId, $existingRecord->ID
                    ]);

            } else {
                $result = DB::insert("INSERT INTO `tbl_checks_e5` (
                    `first_name`, `last_name`, `middle_initial`, `ftpt_ID`, `member_type`, `gender`,
                    `hda_ID`, `programcode_ID_1`, `programcode_ID_2`, `programcode_ID_3`,
                    `programcode_ID_4`, `pl_ID`, `tenure`, `fr_ID`, `tl_ID`, `subject_taught`,
                    `as_ID`, `status`, `created_at`, `user_ID`, `Hei_ID`
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
                [
                    $request->first_name, $request->last_name, $request->middle_initial,
                    $request->ftpt_ID, $request->member_type, $request->gender, $request->hda_ID,
                    $request->programcode_ID_1, $request->programcode_ID_2, $request->programcode_ID_3,
                    $request->programcode_ID_4, $request->pl_ID, $request->tenure, $request->fr_ID,
                    $request->tl_ID, $request->subject_taught, $request->as_ID, $status, $date,
                    $userId, $heiId
                ]);
            }

            if ($result) {
                return true;
            } else {
                throw new \Exception('Failed to save record.');
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error saving checks E5: ' . $e->getMessage());
            return false;
        }
    }



    public function update_checks_e5($data)
    {
        $date = now();
        $status = "Modified";
        $userId = 1;

        try {
            $heiId = DB::table('users')->where('ID', $userId)->value('Hei_ID');

            if (!$heiId) {
                throw new \Exception('Hei_ID not found for the given user_ID.');
            }

            $result = DB::update("UPDATE `tbl_checks_e5`
            SET `last_name` = ?,
                `first_name` = ?,
                `middle_initial` = ?,
                `ftpt_ID` = ?,
                `member_type` = ?,
                `gender` = ?,
                `hda_ID` = ?,
                `programcode_ID_1` = ?,
                `programcode_ID_2` = ?,
                `programcode_ID_3` = ?,
                `programcode_ID_4` = ?,
                `pl_ID` = ?,
                `tenure` = ?,
                `fr_ID` = ?,
                `tl_ID` = ?,
                `subject_taught` = ?,
                `as_ID` = ?,
                `status` = ?,
                `created_at` = ?,
                `user_ID` = ?,
                `Hei_ID` = ?
            WHERE `ID` = ?", [
                $data['last_name'],
                $data['first_name'],
                $data['middle_initial'],
                $data['ftpt_ID'],
                $data['member_type'],
                $data['gender'],
                $data['hda_ID'],
                $data['programcode_ID_1'],
                $data['programcode_ID_2'],
                $data['programcode_ID_3'],
                $data['programcode_ID_4'],
                $data['pl_ID'],
                $data['tenure'],
                $data['fr_ID'],
                $data['tl_ID'],
                $data['subject_taught'],
                $data['as_ID'],
                $status,
                $date,
                $userId,
                $heiId,
                $data['id']
            ]);

            return $result;
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error updating checks E5: ' . $e->getMessage());
            return false; // Return false on failure
        }
    }

    public function delete_checks_e5(Request $request)
    {
        $date = date("Y-m-d H:i:s");
        $result = DB::update("UPDATE `tbl_checks_e5`
        SET `status` = ?, `created_at`= ? WHERE `ID`= ?", ["Deleted", $date, $request->id]);
        return $result;
    }

    public function fetch_ftpt(Request $request)
    {
        $result = DB::select('SELECT * FROM tbl_checks_e5_ftpt');
        return $result;
    }

    public function fetch_annual_salary(Request $request)
    {
        $result = DB::select('SELECT * FROM tbl_checks_e5_annual_salary');
        return $result;
    }

    public function fetch_hda(Request $request)
    {
        $result = DB::select('SELECT * FROM tbl_checks_e5_hda');
        return $result;
    }

    public function fetch_faculty_rank(Request $request)
    {
        $result = DB::select('SELECT * FROM tbl_checks_e5_faculty_rank');
        return $result;
    }

    public function fetch_prof_license(Request $request)
    {
        $result = DB::select('SELECT * FROM tbl_checks_e5_prof_license');
        return $result;
    }

    public function fetch_teaching_load(Request $request)
    {
        $result = DB::select('SELECT * FROM tbl_checks_e5_teaching_load');
        return $result;
    }

    public function fetch_programs($id)
    {
        $result = DB::select('SELECT * FROM tbl_program');
        return $result;
    }
}
