<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Order;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        // $order = Order::first();
        // $logs = Log::where('id', $order->id)->get();
        // return view('trackingPage', compact('order', 'logs'));

        $invoice = request('invoice'); // Mengecek apakah ada parameter invoice dari URL

        if ($invoice) {
            $order = Order::where('invoice', $invoice)->first();

            if (!$order) {
                return redirect()->route('tracking')->with('error', 'Pesanan Tidak Tersedia!');
            }

            $logs = Log::where('id', $order->id)->get();

            return view('trackingPage', compact('order', 'logs'));
        }
        $order = null;
        $logs = null;

        // Jika tidak ada parameter invoice, tampilkan halaman tanpa data
        return view('trackingPage', compact('order', 'logs'));
    }

    // public function search(Request $request)
    // {
    //     $invoice = $request->input('invoice');

    //     $order = Order::where('invoice', $invoice)->first();

    //     if (!$order) {
    //         return redirect()->route('login.member')->with('error', 'Order not found.');
    //     }

    //     $logs = Log::where('id', $order->id)->get();

    //     return view('trackingPage', compact('order', 'logs'));
    // }
}
