<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CHECKS_BC_Model extends Model

{

    public function fetch_checks_bc(Request $request, $programLevel = null)
    {
        $heiId = 1;

        $perPage = 10;
        $page = $request->get('page', 1);
        $search = $request->get('search', '');
        $offset = ($page - 1) * $perPage;

        $query = DB::table('gpr_level as gpr')
        ->select(
            'gpr.ID',
            'programs.BS_AB',
            'programs.Discipline',
            'gpr.Major',
            'gpr.GPR',
            'gpr.GP_GR_No',
            'gpr.Date'
        )
        ->leftJoin('program as programs', 'gpr.Program_ID', '=', 'programs.Course_ID')
        ->where('gpr.Hei_ID', $heiId);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('programs.BS_AB', 'like', "%$search%")
                ->orWhere('programs.Discipline', 'like', "%$search%")
                ->orWhere('gpr.Major', 'like', "%$search%")
                ->orWhere('gpr.GP_GR_No', 'like', "%$search%")
                ->orWhere('gpr.GPR', 'like', "%$search%")
                ->orWhere('gpr.Date', 'like', "%$search%");
            });
        }

        $checksBC = $query
            ->orderBy('programs.BS_AB','ASC')
            ->orderBy('programs.Discipline','ASC')
            ->orderBy('gpr.Major','ASC')
            ->get();

        if ($programLevel)
        {
            $query->where('gpr.BS_AB', '=', $programLevel);
        }

        $total = DB::table('gpr_level')->count();

        return [
            'data' => $checksBC,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $page,
            'lastPage' => ceil($total / $perPage),
        ];
    }

    public function fetch_checks_bc_details(Request $request)
    {
        //
    }

    public function save_checks_bc(Request $request)
    {
        $date = now();
        $userID = 1;
        try{
            $result = DB::insert("INSERT INTO `tbl_checks_e5` (
                `user_ID`, `hei_ID`, `middle_initial`, `ftpt_ID`, `member_type`, `gender`,
                `hda_ID`, `programcode_ID_1`, `programcode_ID_2`, `programcode_ID_3`,
                `programcode_ID_4`, `pl_ID`, `tenure`, `fr_ID`, `tl_ID`, `subject_taught`,
                `as_ID`, `status`, `created_at`
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $request->first_name, $request->last_name, $request->middle_initial,
                $request->ftpt_ID, $request->member_type, $request->gender, $request->hda_ID,
                $request->programcode_ID_1, $request->programcode_ID_2, $request->programcode_ID_3,
                $request->programcode_ID_4, $request->pl_ID, $request->tenure, $request->fr_ID,
                $request->tl_ID, $request->subject_taught, $request->as_ID, $date
            ]);

            return $result;

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error saving checks BC: ' .$e->getMessage());
            return false;
        }
    }

    public function update_checks_bc(Request $request)
    {
        $date = now();
        $status = "Modified";

        /*try {
            $result = DB::update(
                "UPDATE `tbl_checks_bc`
                SET `Hei_ID`,
                `hei_program`,

                "
            );
        }*/
    }

    /*public function delete_checks_bc(Request $request)
    {

    }*/

    public function fetch_program_with_code($id)
    {
        $result = DB::select('SELECT * FROM program_with_code');
        return $result;
    }

    public function fetch_gpr_level($id)
    {

        $result = DB::select('SELECT * FROM gpr_level');
        return $result;
    }

    public function fetch_hei($id)
    {
        $result = DB::select('SELECT * FROM hei');
        return $result;
    }

    public function fetch_users($id)
    {
        $result = DB::select('SELECT * FROM users');
        return $result;
    }

    public function fetch_program($id)
    {
        $result = DB::select('SELECT * FROM program');
        return $result;
    }
}
