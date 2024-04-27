<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetersediaanKamarHomestay extends Model
{
    use HasFactory;
    protected $table = 'ketersediaan_kamar_homestay';

    protected $fillable = ['tanggal', 'tersedia', 'room_id', 'homestay_id'];

    public function rooms()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }
    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
}