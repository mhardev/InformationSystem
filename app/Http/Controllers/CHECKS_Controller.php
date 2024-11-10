<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CHECKS_Controller extends Controller
{
    public function checks()
    {
        return view('checks');
    }
}
