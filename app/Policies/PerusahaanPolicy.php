<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Perusahaan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerusahaanPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Perusahaan $perusahaan)
    {
        // Logika untuk menentukan apakah user bisa mengupdate perusahaan
        // Contoh: hanya pemilik perusahaan yang bisa mengupdate
        return $user->id === $perusahaan->user_id;
    }

    public function createQuestion(User $user, Perusahaan $perusahaan)
    {
        // Logika untuk menentukan apakah user bisa membuat pertanyaan
        // Contoh: semua user yang terautentikasi bisa membuat pertanyaan
        return true;
    }
}
