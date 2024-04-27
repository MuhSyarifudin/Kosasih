<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'subject', 'message', 'tamu_id'];

    public function tamu()
    {
        return $this->belongsTo(Tamu::class, 'tamu_id');
    }
}