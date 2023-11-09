<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackerController extends Controller
{
    public function dashboard(){
        return view('dashboard.packer');
    }
}
