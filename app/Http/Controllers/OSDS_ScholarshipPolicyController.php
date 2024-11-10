<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OSDS_ScholarshipPolicyModel;
use App\Models\OSDSModel;
use App\Models\ScholarshipModel;
use App\Models\AcademicYearModel;

class OSDS_ScholarshipPolicyController extends Controller
{
    public function scholarship_policy(Request $request)
    {
        $model = new OSDS_ScholarshipPolicyModel();   
        $model_ay = new AcademicYearModel();   
        $model_scholarship = new ScholarshipModel();   

        $result_policy=$model->fetch_policy($request);
        $result_ay=$model_ay->fetch_Scholarship_ay($request);
        $result_req=$model->fetch_requirements($request);
        $result_schol=$model_scholarship->fetch_scholarship($request);
        $result_scholtype=$model_scholarship->fetch_scholarship_type($request);
        $result_scholprograms=$model_scholarship->fetch_scholarship_program($request);
        
        return view('osds-schol-policy',
         ['result_policy'   => $result_policy,
          'result_ay'       => $result_ay,
          'result_req'      => $result_req,
          'result_scholprograms'=> $result_scholprograms,
          'result_scholtype'=> $result_scholtype,
          'result_schol'    => $result_schol]);
    }

    public function scholarship_policy_details(Request $request)
    {
        $model = new OSDS_ScholarshipPolicyModel();   
        if($result=$model->fetch_policy_details($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function save_scholarship_policy(Request $request)
    {
        $model = new OSDS_ScholarshipPolicyModel();   
        if($result=$model->save_scholarship_policy($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function update_scholarship_policy(Request $request)
    {
        $model = new OSDS_ScholarshipPolicyModel();   
        if($result=$model->update_scholarship_policy($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function delete_scholarship_policy(Request $request)
    {
        $model = new OSDS_ScholarshipPolicyModel();   
        if($result=$model->delete_scholarship_policy($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function fetch_scholarship_program(Request $request)
    {
        $model_scholarship = new ScholarshipModel();   
        if($result=$model_scholarship->fetch_scholarship_program($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }
}
