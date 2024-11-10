<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\OSDSModel;
use App\Models\ScholarshipModel;

class NavController extends Controller
{
    public function dashboard(Request $request){
        return view('dashboard');
    }

    public function osds_dashboard(Request $request){
        return view('osds-dashboard');
    }

    public function schol_dashboard(Request $request){
        return view('schol-dashboard');
    }


    public function osds_schol_program(Request $request)
    {
        $model = new OSDSModel();
        $model_scholarship = new ScholarshipModel();
        $result_schol=$model_scholarship->fetch_scholarship($request);
        $result_unit=$model->fetch_department($request);
        {
            return view('osds-schol-program', ['result_schol' => $result_schol, 'result_unit' => $result_unit]);
        };
    }

    public function osds_schol_attachments(Request $request){
        return view('osds-schol-attachments');
    }

    public function osds_priority_course(Request $request){
        return view('osds-priority-course');
    }

    public function osds_slots_distribution(Request $request){
        return view('osds-slots-distribution');
    }

    public function application(Request $request){
        return view('application');
    }

    public function checks(Request $request) {
        return view('checks');
    }

    public function checks_bc(Request $request) {
        return view('checks-bc');
    }

    public function checks_e5(Request $request) {
        return view('checks-e5');
    }

    public function checks_prc(Request $request) {
        return view('checks-prc');
    }



}
