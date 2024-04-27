<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'image_path',
    ];

    public function reviews()
    {
        return $this->belongsTo(Reviews::class, 'gallery_id', 'id');
    }
}