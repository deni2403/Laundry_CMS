<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use App\Models\Order;
use App\Models\Member;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CashierController extends Controller
{
    public function dashboard()
    {
        $orders = Order::whereIn('status', ['Dalam antrian', 'Belum dicuci', 'Sedang dicuci', 'Selesai'])
            ->whereIn('service_id', [1, 2, 3, 4])
            ->orderby('order_in', 'asc')
            ->paginate(6);
        return view('cashier.dashboard', compact('orders'));
    }

    public function createOrder()
    {
        $orders = Order::all();
        $services = Service::all();
        $logs = Log::all();
        $members = Member::all();
        $users = User::all();
        return view('cashier.create', compact('orders', 'services', 'logs', 'members', 'users'));
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
        $newOrder->cashier_id = Auth::user()->id;
        $service = Service::find($newOrder->service_id);
        $newOrder->total_price = $newOrder->total_weight * $service->service_price;
        $newOrder->save();

        // Menambahkan Log Status
        $newLog = new Log();
        $newLog->id = $newOrder->id;
        $newLog->before_status = $newOrder->status;
        $newLog->after_status = $newOrder->status;
        $newLog->save();
        $newOrder->log_id = $newLog->id;
        $newOrder->save();

        // Menghitung dan menyimpan diskon
        $usePoints = $request->has('use_points');
        $discount = 0;

        $member = Member::find($newOrder->member_id);

        if ($member && $usePoints == false) {
            $newOrder->total_price -= $discount;
            $newOrder->save();
        }

        if ($member && $usePoints) {
            $discount = $member->total_point; // Atur perhitungan diskon sesuai kebutuhan
            $newOrder->total_price -= $discount;
            // Mengurangi point
            $member->total_point -= $discount;
            $member->save();
            $newOrder->save();
        }

        // Menambahkan Point
        $member = Member::find($newOrder->member_id);
        if ($service->id == 1) {
            $point = 10;
        } elseif ($service->id == 2) {
            $point = 20;
        } elseif ($service->id == 3) {
            $point = 10;
        } elseif ($service->id == 4) {
            $point = 20;
        } elseif ($service->id == 5) {
            $point = 10;
        } elseif ($service->id == 6) {
            $point = 20;
        } elseif ($service->id == 7) {
            $point = 20;
        } else {
            $point = 0;
        }
        if ($member) {
            $member->total_point += $point;
            $member->save();
        }

        return redirect()->route('dashboard.cashier')->with('success', 'Order berhasil ditambahkan.');
    }

    public function usePoints(Request $request)
    {
        $orderId = $request->input('order_id');
        $usePoints = $request->input('use_points');

        $order = Order::find($orderId);

        if ($order) {
            $order->use_points = $usePoints;
            $order->save();

            return redirect()->back()->with('success', 'Penggunaan poin diperbarui.');
        }

        return redirect()->back()->with('error', 'Point tidak ditemukan.');
    }

    public function orderData()
    {
        $orders = Order::orderby('order_in', 'desc')->paginate(5);
        return view('cashier.index', compact('orders'));
    }


    public function belumDicuciStatus(String $id)
    {
        $orders = Order::findOrFail($id);
        $log = Log::findOrFail($id);

        $log->update(['before_status' => $orders->status]);

        if ($orders->status === 'Dalam antrian') {
            $orders->update(['status' => 'Belum dicuci']);
            $log->update(['created_at' => now()]);
            $log->update(['after_status' => 'Belum dicuci']);

            return redirect()->route('dashboard.cashier')->with('success', 'Orderan di Ambil');
        } else {
            return redirect()->route('dashboard.cashier')->with('error', 'Orderan Gagal di Ambil');
        }
    }

    public function sedangDicuciStatus(String $id)
    {
        $orders = Order::findOrFail($id);
        $log = Log::findOrFail($id);

        $log->update(['before_status' => $orders->status]);

        if ($orders->status === 'Belum dicuci') {
            $orders->update(['status' => 'Sedang dicuci']);
            $log->update(['created_at' => now()]);
            $log->update(['after_status' => 'Sedang dicuci']);

            return redirect()->route('dashboard.cashier')->with('success', 'Orderan sedang dicuci.');
        } else {
            return redirect()->route('dashboard.cashier')->with('error', 'Status Gagal Diubah.');
        }
    }

    public function sudahDicuciStatus(String $id)
    {
        $orders = Order::findOrFail($id);
        $log = Log::findOrFail($id);

        $log->update(['before_status' => $orders->status]);

        if ($orders->status === 'Sedang dicuci') {
            $orders->update(['status' => 'Sudah dicuci']);
            $log->update(['created_at' => now()]);
            $log->update(['after_status' => 'Sudah dicuci']);

            return redirect()->route('dashboard.cashier')->with('success', 'Orderan Selesai dicuci.');
        } else {
            return redirect()->route('dashboard.cashier')->with('error', 'Status Gagal Diubah Sudah Dicuci.');
        }
    }

    public function sudahDiambilStatus(String $id)
    {
        $orders = Order::findOrFail($id);
        $log = Log::findOrFail($id);

        $log->update(['before_status' => $orders->status]);

        if ($orders->status === 'Selesai') {
            $orders->update(['status' => 'Sudah diambil']);
            $log->update(['created_at' => now()]);
            $log->update(['after_status' => 'Sudah diambil']);

            return redirect()->route('dashboard.cashier')->with('success', 'Orderan Sudah Diambil.');
        } else {
            return redirect()->route('dashboard.cashier')->with('error', 'Status Gagal Diubah Sudah Diambil.');
        }
    }


    //Member Start
    public function indexMember()
    {
        return view('cashier.dataMember', [
            'members' => Member::latest()->paginate(5),
        ]);
    }

    public function createMember()
    {
        return view('cashier.createMember');
    }

    public function storeMember(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|regex:/^[a-zA-Z ]+$/|min:3',
            'email' => 'required|email|unique:members',
            'password' => 'required|min:6|max:255',
            'phone_number' => 'required|regex:/^\+?[0-9]{9,15}$/|min:10',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('member-images');
        }

        $validatedData['password'] = bcrypt($request->password);
        $validatedData['total_point'] = 0;
        $validatedData['registration_date'] = now();
        Member::create($validatedData);
        return redirect()->route('indexMember.cashier')->with('success', 'Member berhasil ditambahkan.');
    }

    public function editMember(Member $member)
    {
        return view('cashier.editMember', [
            'member' => $member,
        ]);
    }

    public function updateMember(Request $request, Member $member)
    {
        $rules = [
            'name' => 'required|max:255|min:3|regex:/^[a-zA-Z ]+$/',
            'phone_number' => 'required|regex:/^\+?[0-9]{9,15}$/|min:10',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|min:6|max:255';
        }

        if ($request->email != $member->email) {
            $rules['email'] = 'required|email|unique:members';
        }

        $validatedData = $request->validate($rules);
        $validatedData['password'] = bcrypt($request->password);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('member-images');
        }

        Member::where('id', $member->id)
            ->update($validatedData);
        return redirect()->route('indexMember.cashier')->with('success', 'Member berhasil diubah.');
    }

    public function destroyMember(Member $member)
    {
        if ($member->image) {
            Storage::delete($member->image);
        }

        Member::destroy($member->id);
        return redirect()->route('indexMember.cashier')->with('success', 'Member berhasil dihapus.');
    }

    //member end
}
