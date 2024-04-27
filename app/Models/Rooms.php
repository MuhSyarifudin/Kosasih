<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $fillable = ['nama', 'kapasitas', 'harga_per_malam', 'deskripsi', 'main_image_id', 'homestay_id', 'fasilitas_id'];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }

    public function ketersediaanKamarHomestay()
    {
        return $this->hasMany(KetersediaanKamarHomestay::class);
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'room_id');
    }

    public function mainImage()
    {
        return $this->belongsTo(RoomGallery::class, 'main_image_id');
    }

}