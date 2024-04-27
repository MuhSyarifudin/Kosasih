<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetersediaanHomestay extends Model
{
    use HasFactory;
    protected $table = 'ketersediaan_homestay';

    protected $fillable = ['tanggal', 'tersedia'];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
}
