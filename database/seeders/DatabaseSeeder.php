<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123123123'),
                'role' => 'admin',
            ]
        );

        $pengguna = User::updateOrCreate(
            ['email' => 'pengguna@example.com'],
            [
                'name' => 'Pengguna Biasa',
                'password' => Hash::make('qweqweqwe'),
                'role' => 'user',
            ]
        );

        $perusahaan = User::updateOrCreate(
            ['email' => 'perusahaan@example.com'],
            [
                'name' => 'Perusahaan',
                'password' => Hash::make('asdasdasd'),
                'role' => 'perusahaan',
            ]
        );

        \App\Models\Perusahaan::create([
            'user_id' => $perusahaan->id,
            'nama' => 'PT Maju Bersama',
            'alamat' => 'Jl. Raya Utama No. 123, Jakarta Pusat',
            'telepon' => '021-5551234',
            'email' => 'info@majubersama.com',
            'deskripsi' => 'Perusahaan teknologi informasi terkemuka di Indonesia',
            'deskripsi1' => null,
            'deskripsi2' => null,
            'deskripsi3' => null,
            'foto1' => null,
            'foto2' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \App\Models\Perusahaan::create([
            'user_id' => $perusahaan->id,
            'nama' => 'CV Karya Mandiri',
            'alamat' => 'Jl. Pahlawan No. 45, Surabaya',
            'telepon' => '031-7778888',
            'email' => 'hrd@karyamandiri.co.id',
            'deskripsi' => 'Perusahaan manufaktur yang fokus pada produk rumah tangga',
            'deskripsi1' => null,
            'deskripsi2' => null,
            'deskripsi3' => null,
            'foto1' => null,
            'foto2' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \App\Models\Perusahaan::create([
            'user_id' => $perusahaan->id,
            'nama' => 'PT Sejahtera Abadi',
            'alamat' => 'Jl. Diponegoro No. 78, Bandung',
            'telepon' => '022-6669999',
            'email' => 'contact@sejahteraabadi.com',
            'deskripsi' => 'Perusahaan properti dan pengembang perumahan terpercaya',
            'deskripsi1' => null,
            'deskripsi2' => null,
            'deskripsi3' => null,
            'foto1' => null,
            'foto2' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}