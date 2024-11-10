<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class osds_schol_programController extends Controller
{

    public function osds_schol_program(Request $request){

        return view('osds-schol-program');

    }
}
