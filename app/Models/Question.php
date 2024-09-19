<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $fillable = ['perusahaan_id', 'pertanyaan'];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
