<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';

    protected $fillable = ['nama', 'url', 'homestay_id'];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
}