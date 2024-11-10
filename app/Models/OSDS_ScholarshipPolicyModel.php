<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class OSDS_ScholarshipPolicyModel extends Model
{
    public function fetch_policy(Request $request)
    {
        $result = DB::select("SELECT a.spolicy_id,a.ay,b.sp_id,b.scholarship_id,c.scholarship_code,
        b.code,b.scholarship_program,a.hei_type,a.min_grade,a.ongoing_min_grade,a.fund,a.amount_per_year,
        a.status,a.no_defernment,a.slots,b.stype_id
        FROM `cfsgas_admin_scholarship_policy` AS a 
        LEFT JOIN `csfgas_scholarship_programs` AS b ON a.sp_id = b.sp_id 
        LEFT JOIN `csfgas_scholarships` AS c ON b.scholarship_id = c.scholarship_id WHERE a.status IN('Active','Modified')");
        return $result;
    }

    public function fetch_policy_details(Request $request)
    {
        $result = DB::select("SELECT a.spolicy_id,a.ay,b.sp_id,b.scholarship_id,c.scholarship_code,
        b.code,b.scholarship_program,a.hei_type,a.min_grade,a.ongoing_min_grade,a.fund,a.amount_per_year,
        a.status,a.no_defernment,a.slots,b.stype_id
        FROM `cfsgas_admin_scholarship_policy` AS a 
        LEFT JOIN `csfgas_scholarship_programs` AS b ON a.sp_id = b.sp_id 
        LEFT JOIN `csfgas_scholarships` AS c ON b.scholarship_id = c.scholarship_id WHERE a.status IN('Active','Modified') and a.spolicy_id = ?", [$request->id]);
        return $result;
    }

    public function fetch_requirements(Request $request)
    {
        $result = DB::select("SELECT a.spolicy_id,a.requirements FROM `cfsgas_admin_requirements` AS a WHERE a.status ='Active' GROUP BY a.requirements ORDER BY a.requirements")::paginate(4);
        return $result;
    }

    public function save_scholarship_policy(Request $request)
    {
        $date =  date("Y-m-d H:i:s");
        $result = DB::Insert("Insert into `cfsgas_admin_scholarship_policy`(`sp_id`, 
                                                                            `ay`, 
                                                                            `hei_type`, 
                                                                            `no_defernment`, 
                                                                            `min_grade`, 
                                                                            `ongoing_min_grade`, 
                                                                            `fund`, 
                                                                            `amount_per_year`, 
                                                                            `slots`, 
                                                                            `date_created`,
                                                                            `status`, 
                                                                            `status_date`)
                                                                            values
                                                                            (?,?,?,?,?,?,?,?,?,?,?,?);",
                                                                            [$request->sp_id,
                                                                            $request->ay,
                                                                            $request->hei_type,
                                                                            $request->no_defernment,
                                                                            $request->min_grade,
                                                                            $request->ongoing_min_grade,
                                                                            $request->fund,
                                                                            $request->amount_per_year,
                                                                            $request->slots,
                                                                            $request->date_created,
                                                                            "Active",
                                                                            $date]);
        return $result;
    }

    public function update_scholarship_policy(Request $request)
    {
        $date =  date("Y-m-d H:i:s");
        $result = DB::Update("UPDATE `cfsgas_admin_scholarship_policy` SET `sp_id` = ?,  `ay` = ?, `hei_type` = ?, `no_defernment` = ?, `min_grade` = ?, `ongoing_min_grade` = ?, `fund` = ?, `amount_per_year` = ?, `slots` = ?, `date_created` = ?,  `status` = ?, `status_date` = ? WHERE `spolicy_id` = ? ;",
        [$request->sp_id, $request->ay, 
        $request->hei_type, $request->no_defernment, $request->min_grade, $request->ongoing_min_grade,
        $request->fund, $request->amount_per_year, $request->slots, $date, "Modified", $date, $request->spolicy_id]);
        return $result;
    }

    public function delete_scholarship_policy(Request $request)
    {
        $date =  date("Y-m-d H:i:s");
        $result = DB::Update("UPDATE `cfsgas_admin_scholarship_policy` AS a SET a.status = ?, a.status_date = ? WHERE a.spolicy_id = ?",
        ["Deleted", $date, $request->id]);
        return $result;
    }

}




