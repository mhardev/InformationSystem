<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scholars;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Schol_ScholarsProfileController extends Controller
{
    public function fetch_scholars_data_allowance(Request $request)
    {
        $award_no = "FPESFA-1701-23-13";
        $allowances = DB::table('cfsgas_scholars_allowance')->get();
        // ->where('award_no', $award_no)
        // ->orderBy('id','ASC');

        return view('schol-scholars-profile', ['allowances' => $allowances]);

    }
}
