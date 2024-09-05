<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $fillable = ['user_id', 'nama', 'alamat', 'telepon', 'email', 'deskripsi', 'deskripsi1', 'deskripsi2', 'deskripsi3', 'foto', 'foto1', 'foto2'];
}
