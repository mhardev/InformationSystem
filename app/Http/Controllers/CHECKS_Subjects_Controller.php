<?php

namespace App\Http\Controllers;

use App\Models\CHECKS_Subjects_Model;
use Illuminate\Http\Request;

class CHECKS_Subjects_Controller extends Controller
{
    public function checks_subjects(Request $request)
    {
        $model_subjectTaught = new CHECKS_Subjects_Model();
        $checksSubjects = $model_subjectTaught->fetch_checks_subjects($request);

        return view('checks-subject-settings',[
            'checksSubjects' => $checksSubjects
        ]);
    }

    public function save_checks_subjects(Request $request)
    {
        try {
            $request->validate([
                'CODE' => 'required|string|max:255',
                'Description' => 'required|string|max:255',
                'No_fields' => 'required|string|max:255',
            ]);

            $model_subjectTaught = new CHECKS_Subjects_Model();
            $result = $model_subjectTaught->save_checks_subjects($request);

            return response()->json(['success' => true, 'result' => $result]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error saving subject taught: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Error occured while saving: ' . $e->getMessage()], 500);
        }
    }

    public function delete_checks_subjects(Request $request)
    {
        $model_subjectTaught = new CHECKS_Subjects_Model();
        if($result = $model_subjectTaught->delete_checks_subjects($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }
}
