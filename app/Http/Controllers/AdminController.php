<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $users = User::all();
        $tagihan = Tagihan::all();
        return view('admin.home', [
            'pelanggan' => $pelanggan,
            'users' => $users,
            'tagihan' => $tagihan,
        ]);
    }
}
