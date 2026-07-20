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
                                <h5 class="m-b-10">Dampak Gerak Rotasi Bumi dan Revolusi diKehidupan Kita!</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">Revolusi Bumi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="content">
                <section id="page-1">

                    <div class="container py-5">
                        <div class="card shadow  border-0">
                            <div class="card-body p-5">
                                <h2 class="card-title text-warning fw-bold mb-4">
                                    ☀️ Revolusi Bumi
                                </h2>
                                <p class="card-text fs-5">
                                    Selain berputar pada porosnya (rotasi), Bumi juga <strong>mengelilingi
                                        Matahari</strong>.
                                    Gerakan ini disebut <strong>revolusi Bumi</strong>.
                                </p>
                                <p class="card-text fs-5">
                                    Untuk menyelesaikan satu kali revolusi, Bumi membutuhkan waktu sekitar
                                    <strong>1 tahun atau 365¼ hari</strong>. Gerakan ini sangat penting karena membawa
                                    beberapa
                                    <strong>pengaruh besar terhadap kehidupan di Bumi</strong>.
                                </p>


                                <p class="card-text fs-5">
                                    Apa saja pengaruh dari revolusi Bumi? Yuk, cermati penjelasan selanjutnya untuk tahu
                                    jawabannya!
                                </p>
                            </div>
                        </div>
                    </div>

                </section>
                <section id="page-2">
                    <div class="container py-5">
                        <!-- Penjelasan Musim -->
                        <div class="card shadow  border-0 mb-5">
                            <div class="card-body p-5">
                                <h2 class="card-title text-primary fw-bold mb-4">
                                    🌍 Musim di Bumi
                                </h2>
                                <div class="text-center my-4">
                                    <img src="{{ asset('images/content/Pembagian-iklim-akibat-revolusi-bumi-compressed.jpg') }}"
                                        alt="Kemiringan Bumi" class="img-fluid rounded shadow-sm" style="max-width: 500px;">
                                    <p class="text-muted mt-2"><em>Kemiringan sumbu Bumi menyebabkan musim</em></p>
                                </div>
                                <p class="fs-5">
                                    Musim terjadi karena <strong>sumbu rotasi Bumi miring</strong>. Akibatnya, sinar
                                    Matahari tidak mengenai semua wilayah Bumi secara merata.
                                    <strong>Daerah yang mendapat lebih banyak sinar Matahari jadi lebih panas</strong>,
                                    sedangkan yang lebih sedikit akan terasa dingin.
                                </p>
                                <p class="fs-5">
                                    Saat kutub selatan condong ke arah Matahari, <strong>belahan Bumi selatan mengalami
                                        musim panas</strong> dan sebaliknya <strong>belahan Bumi utara mengalami musim
                                        dingin</strong>.
                                    Antara musim dingin dan panas ada <em>musim semi</em> dan <em>musim gugur</em>.
                                </p>

                            </div>
                        </div>

                        <!-- Tabel Bulan -->
                        <div class="card shadow  border-0">
                            <div class="card-body p-5">
                                <h2 class="card-title text-success fw-bold mb-4">📅 Bulan & Cuacanya</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle">
                                        <thead class="table-success">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Bulan</th>
                                                <th>Jumlah Hari</th>
                                                <th>Penjelasan Singkat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Januari</td>
                                                <td>31</td>
                                                <td>Bulan pertama tahun baru. Cuaca dingin di banyak negara.</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Februari</td>
                                                <td>28 / 29</td>
                                                <td>Bulan terpendek. Tahun kabisat memiliki 29 hari.</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Maret</td>
                                                <td>31</td>
                                                <td>Awal musim semi di negara 4 musim.</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>April</td>
                                                <td>30</td>
                                                <td>Dikenal dengan April Mop tanggal 1.</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Mei</td>
                                                <td>31</td>
                                                <td>Identik dengan musim semi.</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Juni</td>
                                                <td>30</td>
                                                <td>Musim panas mulai datang.</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Juli</td>
                                                <td>31</td>
                                                <td>Puncak musim panas di negara 4 musim.</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Agustus</td>
                                                <td>31</td>
                                                <td>Bulan kemerdekaan Indonesia. Cuaca masih panas.</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>September</td>
                                                <td>30</td>
                                                <td>Nama dari Latin, dulunya bulan ke-9.</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Oktober</td>
                                                <td>31</td>
                                                <td>Identik dengan Halloween.</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>November</td>
                                                <td>30</td>
                                                <td>Dari kata Latin juga, artinya "sembilan".</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>Desember</td>
                                                <td>31</td>
                                                <td>Bulan terakhir. Perayaan Natal dan Tahun Baru.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="page-3">
                    <div class="container py-5">
                        <!-- Judul -->
                        <div class="mb-5 text-center">
                            <h1 class="fw-bold text-primary">🌞 Gerak Semu Tahunan Matahari</h1>
                            <p class="fs-5">Kenapa posisi terbit Matahari berubah sepanjang tahun? Yuk kita bahas!</p>
                        </div>

                        <!-- Penjelasan Awal -->
                        <div class="card shadow mb-5 border-0 ">
                            <div class="card-body p-4">
                                <p class="fs-5">
                                    Matahari tampak terbit dari tempat yang berbeda setiap periode dalam setahun. Padahal,
                                    <strong>Matahari tidak benar-benar berpindah tempat</strong>.
                                    Ini adalah akibat dari <strong>revolusi Bumi</strong> mengelilingi Matahari. Gerakan
                                    seolah-olah Matahari berpindah tempat inilah yang disebut <strong>gerak semu tahunan
                                        Matahari</strong>.
                                </p>
                                <p class="fs-5">
                                    Terdapat <strong>4 kedudukan penting Bumi saat berevolusi</strong> yang memengaruhi
                                    panjang siang-malam dan musim. Berikut penjelasannya:
                                </p>
                            </div>
                        </div>

                        <!-- 4 Kedudukan -->
                        <div class="row g-4">
                            <!-- 21 Maret -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow  h-100">
                                    <div class="card-body">
                                        <h5 class="card-title text-success fw-bold">📍 21 Maret – Ekuinoks Maret</h5>
                                        <p class="fs-6">
                                            Matahari tepat di khatulistiwa. Semua tempat di Bumi mengalami <strong>siang dan
                                                malam selama 12 jam</strong>.
                                            <br>🌸 Kutub utara: mulai musim semi <br>🍂 Kutub selatan: mulai musim gugur
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- 21 Juni -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow  h-100">
                                    <div class="card-body">
                                        <h5 class="card-title text-danger fw-bold">📍 21 Juni – Solstis Juni</h5>
                                        <p class="fs-6">
                                            Matahari seolah berada di 23,5º LU. <br>
                                            🧊 Kutub utara: matahari bersinar selama 24 jam (tidak terbenam) <br>
                                            🌑 Kutub selatan: malam selama 24 jam
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- 23 September -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow  h-100">
                                    <div class="card-body">
                                        <h5 class="card-title text-info fw-bold">📍 23 September – Ekuinoks September</h5>
                                        <p class="fs-6">
                                            Matahari kembali di atas khatulistiwa. <br>
                                            🌓 Siang dan malam kembali sama panjang (12 jam). <br>
                                            🍂 Kutub utara: mulai musim gugur <br>🌸 Kutub selatan: mulai musim semi
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- 22 Desember -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow  h-100">
                                    <div class="card-body">
                                        <h5 class="card-title text-warning fw-bold">📍 22 Desember – Solstis Desember</h5>
                                        <p class="fs-6">
                                            Matahari berada di 23,5º LS. <br>
                                            🌞 Kutub selatan: siang selama 24 jam <br>❄️ Kutub utara: malam selama 24 jam
                                            <br>
                                            🌞 Kutub selatan: mengalami musim panas <br>🧊 Kutub utara: mengalami musim
                                            dingin
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="page-6">
                    @php
                        $questions = [
                            [
                                'text' =>
                                    'Tahukah kamu? Di negara-negara empat musim seperti Jepang, tanaman apel hanya bisa tumbuh subur pada musim tertentu. Hal ini berkaitan dengan revolusi Bumi. Mengapa tanaman apel tidak bisa tumbuh di Indonesia yang hanya memiliki dua musim?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Karena revolusi Bumi tidak terjadi di Indonesia'],
                                    [
                                        'text' =>
                                            'B. Karena Indonesia tidak memiliki musim dingin akibat letaknya di garis khatulistiwa',
                                    ],
                                    ['text' => 'C. Karena Indonesia terlalu panas sepanjang tahun'],
                                    ['text' => 'D. Karena Bumi tidak berputar di wilayah tropis'],
                                ],
                                'correctAnswers' => [1],
                            ],
                            [
                                'text' =>
                                    'Budi memperhatikan bahwa siang hari menjadi lebih lama daripada malam hari di bulan Juni. Ia penasaran mengapa hal itu bisa terjadi. Apa penjelasan yang paling tepat berdasarkan dampak revolusi Bumi?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Karena Bumi berotasi lebih cepat'],
                                    ['text' => 'B. Karena matahari lebih dekat ke Bumi'],
                                    [
                                        'text' =>
                                            'C. Karena Bumi sedang condong ke arah utara yang mengalami musim panas',
                                    ],
                                    ['text' => 'D. Karena bulan memantulkan cahaya lebih banyak'],
                                ],
                                'correctAnswers' => [2],
                            ],
                            [
                                'text' =>
                                    'Bayangkan jika Bumi tidak memiliki kemiringan sumbu. Apa yang mungkin akan terjadi pada musim di Bumi?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Musim akan menjadi lebih banyak'],
                                    ['text' => 'B. Tidak akan ada perubahan musim seperti sekarang'],
                                    ['text' => 'C. Suhu Bumi menjadi sangat panas'],
                                    ['text' => 'D. Siang dan malam akan selalu sama panjang'],
                                ],
                                'correctAnswers' => [1],
                            ],
                            [
                                'text' =>
                                    'Jika kamu tinggal di Australia dan mengalami musim dingin, pada saat yang sama temanmu di Jepang sedang menikmati musim panas. Apa kesimpulan logis dari perbedaan musim tersebut?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Matahari hanya menyinari bagian utara Bumi'],
                                    ['text' => 'B. Sumbu Bumi tegak lurus terhadap Matahari'],
                                    [
                                        'text' =>
                                            'C. Revolusi Bumi menyebabkan belahan Bumi utara dan selatan menerima sinar Matahari berbeda-beda',
                                    ],
                                    ['text' => 'D. Orbit Bumi berbentuk lingkaran sempurna'],
                                ],
                                'correctAnswers' => [2],
                            ],
                            [
                                'text' =>
                                    'Amira membaca di buku bahwa revolusi Bumi menyebabkan rasi bintang yang terlihat di langit malam berubah setiap bulan. Mengapa hal ini bisa terjadi?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Karena Matahari berputar mengelilingi Bumi'],
                                    ['text' => 'B. Karena posisi Bumi terhadap bintang berubah selama revolusi'],
                                    ['text' => 'C. Karena bintang-bintang bergerak mengikuti arah Bumi'],
                                    ['text' => 'D. Karena langit selalu berubah bentuk setiap malam'],
                                ],
                                'correctAnswers' => [1],
                            ],
                        ];

                    @endphp
                    <div class="card card-body">
                        <x-quiz title="latihan-4" materi="dampak-gerak-rotasi-dan-revolusi-bumi" :point="100" :questions="$questions" />
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
        'nextLink' => route('quiz.prepare', 'kuis-2'),
        'prevLink' => route('materi', 'rotasi-bumi'),
    ])
@endsection


@push('scripts')
@endpush
