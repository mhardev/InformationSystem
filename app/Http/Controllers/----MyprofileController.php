<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\MyprofileModel;
use Illuminate\Http\JsonResponse;
use DB;

class MyprofileController extends Controller
{
    public function my_profile(Request $request)
    {
        if(!empty($request->session()->get('user_id'))){
            return view('my_profile');
        }
        else
        {
            return view('login');
        }
    }

    public function update_profile(Request $request){

        if(!empty($request->username) && !empty($request->last_name) && !empty($request->first_name))
        {
            if(!empty($_FILES["id_picture"]["name"])){

                $allowed_extension = array('png');
                $file_array = explode(".", $_FILES["id_picture"]["name"]);
                $file_extension = end($file_array);

                if(in_array($file_extension, $allowed_extension)){
                    $file_name = time().''.$_FILES["id_picture"]["name"];
                    $file_path = base_path('public/files/profile_pictures/'.$file_name);
                    if(move_uploaded_file($_FILES['id_picture']['tmp_name'], $file_path)){
                        $model = new MyprofileModel();   
                        if($result=$model->update_profile($request, $file_name))
                        {   
                            if($result['success'] == true){
                                session(['first_name' => $result['first_name']]);
                                session(['last_name' => $result['last_name']]);
                                session(['username' => $result['username']]);
                                session(['picture_reference' => $result['picture_reference']]);
                                return view('my_profile', ['result' => true]);
                            }
                            else
                            {
                                return view('my_profile', ['result' => false, 'error' => 'error_1']);
                            }
                        }
                        else
                        {
                            return view('my_profile', ['result' => false, 'error' => 'error_1']);
                        }
                    }
                    else
                    {
                        return view('my_profile', ['result' => false, 'error' => 'error_1']);
                    }
                }
                else
                {
                    return view('my_profile', ['result' => false, 'error' => 'error_1']);
                }
            }
            else
            {
                $model = new MyprofileModel();   
                if($result=$model->update_profile($request, null))
                {
                    if($result['success'] == true){
                        session(['first_name' => $result['first_name']]);
                        session(['last_name' => $result['last_name']]);
                        session(['username' => $result['username']]);
                        return view('my_profile', ['result' => true]);
                    }
                    else
                    {
                        return view('my_profile', ['result' => false, 'error' => 'error_1']);
                    }
                }
                else
                {
                    return view('my_profile', ['result' => false, 'error' => 'error_1']);
                }
            }
            
        }
        else
        {
            return view('my_profile', ['result' => false, 'error' => 'error_1']);
        }

    }

    public function update_pw(Request $request){

        if(!empty($request->password_new) && !empty($request->password_confirm))
        {
            $model = new MyprofileModel();   
            if($result=$model->update_pw($request))
            {
                if($result['success'] == true)
                {
                    return view('my_profile', ['result' => true]);
                }
                else
                {
                    return view('my_profile', ['result' => false, 'error' => 'error_2']);
                }
            }
            else
            {
                return view('my_profile', ['result' => false, 'error' => 'error_1']);
            }
        }
        else
        {
            return view('my_profile', ['result' => false, 'error' => 'error_1']);
        }
    }
}
