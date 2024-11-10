<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ListOfGraduatesImport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CHECKS_PRC_Model extends Model
{
    public function fetch_checks_prc(Request $request)
    {
        $userId = 1;
        $perPage = 10;
        $prc_search = $request->get('search');
        $sortby = $request->get('sortby') ?? 'full_name';
        $sorttype = $request->get('sorttype') ?? 'asc';
        $program_level = $request->get('program_level');

        $checksPRC = DB::table('tbl_checks_list_of_graduates as prc')
            ->select(
                'prc.ID',
                'prc.AY',
                'prc.Student_ID',
                'prc.Date_of_birth',
                DB::raw("CONCAT(prc.Last_name, ', ', prc.First_name, ' ', prc.Middle_name) as full_name"),
                'prc.Sex',
                'prc.Date_graduated',
                'programs.Level',
                'programs.Program',
                'programs.Major',
                'cluster.Cluster',
                'psced.CODE as psced_code'
            )
            ->where('prc.user_ID', $userId)
            ->leftJoin('users as user', 'prc.user_ID', '=', 'user.ID')
            ->leftJoin('hei as institute', 'prc.Hei_ID', '=', 'institute.ID')
            ->leftJoin('tbl_program as programs', 'prc.Program_ID', '=', 'programs.ID')
            ->leftJoin('program_cluster as cluster', 'programs.Cluster_ID', '=', 'cluster.ID')
            ->leftJoin('tbl_psced as psced', 'programs.PSCED_ID', '=', 'psced.ID')
            ->where(function($query) use ($prc_search) {
                if (!empty($prc_search)) {
                    $query->where('prc.Student_ID', 'like', '%'.$prc_search.'%')
                        ->orWhere(DB::raw("CONCAT(prc.Last_name, ', ', prc.First_name, ' ', prc.Middle_name)"), 'like', '%'.$prc_search.'%')
                        ->orWhere('programs.Level', 'like', '%'.$prc_search.'%')
                        ->orWhere('programs.Program', 'like', '%'.$prc_search.'%')
                        ->orWhere('programs.Major', 'like', '%'.$prc_search.'%')
                        ->orWhere('cluster.Cluster', 'like', '%'.$prc_search.'%')
                        ->orWhere('psced.CODE', 'like', '%'.$prc_search.'%');
                }
            })
            ->when($program_level && $program_level !== 'All', function($query) use ($program_level) {
                $query->where('programs.Level', '=', $program_level);
            })
            ->whereIn('prc.status', ['Active', 'Modified'])
            ->orderBy($sortby, $sorttype)
            ->paginate($perPage);

        return $checksPRC;
    }

    public function save_checks_prc(Request $request)
    {
        $date = now();
        $status = "Active";
        $userId = 1;

        try {
            // Get Hei_ID based on user_ID
            $heiId = DB::table('users')->where('ID', $userId)->value('Hei_ID');

            if (!$heiId) {
                throw new \Exception('Hei_ID not found for the given user_ID.');
            }
            $existingRecord = DB::table('tbl_checks_list_of_graduates')
                ->where('First_name', $request->First_name)
                ->where('Last_name', $request->Last_name)
                ->where('Middle_name', $request->Middle_name)
                ->where('user_ID', $userId)
                ->whereIn('status', ['Deleted', 'Active'])
                ->first();

            if ($existingRecord) {
                $status = "Modified";

                $result = DB::update("UPDATE `tbl_checks_list_of_graduates`
                    SET `Student_ID` = ?, `Last_name` = ?, `First_name` = ?,
                        `Middle_name` = ?, `Date_of_birth` = ?, `Sex` = ?,
                        `Date_graduated` = ?, `AY` = ?, `Program_ID` = ?,
                        `status` = ?, `created_at` = ?, `user_ID` = ?, `Hei_ID` = ?
                    WHERE `ID` = ?",
                    [
                        $request->Student_ID, $request->Last_name, $request->First_name,
                        $request->Middle_name, $request->Date_of_birth, $request->Sex,
                        $request->Date_graduated, $request->AY, $request->Program_ID,
                        $status, $date, $userId, $heiId, $existingRecord->ID
                    ]);
            } else {
                $result = DB::insert("INSERT INTO `tbl_checks_list_of_graduates` (
                    `Student_ID`, `Date_of_birth`, `Last_name`, `First_name`,
                    `Middle_name`, `Sex`, `Date_graduated`, `AY`, `Program_ID`,
                    `user_ID`, `Hei_ID`, `status`, `created_at`
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
                [
                    $request->Student_ID, $request->Date_of_birth,
                    $request->Last_name, $request->First_name, $request->Middle_name,
                    $request->Sex, $request->Date_graduated, $request->AY,
                    $request->Program_ID, $userId, $heiId, $status, $date
                ]);
            }

            return $result;

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error saving checks PRC: ' . $e->getMessage());
            return false;
        }
    }

    public function checks_prc_details(Request $request)
    {
        $userId = 1;

        $checksPRC = DB::select(
            "SELECT
                prc.ID,
                prc.Student_ID,
                prc.Last_name,
                prc.First_name,
                prc.Middle_name,
                prc.Date_of_birth,
                prc.Sex,
                prc.Date_graduated,
                prc.AY,
                programs.ID as programs_ID,
                CONCAT(programs.between_type, ' ', programs.Major) AS Program_Major,
                prc.status
            FROM tbl_checks_list_of_graduates prc
            LEFT JOIN users user ON prc.user_ID = user.ID
            LEFT JOIN hei institute ON prc.Hei_ID = institute.ID
            LEFT JOIN tbl_program programs ON prc.Program_ID = programs.ID
            WHERE prc.status IN('Active', 'Modified')
            AND prc.user_ID = ?
            AND prc.ID = ?", [$userId, $request->id]
        );
        return $checksPRC;
    }

    public function update_checks_prc(Request $request)
    {
        $date = now();
        $status = "Modified";
        $userId = 1;

        try {
            $heiId = DB::table('users')->where('ID', $userId)->value('Hei_ID');

            if (!$heiId) {
                throw new \Exception('Hei_ID not found for the given user_ID.');
            }
            $result = DB::update("UPDATE `tbl_checks_list_of_graduates`
                SET `Student_ID` = ?, `Last_name` = ?, `First_name` = ?,
                    `Middle_name` = ?, `Date_of_birth` = ?, `Sex` = ?,
                    `Date_graduated` = ?, `AY` = ?, `Program_ID` = ?,
                    `status` = ?, `created_at` = ?, `user_ID` = ?, `Hei_ID` = ?
                WHERE `ID` = ?",
                [
                    $request->Student_ID, $request->Last_name, $request->First_name,
                    $request->Middle_name, $request->Date_of_birth, $request->Sex,
                    $request->Date_graduated, $request->AY, $request->Program_ID,
                    $status, $date, $userId, $heiId, $request->id
                ]);
            return $result;
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error saving checks PRC: ' . $e->getMessage());
            return false;
        }
    }

    public function delete_checks_prc(Request $request)
    {
        $date = date("Y-m-d H:i:s");
        $result = DB::update("UPDATE `tbl_checks_list_of_graduates`
        SET `status` = ?, `created_at`= ? WHERE `ID`= ?", ["Deleted", $date, $request->id]);
        return $result;
    }

    public function import_checks_prc(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new ListOfGraduatesImport, $request->file('file'));

            // Retrieve the imported data from the session
            $importedData = session('importedData', []);

            return response()->json(['success' => true, 'importedData' => $importedData]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Import Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Error during import: ' . $e->getMessage()], 500);
        }
    }

    public function fetch_hei($request)
    {
        $result = DB::select("SELECT * FROM hei");
        return $result;
    }

    public function fetch_program(Request $request)
    {
        $result = DB::select("SELECT
            ID,
            Program,
            CONCAT(between_type, ' ', Major) AS Program_Major
            FROM tbl_program");
        return $result;
    }

    public function fetch_cluster(Request $request)
    {
        $result = DB::select("SELECT * FROM program_cluster");
        return $result;
    }

    public function fetch_psced(Request $request)
    {
        $result = DB::select("SELECT * FROM tbl_psced");
        return $result;
    }
}
