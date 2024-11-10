<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use App\models\LoginModel;
use DB;

class UserController extends Controller
{

    public function login(Request $request){

        // verify user existence
        $verify_user = DB::select('select `user_id`, `first_name`, `last_name`, `username`, `password`, `usertype`, `picture_reference` from tbl_users where `username` = ?', [$request->username]);
        if(!empty($verify_user[0]->user_id))
        {
            if(password_verify($request->password, $verify_user[0]->password))
            {
                session(['user_id' => $verify_user[0]->user_id]);
                session(['first_name' => $verify_user[0]->first_name]);
                session(['last_name' => $verify_user[0]->last_name]);
                session(['username' => $verify_user[0]->username]);
                session(['usertype' => $verify_user[0]->usertype]);
                session(['picture_reference' => $verify_user[0]->picture_reference]);
                return redirect()->route('masterlist');
            }
            else
            {
                return view('login', ['result' => false, 'error' => 'error_1']); //password mismatched
            }
        }
        else
        {
            return view('login', ['result' => false, 'error' => 'error_1']); //user do not exist
        }

    }
}
