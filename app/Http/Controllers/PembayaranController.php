<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'id_tagihan' => 'required',
            'id_pelanggan' => 'required',
            'bulan_bayar' => 'required',
            'tahun_bayar' => 'required',
            'biaya_admin' => 'required',
            'total_bayar' => 'required',
            'id_user' => 'required',
        ]);

        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $pembayaran = Pembayaran::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pembayaran->id . '-' . time(),
                'gross_amount' => $pembayaran->total_bayar,
            ),
            'customer_details' => array(
                'name' => $request->nama_pelanggan,
                'phone' => '081122334455',
                'email' => $request->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('user.checkout', ['snapToken' => $snapToken, 'pembayaran' => $pembayaran, 'bulan' => $bulan]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed === $request->signature_key) {
            if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
                // Pisahkan order_id untuk mendapatkan ID pembayaran asli
                $order_id_parts = explode('-', $request->order_id);
                $pembayaran_id = $order_id_parts[0];

                // Temukan pembayaran berdasarkan ID pembayaran asli
                $pembayaran = Pembayaran::with('tagihan')->find($pembayaran_id);
                if ($pembayaran) {
                    $pembayaran->tagihan->update([
                        'status' => 1,
                    ]);
                }
            }
        }
        return response()->json(['message' => 'Callback received']);
    }
}
