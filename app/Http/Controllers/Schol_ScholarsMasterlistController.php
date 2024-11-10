<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scholars;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Schol_ScholarsMasterlistController extends Controller
{
    public function index(Request $request)
    {
        $action_request = $request->action;
        //$region = $request->region;
        $region = "13";
        if($action_request=="search")
        {
            $scholars = DB::table('cfsgas_scholars_masterlist as a')
            ->leftJoin('csfgas_scholarship_programs as b', 'a.sp_id', '=', 'b.sp_id')
            ->leftJoin('heis as c', 'a.heis_id', '=', 'c.id')
            ->leftJoin('hei_programs as d', 'a.hei_program_id', '=', 'd.id')
            ->select('a.id', 'a.region', 'b.sp_id', 'b.code',
             'a.fullname', 'a.heis_id', 'c.name as heis_name', 'a.hei_program_id as program_id',
              'd.name as program_name', 'd.major_name as program_major', 'a.yearlevel', 'a.status')
            ->where('a.region', $region)
            ->orderBy('a.fullname','ASC')->Paginate(10);
        }
        else if($action_request=="ay")
        {
            $scholars = DB::table('cfsgas_scholars_masterlist as a')
            ->leftJoin('csfgas_scholarship_programs as b', 'a.sp_id', '=', 'b.sp_id')
            ->leftJoin('heis as c', 'a.heis_id', '=', 'c.id')
            ->leftJoin('hei_programs as d', 'a.hei_program_id', '=', 'd.id')
            ->select('a.id', 'a.ay_grant', 'a.region', 'b.sp_id', 'b.code',
             'a.fullname', 'a.heis_id', 'c.name as heis_name', 'a.hei_program_id as program_id',
              'd.name as program_name', 'd.major_name as program_major', 'a.yearlevel', 'a.status')
            ->where('a.region', $region)
            ->orderBy('a.fullname','ASC')->Paginate(10);
        }
        else if($action_request=="ay")
        {
            $scholars = DB::table('cfsgas_scholars_masterlist as a')
            ->leftJoin('csfgas_scholarship_programs as b', 'a.sp_id', '=', 'b.sp_id')
            ->leftJoin('heis as c', 'a.heis_id', '=', 'c.id')
            ->leftJoin('hei_programs as d', 'a.hei_program_id', '=', 'd.id')
            ->select('a.id', 'a.ay_grant', 'a.region', 'b.sp_id', 'b.code',
             'a.fullname', 'a.heis_id', 'c.name as heis_name', 'a.hei_program_id as program_id',
              'd.name as program_name', 'd.major_name as program_major', 'a.yearlevel', 'a.status')
            ->where('a.region', $region)
            ->orderBy('a.fullname','ASC')->Paginate(10);
        }
        else
        {
            $scholars = DB::table('cfsgas_scholars_masterlist as a')
            ->leftJoin('csfgas_scholarship_programs as b', 'a.sp_id', '=', 'b.sp_id')
            ->leftJoin('heis as c', 'a.heis_id', '=', 'c.id')
            ->leftJoin('hei_programs as d', 'a.hei_program_id', '=', 'd.id')
            ->select('a.id', 'a.ay_grant', 'a.region', 'b.sp_id', 'b.code',
             'a.fullname', 'a.heis_id', 'c.name as heis_name', 'a.hei_program_id as program_id',
              'd.name as program_name', 'd.major_name as program_major', 'a.yearlevel', 'a.status')
            ->where('a.region', $region)
            ->orderBy('a.fullname','ASC')->Paginate(10);
        }
        return view('schol-scholars-masterlist', ['scholars' => $scholars]);
    }
}
