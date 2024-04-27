<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff';

    protected $fillable = ['foto_staff','nama', 'jabatan', 'email', 'telepon', 'homestay_id'];

    public function homestay()
    {
        return $this->belongsTo(Homestay::class);
    }

}