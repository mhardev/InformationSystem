<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class ScholarshipModel extends Model
{
    public function fetch_scholarship(Request $request)
    {
        $result = DB::select('SELECT b.code, a.* FROM `csfgas_scholarships` AS a
        LEFT JOIN `cfsgas_admin_unit` AS b ON a.unit_id = b.unit_id WHERE a.status IN("Active","Modified")');
        return $result;
    }

    public function fetch_scholarship_type(Request $request)
    {
        $result = DB::select("SELECT a.* FROM `cfsgas_admin_scholarship_type` AS a WHERE a.Status ='Active'");
        return $result;
    }

    public function fetch_scholarship_details(Request $request)
    {
        $result = DB::select('SELECT b.code, a.* FROM `csfgas_scholarships` AS a LEFT JOIN `cfsgas_admin_unit` AS b ON a.unit_id = b.unit_id WHERE a.scholarship_id= ?;', [$request->id]);
        return $result;
    }

    public function fetch_scholarship_program(Request $request)
    {
        $result = DB::select("SELECT a.* FROM `csfgas_scholarship_programs` AS a WHERE a.status ='Active' and scholarship_id = ? order by a.scholarship_program", [$request->id]);
        return $result;
    }
}
