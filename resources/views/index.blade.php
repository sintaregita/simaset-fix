<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/sass/app.scss')
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIMASET</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{asset('landing/assets/css/style.css')}}" rel="stylesheet">
<style>
    .btn-layanan{
        margin-right: 20px; 
        outline:none;
        
    }
</style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <img src="{{asset('landing/assets/img/logo.png')}}" alt="image" height="50" width="250">
            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a class=" btn-borderless btn-layanan" href="#layanans">Layanan</a>
                    </li>
                    <a href="{{route('login')}}" style="background-color: #9D2A17; color:#FFFFFF; border: 2px solid #9D2A17; padding: 7px 30px; border-radius: 5px;">Masuk
                        <i class="bi bi-caret-right-fill"></i></a>
                </ul>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center position-relative">
        <div class="container text-center text-md-left" data-aos="fade-up">
            <h1>Bagian Logistik</h1>
            <h2>Telkom University Surabaya</h2>
            <p>Melayani Civitas Akademika dalam Administrasi Peminjaman aset</p>
            <br>
            <a class="btn-selengkapnya active" href="#services">Selengkapnya</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <section id="services" class="services section-bg">
                    <div class="container" data-aos="fade-up">

                        <div class="section-title">
                            <h2 style="color: #9D2A17; font-weight: bold;">Tentang Kami</h2>
                            <p>Unit Logistik kami menawarkan solusi pengelolaan logistik yang inovatif dan efisien.
                                Dengan fokus
                                keandalan, kecepatan, dan berkelanjutan, kami bertekad untuk mendukung kelancaran
                                operasional kampus dan
                                memberikan pengalaman terbaik bagi seluruh komunitas akademis.</p>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 " data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon-box iconbox-satu p-3 rounded">
                                    <h4><a href="">Profesionalisme dan Keterampilan</a></h4>
                                    <p class="text-white"> Tim profesional yang berpengalaman dalam manajemen logistik,
                                        kami menyediakan layanan yang
                                        ditunjang oleh keahlian dan keterampilan tingkat tinggi.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 " data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon-box iconbox-dua p-3 rounded">
                                    <h4><a href="">Jaringan Mitra Luas</a></h4>
                                    <p class="text-white"> Jaringan mitra yang luas, Bagian logistik kami dapat
                                        mengoptimalkan serta memastikan efisiensi
                                        operasional dan memberikan nilai tambah kepada Telkom University Surabaya</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 " data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon-box iconbox-tiga p-3 rounded">
                                    <h4><a href="">Fleksibilitas Penyesuaian Kebutuhan</a></h4>
                                    <p class="text-white">Kami memahami bahwa setiap kebutuhan dapat berbeda. Sehingga,
                                        kami menawarkan solusi yang dapat
                                        disesuaikan, mulai dari pengelolaan inventaris aset hingga distribusi barang
                                        dengan tingkat
                                        fleksibilitas tertinggi.</p>
                                </div>
                            </div>

                        </div>
                </section><!-- End Sevices Section -->

                <!-- ======= Services Section ======= -->
                <section id="layanans" class="services section-bg">
                    <div class="container" data-aos="fade-up">

                        <div class="section-title">
                            <h2>Layanan</h2>
                            <p>Unit Logistik kami menawarkan solusi pengelolaan logistik yang inovatif dan efisien.
                                Dengan fokus
                                keandalan, kecepatan, dan berkelanjutan, kami bertekad untuk mendukung kelancaran
                                operasional kampus dan
                                memberikan pengalaman terbaik bagi seluruh komunitas akademis.</p>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-2 " data-aos="zoom-in" data-aos-delay="100">
                                <div class="service-box iconbox-satu p-3 rounded">
                                    <h4><a href="">Peminjaman Aset</a></h4>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-2 " data-aos="zoom-in" data-aos-delay="100">
                                <div class="service-box iconbox-dua p-3 rounded">
                                    <h4><a href="">Pemeliharaan Aset</a></h4>
                                </div>
                            </div>
                </section><!-- End Sevices Section -->


        </section><!-- End Sevices Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <img src="{{asset('landing/assets/img/footer.png')}}" alt="image" height="230" width="230">
                <div class="row gy-3">
                </div>
                <div class="col-lg-9 col-md-6 footer-links" style="margin-top: 20px; margin-left: 20px;">
                    <h4>Kontak Kami</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                    <div class="alamat" style="margin-top: 20px; margin-left: 5px; width: 280px;">
                        <p>Bagian Logistik Lt. Ground Gedung Utama Jl. Ketintang Timur 156, Surabaya</p>
                        <p>(+62) 811 - 3221 - 2000</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; 2024 <strong><span>-</span></strong> Bagian Logistik Telkom University Surabaya
            </div>
            <div class="credits">
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>