@extends('layouts.content-layout')

@section('page-name', 'Bulan')
@section('page-description', 'Berkenalan dengan Bulan')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Menjelajahi Bumi dan Antariksa</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">Materi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="content">
                <section id="page-1">
                    <div class="container my-5">
                        <div class="card shadow border-0">
                            <div class="card-body p-4">
                                <h2 class="card-title mb-3">Matahari: Bintang Besar yang Menghidupkan Bumi</h2>
                                <figure class="text-center mb-4">
                                    <img src="{{ asset('images\content\matahari-background.jpg') }}"
                                        class="img-fluid rounded shadow-sm" alt="Gambar Bumi">
                                    <figcaption class="mt-2 text-muted">Gambar 3: Bulan</figcaption>
                                </figure>
                                <p>Matahari terbentuk dari gas helium dan hidrogen yang sangat panas dan biasa disebut bola
                                    panas. Matahari merupakan salah satu dari jutaan bintang. Sebagai bintang, Matahari
                                    memancarkan cahayanya sendiri. Cahaya Matahari berasal dari reaksi gas-gas di dalam inti
                                    Matahari. Reaksi ini menghasilkan energi yang sangat besar. Energi tersebut dilepaskan
                                    sebagai panas dan cahaya.</p>
                                <p>Energi yang dipancarkan Matahari setiap detik setara dengan energi Matahari yang diterima
                                    Bumi selama 100 tahun. Inilah sebabnya mengapa Matahari sangat penting bagi kehidupan di
                                    Bumi, memberikan cahaya dan panas yang mendukung tumbuhan, hewan, dan manusia.</p>
                                <p>Selain memberi energi, Matahari juga berperan dalam menciptakan berbagai fenomena alam
                                    seperti angin matahari, yang terdiri dari partikel-partikel bermuatan yang keluar dari
                                    permukaan Matahari. Partikel ini dapat mempengaruhi medan magnet Bumi dan menyebabkan
                                    fenomena aurora atau cahaya utara yang indah di langit.</p>

                            </div>
                        </div>
                    </div>
                    <div class="card card-body shadow-sm">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <strong>Cermati bentuk 3d Matahari berikut</strong> kamu bisa berinteraksi dengan klik kanan
                            pada mouse untuk putar, klik kiri untuk menggeser, dan scroll untuk zoom
                        </div>

                        <x-sun id="sun1" width="600px" height="600px" color="#FFD700" bloom-strength="3"
                            particles="800" particle-color="#ff6600" />


                    </div>
                </section>
                <section id="page-2">
                    @php

                        $questions = [
                            [
                                'text' =>
                                    'Saat malam hari di Bumi, bagian Bumi yang mengalami malam tidak mendapatkan cahaya Matahari. Mengapa bagian itu tidak mendapatkan cahaya, padahal Matahari tetap bersinar?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Karena Matahari sedang bersembunyi'],
                                    ['text' => 'B. Karena bulan menutupi cahaya Matahari'],
                                    ['text' => 'C. Karena Bumi berputar sehingga bagian itu membelakangi Matahari'],
                                    ['text' => 'D. Karena Matahari berpindah ke sisi lain'],
                                ],
                                'correctAnswers' => [2],
                            ],
                            [
                                'text' =>
                                    'Bayangkan kamu sedang berdiri di pantai dan melihat air laut pasang naik. Apa hubungan peristiwa ini dengan posisi Bulan terhadap Bumi?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Bulan membuat angin laut bertiup kencang'],
                                    ['text' => 'B. Gravitasi Bulan menarik air laut sehingga menyebabkan pasang'],
                                    ['text' => 'C. Cahaya Bulan menghangatkan air laut'],
                                    ['text' => 'D. Bulan menyebabkan hujan di laut'],
                                ],
                                'correctAnswers' => [1],
                            ],
                            [
                                'text' =>
                                    'Jika tidak ada rotasi Bumi, maka... Apa yang akan terjadi pada kehidupan di Bumi?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Siang dan malam tetap terjadi seperti biasa'],
                                    ['text' => 'B. Musim akan lebih cepat berubah'],
                                    [
                                        'text' =>
                                            'C. Hanya satu sisi Bumi yang terus mengalami siang, sisi lain malam terus',
                                    ],
                                    ['text' => 'D. Bulan akan tampak lebih besar'],
                                ],
                                'correctAnswers' => [2],
                            ],
                            [
                                'text' =>
                                    'Mengapa gerhana Matahari tidak terjadi setiap bulan, padahal Bulan terus mengelilingi Bumi?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Karena Bumi kadang tidak terlihat dari Bulan'],
                                    ['text' => 'B. Karena posisi Bulan, Bumi, dan Matahari tidak selalu sejajar'],
                                    ['text' => 'C. Karena cahaya Matahari sangat terang'],
                                    ['text' => 'D. Karena Bulan tidak cukup besar untuk menutupi Matahari'],
                                ],
                                'correctAnswers' => [1],
                            ],
                        ];

                    @endphp
                    <div class="card card-body">
                        <x-quiz title="latihan-5" materi="menjelajah-matahari-bumi-dan-bulan" :point="100" :questions="$questions" />
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
        'nextLink' => route('quiz.prepare', 'kuis-1'),
        'prevLink' => route('materi', 'bumi-bulan-dan-matahari'),
    ])
@endsection


@push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        const map = L.map('map').setView([0, 0], 2); // Tampilkan seluruh dunia

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Peta oleh OpenStreetMap',
        }).addTo(map);

        map.on('click', async (e) => {
            const {
                lat,
                lng
            } = e.latlng;
            const popup = L.popup().setLatLng([lat, lng]).setContent('Loading...').openOn(map);

            try {
                // Reverse geocoding (dapatkan nama lokasi)
                const geoRes = await fetch(
                    `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`);
                const geoData = await geoRes.json();
                const lokasi = geoData.display_name || 'Lokasi tidak dikenal';

                // Waktu lokal
                const timeRes = await fetch(`https://worldtimeapi.org/api/timezone/Etc/GMT`);
                const timeData = await timeRes.json();
                const waktu = new Date(timeData.datetime).toLocaleTimeString();

                // Sunrise/sunset info
                const sunRes = await fetch(
                    `https://api.sunrise-sunset.org/json?lat=${lat}&lng=${lng}&formatted=0`);
                const sunData = await sunRes.json();
                const sunrise = new Date(sunData.results.sunrise);
                const sunset = new Date(sunData.results.sunset);
                const now = new Date();

                const status = now >= sunrise && now <= sunset ? '🌞 Siang' : '🌙 Malam';

                popup.setContent(`
              <b>${lokasi}</b><br>
              🕒 Waktu lokal: ${waktu}<br>
              ${status}
            `);
            } catch (err) {
                popup.setContent('Gagal mengambil data 😢');
                console.error(err);
            }
        });
    </script>
@endpush
