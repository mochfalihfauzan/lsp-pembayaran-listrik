<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $user_email = Auth::user()->email;
        $pelanggan = Pelanggan::with('tagihan')->where('email', $user_email)->first();
        if (!$pelanggan) {
            return redirect('/register-user');
        }
        $tagihan = $pelanggan->tagihan->where('status', 0)->first();
        $biaya_admin = 2500;



        return view('user.home', [
            'pelanggan' => $pelanggan,
            'tagihan' => $tagihan,
            'biaya_admin' => $biaya_admin,
        ]);
    }

    public function tagihanListrik()
    {
        $user_email = Auth::user()->email;
        $pelanggan = Pelanggan::with('tagihan')->where('email', $user_email)->first();
        $tagihanPelanggan = $pelanggan->tagihan->sortByDesc('created_at');
        $namaBulan = [
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
        return view('user.tagihan-listrik', [
            'pelanggan' => $pelanggan,
            'namaBulan' => $namaBulan,
            'tagihanPelanggan' => $tagihanPelanggan,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
