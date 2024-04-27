<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';

    protected $fillable = ['gambar_fasilitas','nama_fasilitas','jumlah', 'deskripsi', 'homestay_id', 'room_id'];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
    public function rooms()
    {
        return $this->belongsTo(Rooms::class);
    }
}