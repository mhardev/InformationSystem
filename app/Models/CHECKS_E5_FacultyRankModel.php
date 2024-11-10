<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CHECKS_E5_FacultyRankModel extends Model
{
    public function fetch_faculty_rank(Request $request){
        $result = DB::select('SELECT * FROM tbl_check_e5_faculty_rank');
        return $result;
    }
}
