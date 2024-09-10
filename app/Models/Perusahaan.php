<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\categories;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $fillable = ['user_id', 'nama', 'alamat', 'telepon', 'email', 'deskripsi', 'deskripsi1', 'deskripsi2', 'deskripsi3', 'foto', 'foto1', 'foto2', 'kategori_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(categories::class);
    }
}
