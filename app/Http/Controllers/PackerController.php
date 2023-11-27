<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackerController extends Controller
{
    public function dashboard()
    {
        $orderTake = Order::where(function ($query) {
            $query->where('status', 'Sudah Dicuci')
                ->whereIn('service_id', [3, 4]);
        })
            ->orWhere(function ($query) {
                $query->where('status', 'Sudah Disetrika')
                    ->whereIn('service_id', [1, 2, 5, 6]);
            })
            ->get();

        $orderDone = Order::where('status', 'Sedang dipacking')->get();
        $orders = Order::where('packer_id', Auth::user()->id)->get();
        return view('packer.dashboard', compact('orderTake', 'orders', 'orderDone'));
    }

    public function takeOrder(String $id)
    {
        $order = Order::findOrFail($id);
        $log = Log::findOrFail($id);

        $log->update(['before_status' => $order->status]);
        $log->update(['created_at' => now()]);

        if ($order->packer_id === null) {
            $order->update(['packer_id' => Auth::user()->id, 'status' => 'Sedang dipacking']);
            $log->update(['after_status' => 'Sedang dipacking']);

            return redirect()->route('dashboard.packer')->with('success', 'Order berhasil diambil.');
        } else {
            return redirect()->route('dashboard.packer')->with('error', 'Order sudah diambil oleh Packer lain.');
        }
    }

    public function doneOrder(String $id)
    {
        $order = Order::findOrFail($id);
        $log = Log::findOrFail($id);

        $log->update(['before_status' => $order->status]);
        if ($order->status === 'Sedang dipacking') {
            $order->update(['status' => 'Selesai']);
            $log->update(['after_status' => 'Selesai']);
            $log->update(['updated_at', now()]);

            return redirect()->route('dashboard.packer')->with('success', 'Order Selesai.');
        } else {
            return redirect()->route('dashboard.packer')->with('error', 'Gagal Selesai.');
        }
    }

    public function orderData(){
        return view('packer.index');
    }
}
