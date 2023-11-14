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
        return view('cashier.dashboard');
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

        $newLog = new Log();
        $newLog->id = $newOrder->id;
        $newLog->before_status = $newOrder->status;
        $newLog->after_status = $newOrder->status;
        $newLog->save();

        $newOrder->log_id = $newLog->id;
        $newOrder->save();

        return redirect()->route('dashboard')->with('success', '');
    }

    public function takeOrder($id)
    {
        $order = Order::findOrFail($id);

        // Validasi apakah order belum diambil oleh ironer lain
        if ($order->ironer_id === null) {
            // Update ironer_id pada order
            $order->update(['ironer_id' => auth()->user()->id, 'status' => 'Sedang Disetrika']);

            return redirect()->route('ironer.dashboard')->with('success', 'Order berhasil diambil.');
        } else {
            return redirect()->route('ironer.dashboard')->with('error', 'Order sudah diambil oleh ironer lain.');
        }
    }
}
