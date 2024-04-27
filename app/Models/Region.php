<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;
    protected $table = 'region';
    protected $fillable = ['kota', 'provinsi'];

    public function homestays()
    {
        return $this->hasMany(Homestay::class);
    }


    public function getCitySlugAttribute()
    {
        return Str::slug($this->city);
    }
}