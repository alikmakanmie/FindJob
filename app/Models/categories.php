<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\Relations\HasMany;

class categories extends Model
{
    protected $fillable = ['name'];

    public function perusahaan(): HasMany
    {
        return $this->hasMany(perusahaan::class);
    }
}
