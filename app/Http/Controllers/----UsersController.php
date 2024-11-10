<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\UsersModel;

class UsersController extends Controller
{
    public function users(Request $request){
        if(!empty($request->session()->get('user_id'))){
            $model = new UsersModel();
            if($result=$model->users()){
                return view('users', ['arr_users' => $result]);
            }
        }
        else
        {
            return view('login');
        }
    }

    public function add_user(Request $request)
    {
        if(!empty($request->username) && !empty($request->last_name) && !empty($request->first_name) && !empty($request->usertype) && !empty($request->password))
        {
            $model = new UsersModel();
            $users = $model->users();
            if($result=$model->add_user($request)){
                
                if($result['success'] == true){

                    $users = $model->users();
                    return view('users', ['arr_users' => $users, 'result' => true]);
                }
                else
                {
                    return view('users', ['arr_users' => $users, 'result' => false, 'error' => $result['error']]);
                }
            }
        }
        else
        {
            return view('users', ['arr_users' => $users, 'result' => false, 'error' => 'error_1']);
        }
    }

    public function edit_user(Request $request)
    {
        if(!empty($request->username_edit) && !empty($request->last_name_edit) && !empty($request->first_name_edit) && !empty($request->usertype_edit) && !empty($request->user_id))
        {
            $model = new UsersModel();
            $users = $model->users();
            if($result=$model->edit_user($request)){
                
                if($result['success'] == true){

                    $users = $model->users();
                    return view('users', ['arr_users' => $users, 'result' => true]);
                }
                else
                {
                    return view('users', ['arr_users' => $users, 'result' => false, 'error' => $result['error']]);
                }
            }
        }
        else
        {
            return view('users', ['arr_users' => $users, 'result' => false, 'error' => 'error_1']);
        }
    }

    public function reset_pw(Request $request)
    {
        if(!empty($request->password_reset) && !empty($request->user_id))
        {
            $model = new UsersModel();
            $users = $model->users();
            if($result=$model->reset_pw($request)){
                
                if($result['success'] == true){
                    
                    return view('users', ['arr_users' => $users, 'result' => true]);
                }
                else
                {
                    return view('users', ['arr_users' => $users, 'result' => false, 'error' => $result['error']]);
                }
            }
        }
        else
        {
            return view('users', ['arr_users' => $users, 'result' => false, 'error' => 'error_1']);
        }
    }
}
