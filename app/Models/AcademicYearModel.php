<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class AcademicYearModel extends Model
{
    public function fetch_Scholarship_ay(Request $request)
    {
        $result = DB::select("SELECT ay FROM `cfsgas_admin_ay` ORDER BY id");
        return $result;
    }
}
