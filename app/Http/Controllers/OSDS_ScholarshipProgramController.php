<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OSDS_ScholarshipPrgramModel;
use App\Models\ScholarshipModel;
use App\Models\AcademicYearModel;

class OSDS_ScholarshipProgramController extends Controller
{
    public function scholarship_program(Request $request)
    {
        $model_scholarship_program      = new OSDS_ScholarshipPrgramModel();   
        $model_scholarship              = new ScholarshipModel();  
        $model_ay                       = new AcademicYearModel();    

        $result_scholarship_type        = $model_scholarship->fetch_scholarship_type($request);
        $result_scholarship             = $model_scholarship->fetch_scholarship($request);
        $result_scholarship_program     = $model_scholarship_program->fetch_scholarship_program($request);
        $result_ay                      = $model_ay->fetch_Scholarship_ay($request);
        
        return view('osds-schol-scholprogram',
         [  'result_scholarship_program' => $result_scholarship_program,
            'result_scholarship'         => $result_scholarship,
            'result_scholarship_type'    => $result_scholarship_type,
            'result_ay'                  => $result_ay   ]);
    }

    public function save_scholarship_program(Request $request)
    {
        $model = new OSDS_ScholarshipPrgramModel();   
        if($result=$model->save_scholarship_program($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function delete_scholarship_program(Request $request)
    {
        $model = new OSDS_ScholarshipPrgramModel();   
        if($result=$model->delete_scholarship_program($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function update_scholarship_program(Request $request)
    {
        $model = new OSDS_ScholarshipPrgramModel();
        if($result=$model->update_scholarship_program($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    
}