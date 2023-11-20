<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Member;
use App\Traits\WablasTrait;
use Illuminate\Http\Request;

class WAController extends Controller
{
    public function store()
    {
        $kumpulan_data = [];

        $orders = Order::all();

        foreach ($orders as $order) {
            $member = Member::find($order->member_id);

            if ($member) {
                $data['phone'] = $member->phone_number;
                $data['message'] = 'Laundry Selesai';
                $data['secret'] = false;
                $data['retry'] = false;
                $data['isGroup'] = false;
                array_push($kumpulan_data, $data);
            }
        }


        WablasTrait::sendText($kumpulan_data);

        return redirect()->back();
    }
}
