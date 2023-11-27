<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Users;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('user.index',compact(['user']));

    }

    public function create(){
        $user = User::all();
        return view('user.create');
    }
    public function store(Request $request){
        //dd($request->except(['_token','submit']));
        ($request->except(['_token','submit']));
        User::create($request->except(['_token','submit']));
        return redirect('/user');
    }
    public function edit($id){
        $user = User::find($id) ;
        return view('user.edit',compact(['user']));
    }
    public function update ($id, Request $request){
        $user = User::find($id) ;
        $user->update($request->except(['_token','submit']));
        return redirect('/user');
    }
    public function destroy($id){
        $user = User::find($id);
        $user->events()->delete();
        $user->delete();
        return redirect('/user');
    }
}
