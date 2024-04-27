<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananTambahan extends Model
{
    use HasFactory;
    protected $table = 'layanan_tambahan';

    protected $fillable = ['nama', 'deskripsi', 'harga', 'homestay_id', 'room_id', 'tamu_id'];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
    public function room()
    {
        return $this->belongsTo(Rooms::class,);
    }

    public function tamu()
    {
        return $this->belongsTo(Tamu::class);
    }

    public function pemesanan()
    {
        return $this->belongsToMany(Pemesanan::class);
    }

}
