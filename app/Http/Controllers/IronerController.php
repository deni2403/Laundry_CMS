<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IronerController extends Controller
{
    public function dashboard()
    {
        $orderTake = Order::where('status', 'Sudah Dicuci')
            ->whereIn('service_id', [1, 2, 5, 6])
            ->get();
        $orderDone = Order::where('status', 'Sedang Disetrika')->get();
        $orders = Order::where('ironer_id', Auth::user()->id)->get();
        return view('ironer.dashboard', compact('orderTake', 'orders', 'orderDone'));
    }

    public function editOrder()
    {
        $orders = Order::all();
        return view('ironer.edit', compact('orders'));
    }

    public function takeOrder(String $id)
    {
        $order = Order::findOrFail($id);
        $log = Log::findOrFail($id);

        $log->update(['before_status' => $order->status]);

        if ($order->ironer_id === null) {
            $order->update(['ironer_id' => Auth::user()->id, 'status' => 'Sedang disetrika']);
            $log->update(['created_at' => now()]);
            $log->update(['after_status' => 'Sedang disetrika']);

            return redirect()->route('dashboard.ironer')->with('success', 'Order berhasil diambil.');
        } else {
            return redirect()->route('dashboard.ironer')->with('error', 'Order sudah diambil oleh ironer lain.');
        }
    }

    public function doneOrder(String $id)
    {
        $order = Order::findOrFail($id);
        $log = Log::findOrFail($id);$log = Log::findOrFail($id);

        $log->update(['before_status' => $order->status]);
        if ($order->status === 'Sedang disetrika') {
            $order->update(['status' => 'Sudah disetrika']);
            $log->update(['after_status' => 'Selesai']);
            $log->update(['updated_at', now()]);

            return redirect()->route('dashboard.ironer')->with('success', 'Order berhasil diambil.');
        } else {
            return redirect()->route('dashboard.ironer')->with('error', 'Order sudah diambil oleh ironer lain.');
        }
    }
}
