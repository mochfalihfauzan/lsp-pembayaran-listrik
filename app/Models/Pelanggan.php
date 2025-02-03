<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'nomor_kwh',
        'alamat',
        'nama_pelanggan',
        'id_tarif',
        'email',
        'password',
    ];

    public function penggunaan()
    {
        return $this->hasMany(Penggunaan::class, 'id_pelanggan', 'id');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'id_pelanggan', 'id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pelanggan', 'id');
    }

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif', 'id');
    }
}
