@extends('layouts.content-layout')

@section('page-name', 'Dashboard')
@section('page-description', 'Halaman Utama')
@push('styles')
<style>
    .bg-card {
        background-color: #2c3e50;
    }

    .glass-effect {
        background-color: rgb(255, 255, 255, 0.1) !important;
        /* Semi-transparent background */
        border-radius: 10px !important;
        backdrop-filter: blur(3px) !important;
        /* Adjust the blur to control the glass effect */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1) !important;
        transition: 0.3s ease-in-out all !important;
    }

    .img-crop {
        width: 160px;
        height: 160px;
        object-fit: cover;
        border-radius: 50%;
        border: 7px solid rgba(44, 62, 80, 1.0);
    }

    .img-thumbnail {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 7px solid rgba(44, 62, 80, 1.0);
    }

    .relative {
        position: relative;
    }

    .btn-avatar {
        background-color: #F0BC74;
        color: white;
        border-radius: 50%;
        border: 2px solid white;
        position: absolute;
        bottom: 8px;
        right: 8px;
    }

    #card-welcome canvas {
        filter: drop-shadow(0 0 4px white);
    }

    .bg-card {
        background-color: #000;
        /* Atau warna gelap untuk space vibes */
        color: white;
    }

    .card-bg {
        position: absolute;
        inset: 0;
        /* top:0; bottom:0; left:0; right:0; */
        pointer-events: none;
        /* Supaya background nggak nangkep event mouse */
        z-index: 0;
        /* Dibawah konten card */
        overflow: hidden;
    }

    .star {
        position: absolute;
        background: white;
        border-radius: 50%;
        opacity: 0.8;
        animation: twinkle 3s infinite alternate;
    }

    @keyframes twinkle {
        0% {
            opacity: 0.3;
        }

        100% {
            opacity: 1;
        }
    }

    /* Planet bisa lo custom lagi sesuai gambar */
    .planet {
        position: absolute;
        width: 40px;
        /* contoh ukuran */
        animation: float 6s ease-in-out infinite alternate;
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        100% {
            transform: translateY(-15px);
        }
    }

