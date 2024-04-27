<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    protected $fillable = ['rating', 'ulasan', 'homestay_id', 'tamu_id', 'gallery_id'];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }

    public function tamu()
    {
        return $this->belongsTo(Tamu::class);
    }
    public function gallery()
    {
        return $this->hasOne(ReviewGallery::class, 'id', 'gallery_id');
    }
}
