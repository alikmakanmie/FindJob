<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nomor_telepon',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'foto',
        'foto_ktp',
        'email_verified_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}