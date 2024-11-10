<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class OSDS_SlotsDistributionModel extends Model
{
    public function fetch_slots_distribution(Request $request)
    {
        $result = DB::select("SELECT a.slot_id,a.sp_id,a.ay,c.region_id,c.region,b.scholarship_id,b.scholarship,SUM(a.slot) AS 'slots' FROM `cfsgas_admin_slot` AS a
        LEFT JOIN `csfgas_scholarships` AS b ON a.scholarship_id = b.scholarship_id
        LEFT JOIN `cfsgas_admin_region` AS c ON a.region_id = c.region_id GROUP BY b.scholarship_id,c.region_id");
        return $result;
    }

    public function fetch_slots_distribution_details(Request $request)
    {
        $result = DB::select("SELECT a.slot_id,a.sp_id,a.ay,c.region_id,c.region,b.scholarship_id,b.scholarship,SUM(a.slot) AS 'slots' FROM `cfsgas_admin_slot` AS a
        LEFT JOIN `csfgas_scholarships` AS b ON a.scholarship_id = b.scholarship_id
        LEFT JOIN `cfsgas_admin_region` AS c ON a.region_id = c.region_id GROUP BY b.scholarship_id,c.region_id", [$request->id]);
        return $result;
    }

    public function save_scholarship_distribution(Request $request)
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

    public function delete_scholarship_distribution(Request $request)
    {
        $date =  date("Y-m-d H:i:s");
        $result = DB::Update("UPDATE `csfgas_scholarship_programs` AS a SET a.status = ?, a.status_date = ? WHERE a.sp_id = ?",
        ["Deleted", $date, $request->id]);
        return $result;
    }

    public function update_scholarship_distribution(Request $request)
    {
        $date =  date("Y-m-d H:i:s");
        $result = DB::Update("UPDATE `csfgas_scholarship_programs` SET  `scholarship_id` = ?, `stype_id` = ?, `code` = ?, `scholarship_program` = ?, `status` = ?, `status_date` = ? WHERE `sp_id` = ? ;",
        [$request->scholarship_id, $request->stype_id, 
        $request->scholarship_code, $request->scholarship_program, "Modified", $date, $request->sp_id]);
        return $result;
    }

}