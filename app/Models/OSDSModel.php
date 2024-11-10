<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class OSDSModel extends Model
{
    public function save_scholarship(Request $request)
    {
       $date =  date("Y-m-d H:i:s");
        $result = DB::Insert("Insert into `csfgas_scholarships`(`unit_id`, 
                                                                `scholarship_code`, 
                                                                `scholarship`, 
                                                                `eligible`, 
                                                                `application_status`, 
                                                                `status`, 
                                                                `status_date`)
                                                                values
                                                                (?,?,?,?,?,?,?);",
                                                                [$request->unit_id,
                                                                $request->scholarship_code,
                                                                $request->scholarship,
                                                                $request->eligible,
                                                                "Closed",
                                                                "Active",
                                                                $date]);
        return $result;
    }

    public function edit_scholarship(Request $request)
    {
        $date =  date("Y-m-d H:i:s");
        $result = DB::Update("UPDATE `csfgas_scholarships` AS a
         SET a.unit_id = ?, a.scholarship_code = ?, a.scholarship =?, a.eligible =?, a.application_status =?, a.status=?, a.status_date=? 
         WHERE a.scholarship_id =?",
        [$request->unit_id, $request->scholarship_code, $request->scholarship, $request->eligible, "Closed", "Modified", $date, $request->id]);
        return $result;
    }

    public function delete_scholarship(Request $request)
    {
        $date =  date("Y-m-d H:i:s");
        $result = DB::Update("UPDATE `csfgas_scholarships` AS a SET a.status=?, a.status_date=? WHERE a.scholarship_id =?",
        ["Deleted", $date, $request->id]);
        return $result;
    }

    public function fetch_department(Request $request)
    {
        $result = DB::select('SELECT * from cfsgas_admin_unit where status = "Active" order by unit');
        return $result;
    }
}




