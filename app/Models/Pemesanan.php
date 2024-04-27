<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';

    protected $fillable = ['tanggal_checkin', 'tanggal_checkout', 'jumlah_tamu', 'total_harga', 'homestay_id', 'tamu_id', 'room_id'];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }

    public function tamu()
    {
        return $this->belongsTo(Tamu::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }

    public function layananTambahan()
    {
        return $this->belongsToMany(LayananTambahan::class);
    }

}