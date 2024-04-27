<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'main_image',
        'homestay_id'
    ];

    public function room()
    {
        return $this->hasMany(Rooms::class);
    }

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
}