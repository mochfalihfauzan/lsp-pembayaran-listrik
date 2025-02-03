<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pelanggan',
        'bulan',
        'tahun',
        'meter_awal',
        'meter_akhir',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class, 'id_penggunaan', 'id');
    }

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif', 'id');
    }
}
