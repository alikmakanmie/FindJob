@extends('Frontend.LayOut.Halaman.welcome')

@section('content')
<section class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>Tentang CareerSky</h2>
                    </div>
                    <p>
                        CareerSky adalah platform pencarian kerja yang menghubungkan pencari kerja dengan perusahaan-perusahaan terbaik di Indonesia. Kami berkomitmen untuk membantu setiap individu menemukan pekerjaan impian mereka dan membantu perusahaan menemukan talenta terbaik.
                    </p>
                    <p>
                        Dengan fitur-fitur canggih dan database perusahaan yang luas, kami memudahkan proses pencarian kerja dan perekrutan. Platform kami menyediakan informasi lengkap tentang lowongan pekerjaan, profil perusahaan, dan berbagai resources yang berguna bagi pengembangan karir.
                    </p>
                    <p>
                        Visi kami adalah menjadi platform pencarian kerja terdepan yang mengutamakan transparansi, kemudahan akses, dan kesempatan yang setara bagi semua pencari kerja di Indonesia.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-box">
                    <img src="{{ asset('/assets/images/about-img.jpg') }}" alt="Tentang CareerSky">
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="feature-box text-center">
                    <i class="fa fa-users fa-3x mb-3"></i>
                    <h4>Jaringan Luas</h4>
                    <p>Terhubung dengan ribuan perusahaan dan pencari kerja di seluruh Indonesia</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box text-center">
                    <i class="fa fa-check-circle fa-3x mb-3"></i>
                    <h4>Terpercaya</h4>
                    <p>Informasi lowongan kerja yang terverifikasi dan dapat dipercaya</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box text-center">
                    <i class="fa fa-rocket fa-3x mb-3"></i>
                    <h4>Inovatif</h4>
                    <p>Fitur-fitur modern untuk pengalaman pencarian kerja yang lebih baik</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.about_section {
    padding: 90px 0;
    background-color: #f8f9fa;
}

.detail-box h2 {
    color: #002c3f;
    margin-bottom: 30px;
}

.detail-box p {
    color: #555;
    line-height: 1.8;
    margin-bottom: 20px;
}

.img-box img {
    width: 100%;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.feature-box {
    padding: 30px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
    transition: transform 0.3s ease;
}

.feature-box:hover {
    transform: translateY(-5px);
}

.feature-box i {
    color: #007bff;
    margin-bottom: 20px;
}

.feature-box h4 {
    color: #002c3f;
    margin-bottom: 15px;
}

.feature-box p {
    color: #666;
}
</style>
@endsection
