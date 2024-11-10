<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\CMSPApplicationModel;

class CMSPApplicationController extends Controller
{

    public function cmsp_application(Request $request){

        $model = new CMSPApplicationModel();   
        if($result=$model->fetch_addresses($request))
        {
            return view('cmsp_application', ['result' => $result]);
        }

    }
}
