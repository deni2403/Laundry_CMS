<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(){
        $member = Member::all();
        return view('member.index',compact(['member']));
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        member::create($request->except('_token','submit'));
        return redirect(route('index.member'));
    }

    public function edit($id)
    {
        $member = member::find($id);
        return view('member.edit', compact(['member']));
    }
    public function update($id, Request $request){
        $member = member::find($id);
        $member->update($request->except(['_token','submit']));
        return redirect(route('index.member'));
    }

    public function destroy($id){
        $member = member::find($id);
        $member -> delete();
        return redirect(route('index.member'));
    }

}
