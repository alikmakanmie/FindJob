<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'survey_questions';
    protected $fillable = ['user_id', 'nama_perusahaan', 'deskripsi_perusahaan', 'produk_layanan', 'target_pasar', 'keunggulan_kompetitif', 'rencana_pengembangan'];
}
