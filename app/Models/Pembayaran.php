<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tagihan',
        'id_pelanggan',
        'bulan_bayar',
        'tahun_bayar',
        'biaya_admin',
        'total_bayar',
        'id_user'
    ];

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class, 'id_tagihan', 'id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
