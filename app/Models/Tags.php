<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $table = 'tags';

    protected $fillable = ['nama_lokasi', 'jarak', 'homestay_id'];

    public function homestay()
    {
        return $this->belongsToMany(Homestay::class);
    }
}