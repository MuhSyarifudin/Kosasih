<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    use HasFactory;
    protected $table = 'homestay';

    protected $fillable = ['nama', 'deskripsi', 'alamat', 'harga_per_malam', 'gambar', 'region_id'];

    // Definisikan relasi dengan Region
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }

    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function ketersediaanKamarHomestay()
    {
        return $this->hasMany(KetersediaanHomestay::class, 'homestay_id');
    }


    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function events()
    {
        return $this->hasMany(Events::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'homestay_tags');
    }

    public function roomGalleries()
    {
        return $this->hasMany(RoomGallery::class);
    }
}