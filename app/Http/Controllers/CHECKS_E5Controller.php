<?php

namespace App\Http\Controllers;

use App\Models\CHECKS_E5_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class CHECKS_E5Controller extends Controller
{

    public function checks_e5(Request $request)
    {
        $model_checksE5 = new CHECKS_E5_Model();
        $checksE5 = $model_checksE5->fetch_checks_e5($request);
        $annual_salary = $model_checksE5->fetch_annual_salary($request);
        $faculty_rank = $model_checksE5->fetch_faculty_rank($request);
        $ft_pt = $model_checksE5->fetch_ftpt($request);
        $highest_degree_attained = $model_checksE5->fetch_hda($request);
        $prof_license = $model_checksE5->fetch_prof_license($request);
        $teaching_load = $model_checksE5->fetch_teaching_load($request);
        $programs = $model_checksE5->fetch_programs($request);

        if ($request->ajax()) {
            return response()->json([
                'data' => $checksE5->items(),
                'current_page' => $checksE5->currentPage(),
                'per_page' => $checksE5->perPage(),
                'pagination_html' => $checksE5->links()->render(),
            ]);
        }

        return view('checks-e5', [
            'checksE5' => $checksE5,
            'annual_salary' => $annual_salary,
            'faculty_rank' => $faculty_rank,
            'ft_pt' => $ft_pt,
            'highest_degree_attained' => $highest_degree_attained,
            'prof_license' => $prof_license,
            'teaching_load' => $teaching_load,
            'programs' => $programs,
        ]);
    }

    public function save_checks_e5(Request $request)
    {
        try {
            // Validate incoming request data
            $request->validate([
                'last_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'middle_initial' => 'nullable|string|max:255',
                'ftpt_ID' => 'required|integer',
                'member_type' => 'required|string',
                'gender' => 'required|string|max:10',
                'hda_ID' => 'required|integer',
                'programcode_ID_1' => 'nullable|integer',
                'programcode_ID_2' => 'nullable|integer',
                'programcode_ID_3' => 'nullable|integer',
                'programcode_ID_4' => 'nullable|integer',
                'pl_ID' => 'nullable|integer',
                'tenure' => 'required|string|max:255',
                'fr_ID' => 'required|integer',
                'as_ID' => 'required|integer',
                'subject_taught' => 'nullable|string', // Ensure this is validated
                'tl_ID' => 'nullable|integer',
            ]);

            // Save the data
            $model_checksE5 = new CHECKS_E5_Model();
            $result = $model_checksE5->save_checks_e5($request);

            return response()->json(['success' => true, 'result' => $result]);
        } catch (\Exception $e) {
            // Log the detailed exception and return error message
            \Illuminate\Support\Facades\Log::error('Error saving checks E5: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Error occurred while saving: ' . $e->getMessage()], 500);
        }
    }

    public function update_checks_e5(Request $request)
    {
        try {
            $model_checksE5 = new CHECKS_E5_Model();

            // Validate input
            $request->validate([
                'last_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'middle_initial' => 'nullable|string|max:255',
                'ftpt_ID' => 'required|integer',
                'member_type' => 'required|string',
                'gender' => 'required|string|max:10',
                'hda_ID' => 'required|integer',
                'programcode_ID_1' => 'nullable|integer',
                'programcode_ID_2' => 'nullable|integer',
                'programcode_ID_3' => 'nullable|integer',
                'programcode_ID_4' => 'nullable|integer',
                'pl_ID' => 'nullable|integer',
                'tenure' => 'nullable|string|max:255',
                'fr_ID' => 'nullable|integer',
                'tl_ID' => 'nullable|integer',
                'subject_taught' => 'nullable|string',
                'as_ID' => 'nullable|integer',
            ]);

            // Update the data
            $result = $model_checksE5->update_checks_e5($request);

            return response()->json(['success' => true, 'result' => $result]);
        } catch (\Exception $e) {
            // Log the detailed exception and return error message
            \Illuminate\Support\Facades\Log::error('Error updating CHECKS E5: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Error occurred while updating: ' . $e->getMessage()], 500);
        }
    }

    public function delete_checks_e5(Request $request)
    {
        $model_checksE5 = new CHECKS_E5_Model();
        if($result = $model_checksE5->delete_checks_e5($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function checks_e5_details(Request $request)
    {
        $model_checksE5 = new CHECKS_E5_Model();
        if($result = $model_checksE5->fetch_checks_e5_details($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function fetch_programs($id)
    {
        $program = new CHECKS_E5_Model();
        if ($program) {
            return response()->json(['program' => $program->Program]);
        } else {
            return response()->json(['error' => 'Program not found'], 404);
        }
    }
}
