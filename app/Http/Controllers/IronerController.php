<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class IronerController extends Controller
{
    public function dashboard()
    {
        $orderTake = Order::where('status', 'Sudah dicuci')
            ->whereIn('service_id', [1, 2, 5, 6])
            ->paginate(5);
        $orderDone = Order::where('status', 'Sedang Disetrika')->paginate(5);

        return view('ironer.dashboard', compact('orderTake', 'orderDone'));
    }

    public function takeOrder(String $id)
    {
        $order = Order::findOrFail($id);
        $log = Log::findOrFail($id);

        $log->update(['before_status' => $order->status]);

        if ($order->ironer_id === null) {
            $order->update(['ironer_id' => Auth::user()->id, 'status' => 'Sedang disetrika']);
            $log->update(['created_at' => now(), 'after_status' => 'Sedang disetrika']);

            return redirect()->route('dashboard.ironer')->with('success', 'Order berhasil diambil.');
        } else {
            return redirect()->route('dashboard.ironer')->with('error', 'Order sudah diambil oleh ironer lain.');
        }
    }

    public function doneOrder(String $id)
    {
        $order = Order::findOrFail($id);
        $log = Log::findOrFail($id);
        $log = Log::findOrFail($id);

        $log->update(['before_status' => $order->status]);
        if ($order->status === 'Sedang disetrika') {
            $order->update(['status' => 'Sudah disetrika']);
            $log->update(['after_status' => 'Sudah disetrika', 'updated_at', now()]);

            return redirect()->route('dashboard.ironer')->with('success', 'Berhasil Mengubah Status.');
        } else {
            return redirect()->route('dashboard.ironer')->with('error', 'Gagal Mengubah Status.');
        }
    }

    public function orderData()
    {
        if (Auth::user()->role == 'ironer') {
            // Jika pengguna memiliki peran "ironer"
            $orders = Order::where('ironer_id', Auth::user()->id)
                ->whereIn('service_id', [1, 2, 5, 6])
                ->paginate(5);
        } else {
            // Jika pengguna tidak memiliki peran "ironer", ambil semua data
            $orders = Order::whereIn('service_id', [1, 2, 5, 6])
                ->whereIn('status', ['Sudah disetrika', 'Selesai', 'Sudah diambil'])
                ->paginate(5);
        }
        return view('ironer.index', compact('orders'));
    }
}