</style>
<link rel="stylesheet" href="{{ asset('') }}owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="{{ asset('') }}owlcarousel/assets/owl.theme.default.min.css">
@endpush
@section('content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="card bg-card position-relative overflow-hidden">
                    <div class="card-body" id="card-welcome">
                        <div class="card-bg" aria-hidden="true"></div>
                        <h3 class="text-white"> Selamat Datang, <b>{{ Auth::user()->name }}</b></h3>
                        <div class="row">

                            <div class="col-md-9">

                                <div class="card card-body glass-effect">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card card-body">
                                                <div class="card-title d-flex justify-content-between align-items-center">
                                                    <h6><strong>Badge diperoleh</strong></h6>
                                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-badge">Lihat semua</button>
                                                </div>

                                                <div class="owl-carousel owl-theme" id="badge-diperoleh">
                                                    @foreach ($badge as $key => $value)
                                                    @if ($value['get'])
                                                    <div class="item mx-2" style="width:160px" data-merge="1">
                                                        <div class="card card-body text-center">
                                                            <img src="{{ asset('badges/' . $value['badge']) }}" alt="" class="img-fluid rounded-circle" {{ $value['get'] ? '' : 'style=filter:grayscale(100%);' }}>
                                                            <strong>{{ $key }}</strong>
                                                            @if (!$value['get'])
                                                            <p class="text-muted mb-0"> --- Progress ---
                                                            </p>
                                                            <div class="progress m-0" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar text-bg-warning" style="width: {{ $value['percentage'] }}%; height:20px">
                                                                </div>
                                                            </div>

                                                            <small class="text-center m-0 p-0" style="font-size: 10px;">{{ $point }}/{{ $value['minimum_point'] }}
                                                                ({{ $value['percentage'] }}%)
                                                            </small>
                                                            @else
                                                            <h6 class='bx bx-check-circle mt-2 text-success badge-done'>
                                                                {{ ucwords($key) }}</h6>
                                                            <span class="badge rounded-pill text-bg-success">Diperoleh</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endforeach

                                                    @if ($rank == 1)
                                                    <div class="item mx-2" style="width:160px" data-merge="1">
                                                        <div class="card card-body text-center">
                                                            <img src="{{ asset('badges/6.png') }}" alt="" class="img-fluid rounded-circle">
                                                            <strong>Peringkat 1</strong>
                                                            <h6 class='bx bx-check-circle text-success badge-done'>
                                                                {{ ucwords('Tak terkalahkan') }}</h6>
                                                            <span class="badge rounded-pill text-bg-success">Diperoleh</span>

                                                        </div>
                                                    </div>
                                                    @endif

                                                    @if (count($badge) == 0)
                                                    <div class="item" style="width:160px" data-merge="1">
                                                        <div class="card card-body text-center">
                                                            <strong>Belum ada badge yang diperoleh</strong>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="progres-belajar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-body rounded-4 d-flex justify-content-center align-items-center glass-effect border-none">
                                    <div class="relative">
                                        <img src="{{ asset('assets') }}/images/user/avatar-2.jpg" alt="" class="img-fluid mt-1 img-crop rounded-circle" id="avatar-image">
                                    </div>
                                    <h4 class="mt-1 fw-bold text-center text-white">{{ Auth::User()->name }}</h4>
                                    <div class="mb-2">
                                        <span class="badge bg-info rounded-pill text-bg-secondary d-inline">#
                                            {{ $rank }}</span>
                                        <span class="badge bg-primary rounded-pill text-bg-primary d-inline"><i class='bx bx-coin me-2'></i>{{ Auth::User()->countPoint() }}
                                            pts</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card card-body">
                            <h2 class="card-title">Peringkat Kelas</h2>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;">Peringkat</th>
                                            <th style="width: 30%;">Siswa</th>
                                            <th style="width: 20%;">Progress</th>
                                            <th style="width: 20%;">Point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1 @endphp
                                        @foreach ($topUsers as $users)
                                        <tr>
                                            <td>#{{ $no }}</td>
                                            <td class="d-flex align-items-center">
                                                <img src="{{ asset('assets') }}/images/user/avatar-2.jpg" alt="" alt="" class="img-fluid rounded-circle me-2" style="height: 30px; width:30px" id="avatar-image">
                                                {{ $users->name }}
                                            </td>
                                            <td class="">
                                                @php
                                                $no++;
                                                $finished = floor(
                                                (($users->learningProgress->count() +
                                                $users->evaluasi->count()) /
                                                $total) *
                                                100,
                                                );
                                                @endphp
                                                <div class="progress mt-2" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height: 15px">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{ $finished }}%;">{{ $finished }}%
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $users->countPoint() }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-body d-none">
                            <h2 class="card-title">Kuis dan Evaluasi</h2>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Materi</th>
                                            <th scope="col">Nilai</th>
                                            <th scope="col">Lulus</th>
                                            <th scope="col">Tgl Mengerjakan</th>
                                        </tr>
                                    </thead>
                                    @foreach ($nilai_kuis as $nilai)
                                    <tr>
                                        <th scope="row">{{ str_replace('-', ' ', $nilai->materi) }}</th>
                                        <td>{{ $nilai->nilai }}</td>
                                        <td>{{ $nilai->status }}</td>
                                        <td>{{ $nilai->waktu_selesai }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                                @if (count($nilai_kuis) == 0)
                                <div class="alert alert-primary" role="alert">
                                    Belum ada Kuis Yang dikerjakan!
                                </div>
                                @endif
                            </div>

                        </div>

                        <div class="card card-body">
                            <h2 class="card-title">Statistik Pembelajaran</h2>
                            @foreach ($list_materi as $key => $value)
                            <div class="card card-body rounded-5">
                                <div class="d-flex justify-content-between align-items-center ">
                                    <p class="m-0 p-0">{{ $value['title'] }}</p>

                                    {{-- PERUBAHAN DISINI --}}
                                    @if ($value['quiz_done'])
                                    {{-- Kalau sudah dikerjakan, tampilkan nilai (berapapun nilainya) --}}
                                    @if($value['model_kuis'] >= 70)
                                    {{-- Opsional: Kasih warna hijau kalau lulus KKM --}}
                                    <span class="badge text-bg-success">Nilai Kuis : {{ $value['model_kuis'] }}</span>
                                    @else
                                    <span class="badge text-bg-warning">Nilai Kuis : {{ $value['model_kuis'] }}</span>
                                    @endif
                                    @else
                                    {{-- Kalau belum dikerjakan --}}
                                    <span class="badge text-bg-secondary">Kuis Belum Dikerjakan</span>
                                    @endif
                                    {{-- AKHIR PERUBAHAN --}}

                                </div>
                                <div class="mt-2">
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="{{ $value['percentage'] }}" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: {{ $value['percentage'] }}%;"></div>
                                    </div>
                                    <p class="mt-1 mb-0 fw-bold">{{ $value['percentage'] }}% - {{ $value['count'] }} / {{ $value['total'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-badge" tabindex="-1" aria-labelledby="modal-badge" aria-hidden="true">
    <!-- Modal dialog dengan ukuran ekstra besar -->
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Header modal -->
            <div class="modal-header">
                <h5 class="modal-title">Semua Lencana</h5> <!-- Judul modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- Tombol tutup modal -->
            </div>
            <!-- Body modal -->
            <div class="modal-body">
                <!-- Carousel untuk menampilkan semua lencana -->
                <div class="owl-carousel owl-theme" id="all-badge">
                    @foreach ($badge as $key => $value)
                    <!-- Looping melalui setiap lencana -->
                    @if (isset($value['badge']))
                    <!-- Memeriksa apakah lencana ada -->
                    @if ($value['get'])
                    <!-- Jika lencana sudah diperoleh -->
                    <div class="item" style="width:160px" data-bs-placement="bottom" data-merge="1" data-bs-toggle="tooltip" data-bs-title="{{ $key }} diperoleh">
                        @else
                        <!-- Jika lencana belum diperoleh -->
                        <div class="item" style="width:160px" data-merge="1">
                            @endif
                            <!-- Kartu untuk menampilkan informasi lencana -->
                            <div class="card card-body text-center">
                                <img src="{{ asset('badges/' . $value['badge']) }}" alt="" class="img-fluid rounded-circle" {{ $value['get'] ? '' : 'style=filter:grayscale(100%);' }}>
                                <!-- Gambar lencana -->
                                <strong>{{ $key }}</strong> <!-- Nama lencana -->
                                @if (!$value['get'])
                                <!-- Jika lencana belum diperoleh -->
                                <p class="text-muted">
                                    <!-- Progress bar untuk menunjukkan kemajuan -->
                                    <div class="progress m-0" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height:10px;">
                                        <div class="progress-bar text-bg-warning" style="width: {{ $value['percentage'] }}%; ">
                                        </div>
                                    </div>
                                    <!-- Menampilkan informasi poin -->
                                    <small class="text-center m-0 p-0" style="font-size: 10px;">{{ $point }}/{{ $value['point_minimum'] }}
                                        Point
                                        ({{ $value['percentage'] }}%)
                                    </small>
                                    @else
                                    <!-- Jika lencana sudah diperoleh -->
                                    <h1 class='bx bx-check-circle text-success badge-done'></h1>
                                    <span class="badge rounded-pill text-bg-success">Diperoleh</span>
                                    <!-- Ikon centang hijau -->
                                    @endif
                            </div>
                        </div> <!-- Penutup div.item -->
                        @endif
                        @endforeach
                        @if ($rank == 1)
                        <div class="item mx-2" style="width:160px" data-merge="1">
                            <div class="card card-body text-center">
                                <img src="{{ asset('badges/6.png') }}" alt="" class="img-fluid rounded-circle">
                                <h6 class='bx bx-check-circle text-success badge-done'>
                                    {{ ucwords('Tak terkalahkan') }}</h6>
                                <span class="badge rounded-pill text-bg-success">Diperoleh</span>

                            </div>
                        </div>
                        @endif
                    </div> <!-- Penutup div.owl-carousel -->
                </div> <!-- Penutup div.modal-body -->
            </div> <!-- Penutup div.modal-content -->
        </div> <!-- Penutup div.modal -->
    </div>
</div>
@endsection

{{-- @include('components.badge-modal') --}}

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('') }}owlcarousel/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>

<script>
    $('#badge-diperoleh').owlCarousel({
        loop: false
        , margin: 0
        , responsive: {
            0: {
                items: 1
            }
            , 600: {
                items: 2
            }
            , 1000: {
                items: 3
            }
            , 1800: {
                items: 4
            }
        }
    })

    $("#all-badge").owlCarousel({
        loop: false
        , margin: 10
        , responsiveClass: true
        , responsive: {
            0: {
                items: 1
                , nav: true
            }
            , 600: {
                items: 3
                , nav: false
            }
            , 1000: {
                items: 6
                , nav: true
                , loop: false
            }
        }
    });

    var optionsProgress = {
        chart: {
            height: 280
            , type: "radialBar"
        , },
        // --- PERBAIKAN DISINI ---
        // Cukup pakai satu pasang kurung kurawal Blade
        series: [{{$percentage}}],
        // ------------------------
        colors: ["#20E647"]
        , plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0
                    , size: "70%"
                    , background: "#293450"
                }
                , track: {
                    dropShadow: {
                        enabled: true
                        , top: 2
                        , left: 0
                        , blur: 4
                        , opacity: 0.15
                    }
                }
                , dataLabels: {
                    name: {
                        offsetY: -10
                        , color: "#fff"
                        , fontSize: "13px"
                    }
                    , value: {
                        color: "#fff"
                        , fontSize: "30px"
                        , show: true
                    }
                }
            }
        }
        , fill: {
            type: "gradient"
            , gradient: {
                shade: "dark"
                , type: "vertical"
                , gradientToColors: ["#87D4F9"]
                , stops: [0, 100]
            }
        }
        , stroke: {
            lineCap: "round"
        }
        , labels: ["Progress Belajar"]
    };

    var chartprogress = new ApexCharts(document.querySelector("#progres-belajar"), optionsProgress);

    chartprogress.render();

    const cardBg = document.querySelector('.card-bg');

    function createStars(numStars) {
        // Cek dulu apakah cardBg ada biar gak error di console
        if (!cardBg) return;

        for (let i = 0; i < numStars; i++) {
            const star = document.createElement('div');
            star.classList.add('star');

            const size = Math.random() * 2 + 1;
            const x = Math.random() * cardBg.clientWidth;
            const y = Math.random() * cardBg.clientHeight;

            const opacity = Math.random() * 0.5 + 0.5;
            const delay = Math.random() * 3;

            star.style.width = `${size}px`;
            star.style.height = `${size}px`;
            star.style.left = `${x}px`;
            star.style.top = `${y}px`;
            star.style.opacity = opacity;
            star.style.animationDelay = `${delay}s`;

            cardBg.appendChild(star);
        }
    }

    createStars(100);

    function createPlanet(src, top, left, size = 40) {
        if (!cardBg) return;

        const planet = document.createElement('img');
        planet.src = src;
        planet.classList.add('planet');
        planet.style.top = top;
        planet.style.left = left;
        planet.style.width = `${size}px`;
        cardBg.appendChild(planet);
    }

    // --- PERBAIKAN PATH GAMBAR ---
    // Gunakan asset() agar gambar tetap muncul dimanapun routenya
    createPlanet("{{ asset('images/welcomepage/1.png') }}", '10%', '80%');
    createPlanet("{{ asset('images/welcomepage/2.png') }}", '20%', '70%');
    createPlanet("{{ asset('images/welcomepage/3.png') }}", '30%', '60%');
    createPlanet("{{ asset('images/welcomepage/4.png') }}", '40%', '50%');
    createPlanet("{{ asset('images/welcomepage/5.png') }}", '90%', '10%', 60);
    createPlanet("{{ asset('images/welcomepage/6.png') }}", '70%', '40%');

</script>
@endpush
