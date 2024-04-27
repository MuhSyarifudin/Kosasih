<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';

    protected $fillable = ['nama_event', 'gambar_event' , 'tanggal_mulai', 'tanggal_selesai', 'deskripsi', 'homestay_id'];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }
}
