<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;
    protected $table = 'tamu';
    protected $fillable = [
        'foto_tamu',
        'nama_tamu',
        'email_tamu',
        'password_tamu',
        'file_tamu',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'tamu_id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'tamu_id');
    }


    public function getAuthPassword()
    {
        return $this->password_tamu;
    }

    /**
     * Validate the user credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(array $credentials): bool
    {
        // Sesuaikan logika validasi kredensial sesuai kebutuhan Anda
        return password_verify($credentials['password_tamu'], $this->getAuthPassword());
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'tamu_id');
    }
}
