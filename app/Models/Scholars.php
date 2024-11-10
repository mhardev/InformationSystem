<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class Scholars extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    // $flights = Flight::where('active', 1)
    //            ->orderBy('name')
    //            ->take(10)
    //            ->get();



}
