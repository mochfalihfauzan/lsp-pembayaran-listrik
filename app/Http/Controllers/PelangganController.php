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
        // menampilkan data User yang login
        $user = Auth::user();

        // menampilkan data Tarif
        $tarifs = Tarif::all();

        // menampilkan view
        return view('auth-user.register', [
            'user' => $user,
            'tarifs' => $tarifs,
        ]);
    }

    public function store(Request $request)
    {
        // validasi data
        $request->validate([
            'username' => 'required|unique:pelanggans',
            'nomor_kwh' => 'required',
            'alamat' => 'required',
            'nama_pelanggan' => 'required',
            'id_tarif' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // menyimpan data ke database
        Pelanggan::create([
            'username' => $request->username,
            'nomor_kwh' => $request->nomor_kwh,
            'alamat' => $request->alamat,
            'nama_pelanggan' => $request->nama_pelanggan,
            'id_tarif' => $request->id_tarif,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // redirect ke halaman dashboard user
        return redirect()->route('dashboard-user');
    }

    public function edit($id)
    {
        // menampilkan data pelanggan berdasarkan id
        $pelanggan = Pelanggan::find($id);

        // menampilkan data tarif
        $tarifs = Tarif::all();

        // menampilkan view
        return view('admin.pelanggan-manage.edit', [
            'pelanggan' => $pelanggan,
            'tarifs' => $tarifs,
        ]);
    }

    public function update(Request $request, $id)
    {

        // validasi data
        $request->validate([
            'username' => 'required',
            'nomor_kwh' => 'required',
            'alamat' => 'required',
            'nama_pelanggan' => 'required',
            'id_tarif' => 'required',
            'email' => 'required|email',
        ]);

        // mencari data pelanggan berdasarkan id
        $pelanggan = Pelanggan::find($id);

        // mengupdate data pelanggan
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
        // mencari data pelanggan berdasarkan id
        $pelanggan = Pelanggan::find($id);

        // menghapus data pelanggan
        $pelanggan->delete();

        return redirect()->route('pelanggan')->with('success', 'Pelanggan deleted successfully');
    }
}
