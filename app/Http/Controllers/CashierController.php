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
        $order = Order::where('status', 'Selesai')->get();
        return view('cashier.dashboard', compact('order'));
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
        if ($usePoints) {
            $member = Member::find($newOrder->member_id);
            $discount = $member->total_point; // Atur perhitungan diskon sesuai kebutuhan
            $newOrder->total_price -= $discount;
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

        return redirect()->route('dashboard.cashier')->with('success', '');
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

        return redirect()->back()->with('error', 'Order tidak ditemukan.');
    }
}
