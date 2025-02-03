<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penggunaan;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class PenggunaanListrikController extends Controller
{
    public function penggunaanListrikAdmin()
    {
        $pelanggan = Pelanggan::with(['penggunaan', 'tarif', 'tagihan'])->get();
        $penggunaan = Penggunaan::with(['pelanggan', 'tagihan', 'tarif'])->get();
        return view('admin.penggunaan-listrik', [
            'pelanggan' => $pelanggan,
            'penggunaan' => $penggunaan
        ]);
    }

    public function createPenggunaanListrikAdmin($id)
    {
        $pelanggan = Pelanggan::with('penggunaan')->find($id);
        $awalMeter = 0;
        if ($pelanggan->penggunaan->count() > 0) {
            $awalMeter = $pelanggan->penggunaan->last()->meter_akhir;
        }

        return view('admin.create-penggunaan-listrik', ['pelanggan' => $pelanggan, 'awalMeter' => $awalMeter]);
    }

    public function createPenggunaanListrik(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
            'meter_awal' => 'required',
            'meter_akhir' => 'required',
        ]);

        $tagihan = $request->meter_akhir - $request->meter_awal;
        $totalTagihan = $tagihan * $pelanggan->tarif->tarif_per_kwh;
        Penggunaan::create([
            'id_pelanggan' => $pelanggan->id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
        ]);

        $pelanggan->tagihan()->create([
            'id_pelanggan' => $pelanggan->id,
            'id_penggunaan' => $pelanggan->penggunaan->last()->id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_meter' => $tagihan,
            'amount' => $totalTagihan,
            'status' => 0,
        ]);


        return redirect()->route('penggunaan-listrik-admin');
    }

    public function editPenggunaanListrikAdmin($id)
    {
        $penggunaan = Penggunaan::with('pelanggan')->find($id);
        return view('admin.edit-penggunaan-listrik', ['penggunaan' => $penggunaan]);
    }

    public function updatePenggunaanListrik(Request $request, $id)
    {
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
            'meter_awal' => 'required',
            'meter_akhir' => 'required',
        ]);
        Penggunaan::find($id)->update([
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
        ]);
        return redirect()->route('penggunaan-listrik-admin');
    }

    public function updatePembayaran(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $tagihan = Tagihan::find($request->id);
        $tagihan->update([
            'status' => 1,
        ]);
        return redirect()->route('penggunaan-listrik-admin');
    }

    public function destroyPenggunaanListrik($id)
    {
        Penggunaan::destroy($id);
        return redirect()->route('penggunaan-listrik-admin');
    }
}
