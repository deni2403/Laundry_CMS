<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Log;
use App\Models\User;
use App\Models\Order;
use App\Models\Member;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        $totalOrder = Order::all();
        $orderProcess = Order::whereNot('status', 'Sudah diambil')->get();
        $completedOrder = Order::where('status', 'Sudah diambil')->get();
        return view('superadmin.dashboard', compact('totalOrder', 'orderProcess', 'completedOrder'));
    }

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

    public function storeUser(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|max:255|min:3|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|max:255',
            'role' => 'required|in:superadmin,admin,cashier,ironer,packer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('user-images', 'public');

            $image = Image::make(storage_path("app/public/{$imagePath}"));
            if ($image->width() > 100 || $image->height() > 100) {
                $image->fit(100, 100, function ($constraint) {
                    $constraint->upsize();
                })->save();
            }

            $data['image'] = $imagePath;
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|min:8|max:255';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users,email';
        }

        $validatedData = $request->validate($rules);
        $validatedData['password'] = $request->filled('password') ? bcrypt($request->password) : $user->password;

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $imagePath = $request->file('image')->store('user-images', 'public');
            $image = Image::make(storage_path("app/public/{$imagePath}"));
            if ($image->width() > 100 || $image->height() > 100) {
                $image->fit(100, 100, function ($constraint) {
                    $constraint->upsize();
                })->save();
            }

            $validatedData['image'] = $imagePath;
        }

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect()->route('users.superadmin')->with('success', 'User Berhasil Diubah!');
    }

    public function destroyUser(User $user, Order $order, Event $event)
    {
        if ($user->role == 'superadmin') {
            return redirect()->route('users.superadmin')->with('error', 'User Superadmin Tidak Bisa Dihapus!');
        }

        if ($user->role == 'admin') {
            $events = Event::where('user_id', $user->id)->get();
            foreach ($events as $event) {
                $event->update(['user_id' => null]);
            }
        }

        $roleSpecificFields = [
            'cashier' => 'cashier_id',
            'ironer' => 'ironer_id',
            'packer' => 'packer_id',
        ];

        if (array_key_exists($user->role, $roleSpecificFields)) {
            $fieldName = $roleSpecificFields[$user->role];
            $orders = Order::where($fieldName, $user->id)->get();

            foreach ($orders as $order) {
                $order->update([$fieldName => null]);
            }
        }

        User::destroy($user->id);

        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }
        return redirect()->route('users.superadmin')->with('success', 'User Berhasil Dihapus!');
    }
    //User End
}
