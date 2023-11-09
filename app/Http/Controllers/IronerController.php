<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IronerController extends Controller
{
    public function dashboard(){
        return view('ironer.dashboard');
    }
}
