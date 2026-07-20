@extends('layouts.content-layout')

@section('page-name', 'Bulan')
@section('page-description', 'Berkenalan dengan Bulan')


@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row  align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Menjelajahi sistem tata surya!</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">Mengenal Lebih Dalam Tentang Planet</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="content">

                <section id="page-1">
                    <div class="card shadow p-4 mb-4 border-0">
                        <h2 class="fw-bold mb-3 text-warning">🌌 Tata Surya</h2>
                        <p>
                            Tata surya adalah sebuah sistem di luar angkasa yang terdiri atas Matahari, delapan planet
                            dengan Bulannya, serta benda-benda langit lainnya, seperti komet, asteroid, dan meteorid.
                            Semua benda-benda ini mengorbit pada Matahari sebagai pusat dari tata surya. Masing-masing
                            planet memiliki karakteristik, yaitu jarak dari Matahari, orbit, temperatur, dan periode rotasi
                            serta revolusi.
                        </p>
                        <div class="text-center mt-3">
                            <img src="{{ asset('images/content/planets-solar-system.jpg') }}"
                                alt="Gambar 12 Kumpulan Planet" class="img-fluid rounded shadow-sm"
                                style="max-height: 300px;">
                            <p class="text-muted mt-2">Gambar 12: Kumpulan Planet</p>
                        </div>
                    </div>

                </section>
                <section id="page-2">
                    <div class="card shadow p-4 mb-4 mx-5 border-0">
                        <h2 class="fw-bold mb-3">🪐 Pengelompokan Planet</h2>
                        <p>
                            Walaupun planet berbeda-beda karakteristiknya, namun ada beberapa karakteristik yang serupa.
                            Para ilmuwan astronomi mengelompokkan planet ke dalam beberapa hal, misalnya planet
                            dikelompokkan berdasarkan penyusunnya.
                        </p>
                        <p>
                            Planet-planet yang tersusun atas <strong>batu dan logam</strong> seperti Bumi disebut
                            <strong>planet bebatuan</strong> (terestrial).
                            Adapun planet yang tersusun atas <strong>gas atau es</strong>, seperti Jupiter dan Uranus,
                            disebut <strong>planet gas raksasa</strong> (jovian).
                        </p>
                        <div class="text-center mt-3">
                            <img src="{{ asset('images/content/jenis-planet.png') }}" alt="Gambar 12 Kumpulan Planet"
                                class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                            <p class="text-muted mt-2">Gambar 12: Kumpulan Planet</p>
                        </div>
                    </div>
                    <div class="alert alert-primary mx-5" role="alert">
                        <h4 class="alert-heading">! Klik panan kanan dan kiri untuk melihat planet lainnya!</h4>

                    </div>

                    <div id="carouselExampleFade" class="carousel slide carousel-dark">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card shadow p-5  mx-5 border-0">
                                    <div class="row  ">
                                        <div class="col-md-6">
                                            <div class="text-center mt-3">
                                                <img src="{{ asset('images/content/Merkurius.png') }}"
                                                    alt="Gambar 12 Kumpulan Planet" class="img-fluid rounded shadow-sm"
                                                    style="max-height: 300px;">
                                                <p class="text-muted mt-2">Gambar 12: Kumpulan Planet</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 class="fw-bold mb-3">🪐 Merkurius</h1>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Nama Planet</td>
                                                    <td>: Merkurius</td>
                                                </tr>
                                                <tr>
                                                    <td>Komposisi</td>
                                                    <td>: Planet Terestrial
                                                        (Batu‐batuan) </td>
                                                </tr>
                                            </table>
                                            <p>
                                                Planet terdekat dari
                                                Matahari. Ukurannya
                                                kecil dan tidak memiliki
                                                atmosfer yang tebal.
                                                Permukaannya berbatu
                                                dan suhu sangat ekstrem
                                                antara siang dan malam.
                                            </p>
                                        </div>
                                    </div>


                                </div>
                            </div>


                            <!-- Planet Venus -->
                            <div class="carousel-item">
                                <div class="card shadow p-5 mx-5 border-0">
                                    <div class="row ">
                                        <div class="col-md-6 text-center mt-3">
                                            <img src="{{ asset('images/content/Venus.png') }}" alt="Venus"
                                                class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                            <p class="text-muted mt-2">Gambar: Planet Venus</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 class="fw-bold mb-3">🌕 Venus</h1>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Nama Planet</td>
                                                    <td>: Venus</td>
                                                </tr>
                                                <tr>
                                                    <td>Komposisi</td>
                                                    <td>: Planet Terestrial (Batu-batuan)</td>
                                                </tr>
                                            </table>
                                            <p>
                                                Ukurannya mirip Bumi, tapi sangat panas karena efek rumah kaca.
                                                Atmosfernya tebal dan beracun, penuh dengan karbon dioksida dan awan asam
                                                sulfat.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Planet Bumi -->
                            <div class="carousel-item">
                                <div class="card shadow p-5 mx-5 border-0">
                                    <div class="row ">
                                        <div class="col-md-6 text-center mt-3">
                                            <img src="{{ asset('images/content/Bumi.png') }}" alt="Bumi"
                                                class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                            <p class="text-muted mt-2">Gambar: Planet Bumi</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 class="fw-bold mb-3">🌍 Bumi</h1>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Nama Planet</td>
                                                    <td>: Bumi</td>
                                                </tr>
                                                <tr>
                                                    <td>Komposisi</td>
                                                    <td>: Planet Terestrial (Batu-batuan)</td>
                                                </tr>
                                            </table>
                                            <p>
                                                Satu-satunya planet yang diketahui mendukung kehidupan.
                                                Memiliki atmosfer yang kaya oksigen dan air dalam bentuk cair di
                                                permukaannya.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Planet Mars -->
                            <div class="carousel-item">
                                <div class="card shadow p-5 mx-5 border-0">
                                    <div class="row ">
                                        <div class="col-md-6 text-center mt-3">
                                            <img src="{{ asset('images/content/Mars.png') }}" alt="Mars"
                                                class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                            <p class="text-muted mt-2">Gambar: Planet Mars</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 class="fw-bold mb-3">🔴 Mars</h1>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Nama Planet</td>
                                                    <td>: Mars</td>
                                                </tr>
                                                <tr>
                                                    <td>Komposisi</td>
                                                    <td>: Planet Terestrial (Batu-batuan)</td>
                                                </tr>
                                            </table>
                                            <p>
                                                Disebut juga "Planet Merah" karena permukaannya mengandung besi oksida.
                                                Ada bukti bahwa air pernah mengalir di Mars, dan masih jadi fokus pencarian
                                                kehidupan.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Planet Jupiter -->
                            <div class="carousel-item">
                                <div class="card shadow p-5 mx-5 border-0">
                                    <div class="row ">
                                        <div class="col-md-6 text-center mt-3">
                                            <img src="{{ asset('images/content/Jupiter.png') }}" alt="Jupiter"
                                                class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                            <p class="text-muted mt-2">Gambar: Planet Jupiter</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 class="fw-bold mb-3">🟤 Jupiter</h1>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Nama Planet</td>
                                                    <td>: Jupiter</td>
                                                </tr>
                                                <tr>
                                                    <td>Komposisi</td>
                                                    <td>: Planet Jovian (Gas dan Es Raksasa)</td>
                                                </tr>
                                            </table>
                                            <p>
                                                Planet terbesar di Tata Surya. Terdiri dari gas, dengan badai besar seperti
                                                Bintik Merah Besar.
                                                Memiliki lebih dari 70 bulan, termasuk Ganymede, bulan terbesar.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Planet Saturnus -->
                            <div class="carousel-item">
                                <div class="card shadow p-5 mx-5 border-0">
                                    <div class="row ">
                                        <div class="col-md-6 text-center mt-3">
                                            <img src="{{ asset('images/content/Saturnus.png') }}" alt="Saturnus"
                                                class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                            <p class="text-muted mt-2">Gambar: Planet Saturnus</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 class="fw-bold mb-3">🪐 Saturnus</h1>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Nama Planet</td>
                                                    <td>: Saturnus</td>
                                                </tr>
                                                <tr>
                                                    <td>Komposisi</td>
                                                    <td>: Planet Jovian (Gas dan Es Raksasa)</td>
                                                </tr>
                                            </table>
                                            <p>
                                                Dikenal dengan cincin indah yang mengelilinginya.
                                                Seperti Jupiter, terdiri dari gas dan punya banyak bulan, salah satunya
                                                Titan
                                                yang menarik untuk studi ilmiah.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Planet Uranus -->
                            <div class="carousel-item">
                                <div class="card shadow p-5 mx-5 border-0">
                                    <div class="row ">
                                        <div class="col-md-6 text-center mt-3">
                                            <img src="{{ asset('images/content/Uranus.png') }}" alt="Uranus"
                                                class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                            <p class="text-muted mt-2">Gambar: Planet Uranus</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 class="fw-bold mb-3">🌀 Uranus</h1>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Nama Planet</td>
                                                    <td>: Uranus</td>
                                                </tr>
                                                <tr>
                                                    <td>Komposisi</td>
                                                    <td>: Planet Jovian (Gas dan Es Raksasa)</td>
                                                </tr>
                                            </table>
                                            <p>
                                                Planet es raksasa dengan warna biru kehijauan karena metana di atmosfernya.
                                                Unik karena berputar dengan kemiringan hampir 98°, seolah "tidur" di
                                                orbitnya.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Planet Neptunus -->
                            <div class="carousel-item">
                                <div class="card shadow p-5 mx-5 border-0">
                                    <div class="row ">
                                        <div class="col-md-6 text-center mt-3">
                                            <img src="{{ asset('images/content/Neptunus.png') }}" alt="Neptunus"
                                                class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                            <p class="text-muted mt-2">Gambar: Planet Neptunus</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 class="fw-bold mb-3">🌊 Neptunus</h1>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Nama Planet</td>
                                                    <td>: Neptunus</td>
                                                </tr>
                                                <tr>
                                                    <td>Komposisi</td>
                                                    <td>: Planet Jovian (Gas dan Es Raksasa)</td>
                                                </tr>
                                            </table>
                                            <p>
                                                Planet terjauh dari Matahari. Memiliki angin tercepat di Tata Surya dan
                                                atmosfer
                                                yang kaya metana, memberi warna biru terang.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" style="" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                  
                </section>
                <section id="page-3">
                    <div class="container">
                        <div class="card shadow-sm border-0 p-4">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <h2 class="fw-bold mb-3">🚀 Teknologi Antariksa</h2>
                                    <p>
                                        Awalnya, manusia cuma bisa mengamati langit pakai teropong sederhana. Tapi sekarang?
                                        Kita udah bisa kirim satelit, roket, bahkan robot (rover) ke planet lain! Semua itu
                                        bukti bahwa manusia
                                        terus mengembangkan ilmunya demi menjawab rasa penasaran tentang luar angkasa.
                                    </p>
                                    <p>
                                        Menariknya, teknologi antariksa ini nggak cuma berguna buat eksplorasi luar angkasa
                                        aja. Banyak teknologi yang kita pakai sehari-hari—kayak <strong>GPS</strong>,
                                        <strong>kamera HP</strong>,
                                        bahkan <strong>bahan tahan panas</strong>—itu awalnya dikembangkan buat keperluan
                                        luar
                                        angkasa. Jadi, kemajuan antariksa juga bantu kehidupan kita di Bumi. Keren, kan?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card shadow-sm border-0 p-4">
                            <h2 class="fw-bold mb-4 text-start">🌌 Manfaat Teknologi Antariksa di Kehidupan Sehari-hari
                            </h2>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="border-start border-4 border-primary ps-3">
                                        <h5 class="fw-bold">📱 Telepon Pintar</h5>
                                        <img src="{{ asset('images/content/telpon.png') }}" alt="Kemiringan Bumi"
                                            class="img-fluid rounded shadow-sm" style="height: 300px;">
                                        <p>Pada tahun 1990, tim dari NASA mengembangkan kamera kecil berkualitas tinggi
                                            untuk pesawat luar angkasa. Teknologi ini sekarang digunakan di kamera HP kita.
                                            Jadi, selfie-mu ada campur tangan NASA juga!</p>
                                    </div>
                                    <div class="border-start border-4 border-success ps-3 mt-4">
                                        <h5 class="fw-bold">💧 Alat Pemurnian Air</h5>
                                        <img src="{{ asset('images/content/pemurnian air.png') }}" alt="Kemiringan Bumi"
                                            class="img-fluid rounded shadow-sm" style="height: 300px;">
                                        <p>Dikembangkan tahun 1960 untuk astronot, sekarang digunakan luas di Bumi untuk
                                            filter air minum. Air galon bersih? Thanks to luar angkasa!</p>
                                    </div>
                                    <div class="border-start border-4 border-warning ps-3 mt-4">
                                        <h5 class="fw-bold">🚗 Transportasi</h5>
                                        <img src="{{ asset('images/content/transportasi.jpg') }}" alt="Kemiringan Bumi"
                                            class="img-fluid rounded shadow-sm" style="height: 300px;">
                                        <p>Teknologi luar angkasa membantu pengembangan mobil listrik dan pesawat modern.
                                            Aerodinamis? Itu hasil riset antariksa juga loh.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border-start border-4 border-danger ps-3">
                                        <h5 class="fw-bold">🏥 Teknologi Kesehatan</h5>
                                        <img src="{{ asset('images/content/medical-banner-with-doctor-patient.jpg') }}"
                                            alt="Kemiringan Bumi" class="img-fluid rounded shadow-sm"
                                            style="height: 300px;">
                                        <p>Dari alat monitor kesehatan astronot, berkembang jadi pemicu jantung, alat
                                            pengobatan kanker, bahkan lensa antigores yang terinspirasi dari helm astronot!
                                        </p>
                                    </div>
                                    <div class="border-start border-4 border-info ps-3 mt-4">
                                        <h5 class="fw-bold">🔌 Peralatan Nirkabel</h5>
                                        <img src="{{ asset('images/content/disassembled-radio-device-cabels.jpg') }}"
                                            alt="Kemiringan Bumi" class="img-fluid rounded shadow-sm"
                                            style="height: 300px;">
                                        <p>Untuk memudahkan gerak astronot, dikembangkan alat elektronik portabel seperti
                                            laptop ringan dan earphone wireless. Sekarang kita pakai tiap hari tanpa sadar.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <nav>
                    <ul class="pagination justify-content-center" id="pagination">

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @include('scripts.content-scripts', [
        'nextLink' => route('materi', 'berkenalan-dengan-benda-langit'),
        'prevLink' => route('materi', 'planet-sebagai-anggota-tata-surya'),
    ])
@endsection


@push('scripts')
@endpush
