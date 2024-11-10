<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CHECKS_Subjects_Model extends Model
{
    public function fetch_checks_subjects(Request $request)
    {
        $userId = 1;
        $subject_search = $request->get('search');

        $checksSubjects = DB::table('tbl_subject_taught as st')
        ->select(
            'st.ID',
            'st.CODE',
            'st.Description',
            'st.No_fields'
        )
        ->where('st.user_ID', $userId)
        ->where(function($query) use ($subject_search) {
                if (!empty($subject_search)) {
                    $query->where('st.CODE', 'like', '%'.$subject_search.'%');
                    $query->where('st.Description', 'like', '%'.$subject_search.'%');
                }
            }
        )
        ->whereIn('st.status', ['Active', 'inactive'])
        ->get();
        return $checksSubjects;
    }

    public function save_checks_subjects(Request $request)
    {
        $date = now();
        $status = "Active";
        $userId = 1;

        try {
            $heiId = DB::table('users')->where('ID', $userId)->value('Hei_ID');

            if (!$heiId) {
                throw new \Exception('Hei_ID not found for the given user_ID.');
            }
            $existingRecord = DB::table('tbl_subject_taught')
                ->where('CODE', $request->CODE)
                ->where('Description', $request->Description)
                ->where('user_ID', $userId)
                ->whereIn('status', ['Deleted', 'Active'])
                ->first();

            if ($existingRecord) {
                $status = "Modified";

                $result = DB::update("UPDATE `tbl_subject_taught`
                    SET `CODE` =?, `Description` =?, `No_fields` =?, `status` =?, `created_at` =?, `user_ID` =?, `Hei_ID` =?
                    WHERE `ID` =?",
                    [
                        $request->CODE,
                        $request->Description,
                        $request->No_fields,
                        $status,
                        $date,
                        $userId,
                        $heiId,
                        $existingRecord->ID
                    ]);
            } else {
                $result = DB::insert("INSERT INTO `tbl_subject_taught`(`CODE`, `Description`, `No_fields`, `status`, `created_at`, `user_ID`, `Hei_ID`)
                    VALUES (?,?,?,?,?,?,?)",
                    [
                        $request->CODE,
                        $request->Description,
                        $request->No_fields,
                        $status,
                        $date,
                        $userId,
                        $heiId
                    ]);
                return $result;
            }

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error saving checks PRC: ' . $e->getMessage());
            return false;
        }
    }

    public function delete_checks_subjects(Request $request)
    {
        $date = date("Y-m-d H:i:s");
        $result = DB::update("UPDATE `tbl_subject_taught`
        SET `status` = ?, `created_at` = ? WHERE `ID` = ?", ["Deleted", $date, $request->id]);
        return $result;
    }
}
