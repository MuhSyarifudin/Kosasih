<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $table = 'maintenance'; // Sesuaikan dengan nama tabel yang Anda gunakan
    protected $fillable = ['is_shutdown'];
}