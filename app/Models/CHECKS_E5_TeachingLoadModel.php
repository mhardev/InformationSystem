<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CHECKS_E5_TeachingLoadModel extends Model
{
    public function fetch_teaching_load(Request $request){
        $result = DB::select('SELECT * FROM tbl_check_e5_teaching_load');
        return $result;
    }
}