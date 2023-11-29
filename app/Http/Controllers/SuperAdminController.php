<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use App\Models\Order;
use App\Models\Member;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        // 1
        $totalOrder = Order::all();

        //2
        $orderProcess = Order::whereNot('status', 'Sudah diambil')->get();

        // 3
        $completedOrder = Order::where('status', 'Sudah diambil')->get();
        return view('superadmin.dashboard', compact('totalOrder', 'orderProcess', 'completedOrder'));
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

    //User Start
    public function indexUser()
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('superadmin.index', [
            'users' => User::all(),
        ]);

    }

    public function createUser()
    {
        return view('superadmin.createUser');
    }

    public function storeUser(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|in:superadmin,admin,cashier,ironer,packer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('user-images');
        }
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('users.superadmin')->with('success', 'User Berhasil Ditambahkan!');
    }

    public function editUser(User $user)
    {
        return view('superadmin.editUser', [
            'user' => $user,
        ]);
    }

    public function updateUser(User $user, Request $request)
    {
        $rules = [
            'name' => 'required|max:255|min:3|regex:/^[a-zA-Z ]+$/',
            'role' => 'required|in:superadmin,admin,cashier,ironer,packer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|min:6|max:255';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users,email';
        }

        $validatedData = $request->validate($rules);
        $validatedData['password'] = bcrypt($request->password);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('user-images');
        }

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect()->route('users.superadmin')->with('success', 'User Berhasil Diubah!');
    }

    public function destroyUser(String $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.superadmin')->with('success', 'User Berhasil Dihapus!');
    }
    //User End
}
