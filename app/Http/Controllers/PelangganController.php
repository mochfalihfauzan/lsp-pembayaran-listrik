<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tarifs = Tarif::all();
        return view('auth-user.register', [
            'user' => $user,
            'tarifs' => $tarifs,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:pelanggans',
            'nomor_kwh' => 'required',
            'alamat' => 'required',
            'nama_pelanggan' => 'required',
            'id_tarif' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Pelanggan::create([
            'username' => $request->username,
            'nomor_kwh' => $request->nomor_kwh,
            'alamat' => $request->alamat,
            'nama_pelanggan' => $request->nama_pelanggan,
            'id_tarif' => $request->id_tarif,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('dashboard-user');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::find($id);
        $tarifs = Tarif::all();
        return view('admin.pelanggan-manage.edit', [
            'pelanggan' => $pelanggan,
            'tarifs' => $tarifs,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'nomor_kwh' => 'required',
            'alamat' => 'required',
            'nama_pelanggan' => 'required',
            'id_tarif' => 'required',
            'email' => 'required|email',
        ]);

        $pelanggan = Pelanggan::find($id);

        $pelanggan->update([
            'username' => $request->username,
            'nomor_kwh' => $request->nomor_kwh,
            'alamat' => $request->alamat,
            'nama_pelanggan' => $request->nama_pelanggan,
            'id_tarif' => $request->id_tarif,
            'email' => $request->email,
        ]);
        return redirect()->route('pelanggan')->with('success', 'Pelanggan updated successfully');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan')->with('success', 'Pelanggan deleted successfully');
    }
}
