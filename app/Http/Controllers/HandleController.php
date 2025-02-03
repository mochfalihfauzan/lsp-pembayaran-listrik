<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === "admin") {
            return redirect()->route('dashboard-admin');
        } elseif ($user->role === "user") {
            return redirect()->route('dashboard-user');
        } else {
            return redirect('/');
        }
    }
}
