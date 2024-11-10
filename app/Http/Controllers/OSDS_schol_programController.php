<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScholarshipModel;
use App\Models\OSDSModel;

class OSDS_schol_programController extends Controller
{
    public function store(Request $request)
    {
        ScholarshipModel::create([
            'Department_ID' => $request->Department_ID,
            'Code' => $request->Code,
            'Scholarship_Program'  => $request->Scholarship_Program,
            'Action'  => "Active"
        ]);

        return redirect()->route('osds-schol-program');
    }

    public function save_scholarship(Request $request)
    {
        $model = new OSDSModel();   
        if($result=$model->save_scholarship($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function scholarship_details(Request $request)
    {
        $model_scholarship = new ScholarshipModel();   
        if($result=$model_scholarship->fetch_scholarship_details($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function edit_scholarship(Request $request)
    {
        $model = new OSDSModel();   
        if($result=$model->edit_scholarship($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }
    
    public function delete_scholarship(Request $request)
    {
        $model = new OSDSModel();   
        if($result=$model->delete_scholarship($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }
}
