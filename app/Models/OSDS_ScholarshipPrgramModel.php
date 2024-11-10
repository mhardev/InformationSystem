<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class OSDS_ScholarshipPrgramModel extends Model
{
    public function fetch_scholarship_program(Request $request)
    {
        $result = DB::select("SELECT a.sp_id,c.stype_id,c.code as 'stype_code', b.scholarship_id, b.scholarship_code, b.scholarship, a.code, a.scholarship_program 
        FROM `csfgas_scholarship_programs` AS a 
        LEFT JOIN `cfsgas_admin_scholarship_type` AS c ON a.stype_id = c.stype_id 
        LEFT JOIN `csfgas_scholarships` AS b ON a.scholarship_id = b.scholarship_id 
        WHERE a.status IN('Active','Modified') ORDER BY b.scholarship,a.scholarship_program;");
        return $result;
    }

    public function fetch_scholarship_program_details(Request $request)
    {
        $result = DB::select("SELECT a.sp_id,c.stype_id,c.code as 'stype_code', b.scholarship_id, b.scholarship_code, b.scholarship, a.code, a.scholarship_program 
        FROM `csfgas_scholarship_programs` AS a 
        LEFT JOIN `cfsgas_admin_scholarship_type` AS c ON a.stype_id = c.stype_id 
        LEFT JOIN `csfgas_scholarships` AS b ON a.scholarship_id = b.scholarship_id 
        WHERE a.status IN('Active','Modified') and a.sp_id = ? ORDER BY b.scholarship,a.scholarship_program ", [$request->id]);
        return $result;
    }

    public function save_scholarship_program(Request $request)
    {
        $date =  date("Y-m-d H:i:s");
        $result = DB::Insert("INSERT INTO `csfgas_scholarship_programs` (`scholarship_id`, `stype_id`,  `code`, `scholarship_program`, `status`,  `status_date`)
                                            VALUES(?,?,?,?,?,?)",[$request->scholarship_id,
                                                                    $request->stype_id,
                                                                    $request->scholarship_code,
                                                                    $request->scholarship_program,
                                                                    "Active",
                                                                    $date]);
        return $result;
    }

    public function delete_scholarship_program(Request $request)
    {
        $date =  date("Y-m-d H:i:s");
        $result = DB::Update("UPDATE `csfgas_scholarship_programs` AS a SET a.status = ?, a.status_date = ? WHERE a.sp_id = ?",
        ["Deleted", $date, $request->id]);
        return $result;
    }

    public function update_scholarship_program(Request $request)
    {
        $date =  date("Y-m-d H:i:s");
        $result = DB::Update("UPDATE `csfgas_scholarship_programs` SET  `scholarship_id` = ?, `stype_id` = ?, `code` = ?, `scholarship_program` = ?, `status` = ?, `status_date` = ? WHERE `sp_id` = ? ;",
        [$request->scholarship_id, $request->stype_id, 
        $request->scholarship_code, $request->scholarship_program, "Modified", $date, $request->sp_id]);
        return $result;
    }

}