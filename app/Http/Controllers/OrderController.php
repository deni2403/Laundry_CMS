<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Member;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $services = Service::all();
        $logs = Log::all();
        $members = Member::all();
        $users = User::all();
        return view('orders.create', compact('orders', 'services', 'logs', 'members', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        $newOrder->user_id = Auth::user()->id;
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

        if ($newOrder->service_id == 1) {
            $point = 10;
        } elseif ($newOrder->service_id == 2) {
            $point = 20;
        } else {
            $point = 0; // Default jika tidak sesuai dengan kondisi di atas
        }

        $member = Member::find($newOrder->member_id);
        if ($member) {
            $member->total_point += $point;
            $member->save();
        }

        // // Menghitung diskon berdasarkan poin (misalnya, setiap 1 poin = 1 rupiah diskon)
        // $discount = $member->total_point;

        // // Mengurangkan diskon dari total harga order
        // $newOrder->total_price -= $discount;
        // $newOrder->save();


        return redirect()->route('dashboard')->with('success', '');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
