<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use App\Models\Order;
use App\Models\Member;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        return view('superadmin.dashboard');
    }

    public function createOrder()
    {
        $orders = Order::all();
        $services = Service::all();
        $logs = Log::all();
        $members = Member::all();
        $users = User::all();
        return view('superadmin.create', compact('orders', 'services', 'logs', 'members', 'users'));
    }

    public function storeOrder(Request $request)
    {
        $newOrder = new Order();
        $newOrder->invoice = 'INV' . '/' . now()->year . now()->month . now()->day . '/' . random_int(1, 1000000);
        $newOrder->customer_name = $request->customer_name;
        $newOrder->order_in = $request->order_in;
        $newOrder->order_out = $request->order_out;
        $newOrder->order_take = now();
        $newOrder->total_weight = $request->total_weight;
        $newOrder->status = $request->status;
        $newOrder->service_id = $request->service_id;
        $newOrder->member_id = $request->member_id;
        $newOrder->superadmin_id = Auth::user()->id;
        $service = Service::find($newOrder->service_id);
        $newOrder->total_price = $newOrder->total_weight * $service->service_price;
        $newOrder->save();

        $newLog = new Log();
        $newLog->id = $newOrder->id;
        $newLog->before_status = $newOrder->status;
        $newLog->after_status = $newOrder->status;
        $newLog->save();

        $newOrder->log_id = $newLog->id;
        $newOrder->save();

        return redirect()->route('dashboard.superadmin')->with('success', '');
    }

    //Member Start
    public function indexMember()
    {
        $member = Member::all();
        return view('member.index', compact(['member']));
    }

    public function createMember()
    {
        return view('member.create');
    }

    public function storeMember(Request $request)
    {
        member::create($request->except('_token', 'submit'));
        return redirect()->route('index.member');
    }

    public function editMember($id)
    {
        $member = member::find($id);
        return view('member.edit', compact(['member']));
    }
    public function updateMember($id, Request $request)
    {
        $member = member::find($id);
        $member->update($request->except(['_token', 'submit']));
        return redirect()->route('index.member');
    }

    public function destroyMember($id)
    {
        $member = member::find($id);
        $member->delete();
        return redirect()->route('index.member');
    }

    //Member End

    //User Start
    public function indexUser()
    {
        return view('superadmin.index', [
            'users' => User::all(),
        ]);
    }

    public function createUser()
    {
        return view('superadmin.createUser');
    }

    public function editUser(User $user)
    {
        return view('superadmin.editUser', [
            'user' => $user,
        ]);
    }
    //User End
}
