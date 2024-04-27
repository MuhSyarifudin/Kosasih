<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';

    protected $fillable = [
        'tanggal', 'tamu_id',
        'layanan_tambahan_id', 'total_harga', 'status_pembayaran', 'pemesanan_id'
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
    // Relasi ke model Tamu
    public function tamu()
    {
        return $this->belongsTo(Tamu::class, 'tamu_id');
    }

    public function service()
    {
        return $this->belongsTo(LayananTambahan::class, 'layanan_tambahan_id');
    }
    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
}