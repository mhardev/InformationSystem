<?php

namespace App\Http\Controllers;

use App\Models\CHECKS_BC_Model;
use Illuminate\Http\Request;

class CHECKS_BC_Controller extends Controller
{
    public function checks_bc(Request $request)
    {
        $model_checksBC = new CHECKS_BC_Model();
        $programLevel = $request->input('programLevel', null);
        $checksBC = $model_checksBC->fetch_checks_bc($request, $programLevel);
        $program = $model_checksBC->fetch_program($request);
        $gpr_level = $model_checksBC->fetch_gpr_level($request);
        $hei = $model_checksBC->fetch_hei($request);
        $users = $model_checksBC->fetch_users($request);

        return view('checks-bc', [
            'checksBC' => $checksBC['data'],
            'program' => $program,
            'gpr_level' => $gpr_level,
            'hei' => $hei,
            'users' => $users,
        ]);
    }

    public function save_checks_bc(Request $request)
    {
        //
    }

    public function update_checks_bc(Request $request)
    {
        //
    }

    public function delete_checks_bc(Request $request)
    {
        $model_checksBC = new CHECKS_BC_Model();
        if($result = $model_checksBC->delete_checks_bc($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function checks_bc_details(Request $request)
    {
        $model_checksBC = new CHECKS_BC_Model();
        if($result = $model_checksBC->checks_bc_details($request))
        {
            return response()->json(['success' => true, 'result' => $result]);
        }
    }

    public function fetch_hei($id)
    {
        $hei = new CHECKS_BC_Model();
        if ($hei) {
            return response()->json(['hei' => $hei->ID]);
        } else {
            return response()->json(['error' => 'HEI not found'], 404);
        }
    }
}
