<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome To Media Antariksa</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">
    <!-- [Page specific CSS] start -->
    <link href="assets/css/plugins/animate.min.css" rel="stylesheet" type="text/css">
    <!-- [Page specific CSS] end -->
    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="assets/fonts/tabler-icons.min.css">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="assets/fonts/feather.css">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="assets/fonts/fontawesome.css">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="assets/fonts/material.css">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="assets/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="assets/css/style-preset.css">

    <link rel="stylesheet" href="assets/css/landing.css">
</head>

<body class="landing-page" id="galaxy-background">
    <script id="__bs_script__">
        //<![CDATA[
        (function() {
            try {
                var script = document.createElement('script');
                if ('async') {
                    script.async = true;
                }
                script.src = '/browser-sync/browser-sync-client.js?v=2.29.3'.replace("HOST", location.hostname);
                if (document.body) {
                    document.body.appendChild(script);
                } else if (document.head) {
                    document.head.appendChild(script);
                }
            } catch (e) {
                console.error("Browsersync: could not append script tag", e);
            }
        })()
        //]]>
    </script>

    <!-- [ Main Content ] start -->
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ Header ] start -->
    <header id="home">

        <!-- [ Nav ] start -->
        <nav class="navbar navbar-expand-md navbar-dark top-nav-collapse default">
            <div class="container">
                <a class="navbar-brand" href="#">
                    Media Antariksa
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @auth
                            <li class="nav-item pe-1">
                                <a class="nav-link" href="">{{ Auth::User()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-sm btn-primary" href="{{ route('auth.logout') }}">Keluar</a>
                            </li>
                        @endauth

                        @if (Auth::user() == null)
                            <li class="nav-item pe-1 me-2">
                                <a class=" btn btn-primary" href="{{ route('login') }}">Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary" target="_blank"
                                    href="{{ route('auth.register') }}">Daftar</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- [ Nav ] start -->
        <div class="container">
            <div id="astronaut">
                <img src="{{ asset('images/welcomepage/5.png') }}" alt="astronaut" class="planet">
            </div>
            <div id="background-animations">
                <img src="{{ asset('images/welcomepage/1.png') }}" class="planet" style="top: 10%; left: 80%;">
                <img src="{{ asset('images/welcomepage/2.png') }}" class="planet" style="top: 40%; left: 60%;">
                <img src="{{ asset('images/welcomepage/4.png') }}" class="planet" style="top: 70%; left: 30%;">
                <img src="{{ asset('images/welcomepage/3.png') }}" class="planet" style="top: 24%; left: 40%;">
                <img src="{{ asset('images/welcomepage/6.png') }}" class="planet" style="top: 60%; left: 40%;">

            </div>
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-9 col-xl-6">
                    <h1 class="mt-sm-3 text-white mb-4 f-w-600 wow fadeInUp" data-wow-delay="0.2s">
                        @auth
                            <span class="text-white"> <span class="text-primary"> Selamat Datang, </span> <br>
                                {{ Auth::User()->name }}</span>
                        @else
                            <span class="text-primary">Selamat Datang Di</span>
                        @endauth
                        <br>
                        <span class="text-primary">di Media Pembelajaran Menjelajah Bumi Dan Antariksa</span>
                    </h1>
                    <h5 class="mb-4 text-white opacity-75 wow fadeInUp" data-wow-delay="0.4s">Jelajahi bumi dan
                        Antariksa, pahami bagaimana tata surya bekerja dan dampaknya bagi kehidupan kita!</h5>
                    <div class="my-5 wow fadeInUp" data-wow-delay="0.6s">
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary me-2">Lihat
                            CPP</button>
                        <a href="{{ route("materi","menjelajahi-bumi-dan-antariksa") }}" class="btn btn-primary"> <i
                                class="ti ti-eye me-1"></i> Mulai Belajar!</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6"></div>
            </div>


        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Capaian Pembelajaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Pada Akhir Fase C, Peserta didik mendemonstrasikan bagaimana sistem tata surya bekerja dan
                            kaitannya dengan gerak rotasi dan revolusi bumi. Peserta didik merefleksikan bagaimana
                            perubahan kondisi alam di permukaan bumi terjadi akibat faktor alam maupun perbuatan
                            manusia,
                            mengidentifikasi pola hidup yang menyebabkan terjadinya permasalahan lingkungan serta
                            memprediksi dampaknya terhadap kondisi sosial kemasyarakatan dan ekonomi.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- [ Header ] End -->
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/simplebar.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/fonts/custom-font.js"></script>
    <script src="assets/js/pcoded.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script>
        layout_change('light');
    </script>
    <script>
        change_box_container('false');
    </script>
    <script>
        layout_rtl_change('false');
    </script>
    <script>
        preset_change("preset-1");
    </script>
    <script>
        font_change("Public-Sans");
    </script>
    <script>
        const galaxyBackground = document.getElementById('galaxy-background');

        function createStars(numStars) {
            for (let i = 0; i < numStars; i++) {
                const star = document.createElement('div');
                star.classList.add('star');

                // Menentukan posisi acak untuk bintang
                const size = Math.random() * 3 + 1; // Ukuran bintang acak
                const x = Math.random() * window.innerWidth; // Posisi X acak
                const y = Math.random() * window.innerHeight; // Posisi Y acak

                // Menentukan kecepatan berkedip dan opacity bintang
                const opacity = Math.random() * 0.5 + 0.5;
                const delay = Math.random() * 3; // Delay acak untuk efek twinkle

                star.style.width = `${size}px`;
                star.style.height = `${size}px`;
                star.style.left = `${x}px`;
                star.style.top = `${y}px`;
                star.style.opacity = opacity;
                star.style.animationDelay = `${delay}s`; // Menambahkan delay acak untuk twinkle

                galaxyBackground.appendChild(star); // Menambahkan bintang ke galaksi
            }
        }

        createStars(500); // Membuat 100 bintang di galaksi



        let astronaut = document.getElementById("astronaut");

        let position = {
            x: 0,
            y: 0
        }; // Menyimpan posisi terakhir astronaut
        let target = {
            x: 0,
            y: 0
        }; // Menyimpan posisi target (posisi kursor)

        window.addEventListener("mousemove", (e) => {
            target.x = e.clientX; // Ambil posisi kursor pada sumbu X
            target.y = e.clientY; // Ambil posisi kursor pada sumbu Y
        });

        function moveAstronaut() {
            // Hitung perbedaan antara posisi astronaut dan target (kursor)
            position.x += (target.x - position.x) * 0.01; // 0.1 untuk memberikan efek melambat
            position.y += (target.y - position.y) * 0.01; // 0.1 untuk memberikan efek melambat

            // Terapkan transformasi pada astronaut
            astronaut.style.transform =
                `translate(${position.x - astronaut.offsetWidth / 2}px, ${position.y - astronaut.offsetHeight / 2}px)`;

            // Memanggil kembali fungsi untuk pergerakan animasi
            requestAnimationFrame(moveAstronaut);
        }

        // Mulai pergerakan astronaut
        moveAstronaut();
    </script>



    <script>
        // Start [ Menu hide/show on scroll ]
        let ost = 0;
        document.addEventListener('scroll', function() {
            let cOst = document.documentElement.scrollTop;
            if (cOst == 0) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
            } else if (cOst > ost) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
                document.querySelector(".navbar").classList.remove("default");
            } else {
                document.querySelector(".navbar").classList.add("default");
                document.querySelector(".navbar").classList.remove("top-nav-collapse");
            }

            if (cOst > 500) {
                document.querySelector(".pc-landing-custmizer").classList.add("active");
            } else {
                document.querySelector(".pc-landing-custmizer").classList.remove("active");
            }
            ost = cOst;
        });
        // End [ Menu hide/show on scroll ]
    </script>
    <!-- [Page Specific JS] end -->
</body>

</html>`
