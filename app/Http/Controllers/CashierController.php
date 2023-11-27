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

class CashierController extends Controller
{
    public function dashboard()
    {
        $orders = Order::whereIn('status', ['Dalam antrian', 'Belum dicuci', 'Sedang dicuci', 'Selesai'])
            ->whereIn('service_id', [1, 2, 3, 4])
            ->orderby('order_in', 'asc')
            ->get();
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

        if($member && $usePoints == false){
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
        } elseif ($service->id == 3) {
            $point = 20;
        } elseif ($service->id == 4) {
            $point = 20;
        } elseif ($service->id == 5) {
            $point = 20;
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
        $orders = Order::orderby('order_in', 'desc')->get();
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

            return redirect()->route('dashboard.cashier')->with('success', 'Status Berhasil Diubah Belum Dicuci.');
        } else {
            return redirect()->route('dashboard.cashier')->with('error', 'Status Gagal Diubah.');
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

            return redirect()->route('dashboard.cashier')->with('success', 'Status Berhasil Diubah Sedang Dicuci.');
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

            return redirect()->route('dashboard.cashier')->with('success', 'Status Berhasil Diubah Sudah Dicuci.');
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

            return redirect()->route('dashboard.cashier')->with('success', 'Status Berhasil Diubah Sudah Diambil.');
        } else {
            return redirect()->route('dashboard.cashier')->with('error', 'Status Gagal Diubah Sudah Diambil.');
        }
    }

    public function indexMember()
    {
        $members = Member::all();
        return view('cashier.dataMember', compact('members'));
    }

    public function createMember()
    {
        return view('cashier.createMember');
    }

    public function storeMember(Request $request)
    {
        $newMember = new Member();
        $newMember->name = $request->name;
        $newMember->email = $request->email;
        $newMember->password = bcrypt($request->password);
        $newMember->phone_number = $request->phone_number;
        $newMember->total_point = 0;
        $newMember->registration_date = now();
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('member-images');
        }
        $newMember->image = $validatedData['image'];
        $newMember->save();

        return redirect()->route('indexMember.cashier')->with('success', 'Member berhasil ditambahkan.');
    }

    public function editMember(String $id)
    {
        $member = Member::findOrFail($id);
        return view('cashier.editMember', compact('member'));
    }

    public function updateMember(Request $request, String $id)
    {
        $member = Member::findOrFail($id);
        $member->name = $request->name;
        $member->email = $request->email;
        $member->phone_number = $request->phone_number;
        $member->total_point = $request->total_point;
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('member-images');
        }
        $member->image = $validatedData['image'];
        $member->save();

        return redirect()->route('indexMember.cashier')->with('success', 'Member berhasil diubah.');
    }

    public function destroyMember(String $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('indexMember.cashier')->with('success', 'Member berhasil dihapus.');
    }
}
