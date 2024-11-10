<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CHECKS_E5_AnnualSalaryModel extends Model
{
    public function fetch_annual_salary(Request $request){
        $result = DB::select('SELECT * FROM tbl_check_e5_annual_salary');
        return $result;
    }
}
