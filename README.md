<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Cara Menjalankan Laravel

Untuk menjalankan aplikasi Laravel, ikuti langkah-langkah berikut:

1. **Instalasi Dependensi**
   - Buka terminal dan arahkan ke direktori proyek Laravel Anda.
   - Jalankan perintah `composer install` untuk menginstal semua dependensi PHP.
   - Jika menggunakan npm, jalankan `npm install` untuk menginstal dependensi JavaScript.

2. **Konfigurasi Lingkungan**
   - Salin file `.env.example` menjadi `.env`.
   - Sesuaikan pengaturan database dan konfigurasi lainnya di file `.env`.

3. **Generate Kunci Aplikasi**
   - Jalankan perintah `php artisan key:generate` untuk menghasilkan kunci aplikasi.

4. **Migrasi Database**
   - Jalankan `php artisan migrate` untuk membuat struktur database.
   - Jika ada data awal, jalankan `php artisan db:seed`.

5. **Menjalankan Server Lokal**
   - Gunakan perintah `php artisan serve` untuk menjalankan server pengembangan lokal.
   - Akses aplikasi melalui browser di `http://localhost:8000`.

6. **Kompilasi Aset (Opsional)**
   - Jika menggunakan Laravel Mix, jalankan `npm run dev` untuk kompilasi aset satu kali.
   - Dan jalankan `php artisan queue:work` untuk mengirim email

Dengan mengikuti langkah-langkah di atas, Anda seharusnya dapat menjalankan aplikasi Laravel Anda dengan sukses.

## Tentang Laravel

Laravel adalah kerangka kerja aplikasi web dengan sintaks yang ekspresif dan elegan. Kami percaya pengembangan harus menjadi pengalaman yang menyenangkan dan kreatif agar benar-benar memuaskan. Laravel menghilangkan kesulitan pengembangan dengan memudahkan tugas-tugas umum yang digunakan dalam banyak proyek web, seperti:

- [Mesin routing yang sederhana dan cepat](https://laravel.com/docs/routing).
- [Kontainer injeksi dependensi yang kuat](https://laravel.com/docs/container).
- Beberapa back-end untuk penyimpanan [sesi](https://laravel.com/docs/session) dan [cache](https://laravel.com/docs/cache).
- [ORM database](https://laravel.com/docs/eloquent) yang ekspresif dan intuitif.
- [Migrasi skema](https://laravel.com/docs/migrations) database yang agnostik.
- [Pemrosesan pekerjaan latar belakang](https://laravel.com/docs/queues) yang kuat.
- [Penyiaran acara real-time](https://laravel.com/docs/broadcasting).

Laravel dapat diakses, kuat, dan menyediakan alat yang diperlukan untuk aplikasi besar dan kuat.

## Lisensi

Kerangka kerja Laravel adalah perangkat lunak open-source yang dilisensikan di bawah [lisensi MIT](https://opensource.org/licenses/MIT).
