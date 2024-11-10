<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CHECKS_PRC_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ListOfGraduatesImport;
use Illuminate\Pagination\LengthAwarePaginator;

class CHECKS_PRC_Controller extends Controller
{
    public function checks_prc(Request $request)
    {
        $model_checksPRC = new CHECKS_PRC_Model();
        $checksPRC = $model_checksPRC->fetch_checks_prc($request);
        $program = $model_checksPRC->fetch_program($request);

        if ($request->ajax()) {
            // Return the checksPRC data along with pagination
            return response()->json([
                'data' => $checksPRC->items(),
                'current_page' => $checksPRC->currentPage(),
                'per_page' => $checksPRC->perPage(),
                'pagination_html' => $checksPRC->links()->render(),
            ]);
        }

        return view('checks-prc', [
            'checksPRC' => $checksPRC,
            'program' => $program,
        ]);
    }

    public function save_checks_prc(Request $request)
    {
        try {
            $request->validate([
                'Student_ID' => 'required|string|max:255',
                'Date_of_birth' => 'required|string|max:255',
                'Last_name' => 'required|string|max:255',
                'First_name' => 'required|string|max:255',
                'Middle_name' => 'required|string|max:255',
                'Sex' => 'required|string|max:255',
                'Date_graduated' => 'required|string|max:255',
                'AY' => 'nullable|string|max:255',
                'Program_ID' => 'nullable|required',
            ]);

            $model_checksPRC = new CHECKS_PRC_Model();
            $result = $model_checksPRC->save_checks_prc($request);

            return response()->json(['success' => true, 'result' => $result]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error saving checks PRC: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Error occured while saving: ' . $e->getMessage()], 500);
        }
    }

    public function checks_prc_details(Request $request)
    {
        $model_checksPRC = new CHECKS_PRC_Model();
        if($result = $model_checksPRC->checks_prc_details($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function update_checks_prc(Request $request)
    {
        try {
            $request->validate([
                'Student_ID' => 'required|string|max:255',
                'Date_of_birth' => 'required|string|max:255',
                'Last_name' => 'required|string|max:255',
                'First_name' => 'required|string|max:255',
                'Middle_name' => 'required|string|max:255',
                'Sex' => 'required|string|max:255',
                'Date_graduated' => 'required|string|max:255',
                'AY' => 'nullable|string|max:255',
                'Program_ID' => 'nullable|required',
            ]);

            $model_checksPRC = new CHECKS_PRC_Model();
            $result = $model_checksPRC->update_checks_prc($request);

            return response()->json(['success' => true, 'result' => $result]);
        } catch (\Exception $e){
            \Illuminate\Support\Facades\Log::error('Error updating checks PRC: '. $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Error occured while updating: '. $e->getMessage()], 500);
        }
    }

    public function delete_checks_prc(Request $request)
    {
        $model_checksPRC = new CHECKS_PRC_Model();
        if($result = $model_checksPRC->delete_checks_prc($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function get_import_checks_prc(Request $request)
    {
        $model_checksPRC = new CHECKS_PRC_Model();
        if($result = $model_checksPRC->get_import_checks_prc($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }
}
