<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Member;
use App\Traits\WablasTrait;
use Illuminate\Http\Request;

class WAController extends Controller
{

    public function store(String $id)
    {
        // Mengambil data order berdasarkan ID yang diberikan
        $order = Order::with('members')->find($id);

        // Pastikan order ditemukan sebelum melanjutkan
        if ($order) {
            // Mengambil informasi member dari order
            $member = Member::findOrFail($order->member_id);

            // Pastikan member ditemukan sebelum melanjutkan
            if ($member) {
                // Mengambil phone number dan informasi lainnya
                $data['phone'] = $member->phone_number;
                $data['message'] = 'Laundry dengan nomor invoice ' . $order->invoice . ' atas nama ' . $order->customer_name . ' telah selesai diproses. Terima kasih telah menggunakan jasa kami.';
                $data['secret'] = false;
                $data['retry'] = false;
                $data['isGroup'] = false;

                // Asumsi Anda memiliki metode sendText dalam WablasTrait
                WablasTrait::sendText([$data]);

                return redirect()->back()->with('success', 'Pesan WhatsApp berhasil dikirim.');
            }
        }

        return redirect()->back()->with('error', 'Order tidak ditemukan atau member tidak ditemukan.');
    }
}
