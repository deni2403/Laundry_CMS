<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Order;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        // Mengecek apakah ada parameter invoice dari URL
        $invoice = request('invoice');

        if ($invoice) {
            $order = Order::where('invoice', $invoice)->first();

            if (!$order) {
                return redirect()->route('tracking')->with('error', 'Pesanan Tidak Tersedia!');
            }

            $logs = Log::where('id', $order->id)->get();

            return view('trackingPage', compact('order', 'logs'));
        }
        // $order = null;
        // $logs = null;

        // Jika tidak ada parameter invoice, tampilkan halaman tanpa data
        return view('trackingPage');
    }
}
