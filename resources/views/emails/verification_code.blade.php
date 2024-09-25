<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        h1 {
            color: #007bff;
        }
        .verification-code {
            font-size: 24px;
            font-weight: bold;
            color: #28a745;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kode Verifikasi Pendaftaran</h1>
        <p>Halo,</p>
        <p>Terima kasih telah mendaftar di layanan kami. Berikut adalah kode verifikasi Anda:</p>
        <p class="verification-code">{{ $code }}</p>
        <p>Kode verifikasi Anda adalah: {{ $code }}</p>
        <p>Kode ini akan kadaluarsa dalam 10 menit.</p>
        <p>Silakan masukkan kode ini di halaman pendaftaran untuk menyelesaikan proses verifikasi.</p>
        <p>Jika Anda tidak merasa mendaftar di layanan kami, mohon abaikan email ini.</p>
        <p>Terima kasih,<br>Tim Dukungan Kami</p>
    </div>
</body>
</html>
