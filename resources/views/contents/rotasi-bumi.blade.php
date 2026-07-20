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
                                <li class="breadcrumb-item" aria-current="page">Rotasi Bumi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="content">
                <section id="page-1">
                    <div class="container my-5">
                        <div class="card shadow  border-0">
                            <div class="card-body p-5">
                                <h2 class="card-title text-primary fw-bold mb-4">
                                    🌍 Tahukah Kamu?
                                </h2>
                                <p class="card-text fs-5">
                                <figure class="text-center mb-4">
                                    <img src="{{ asset('images\content\gerak-waktu.png') }}"
                                        class="img-fluid rounded shadow-sm" alt="Gambar Bumi">
                                    <figcaption class="mt-2 text-muted">Gambar 5: Perbedaan Waktu Antar Negara</figcaption>
                                </figure>
                                Bumi selalu berputar, lho! Inilah yang membuat waktu di setiap tempat berbeda.
                                Bumi berputar pada porosnya selama <strong>24 jam</strong>, yang disebut
                                <strong>rotasi</strong>.
                                Saat satu bagian Bumi menghadap Matahari, di sana terjadi <strong>siang</strong>.
                                Sementara bagian yang lain menjadi <strong>malam</strong> karena tidak terkena cahaya
                                Matahari.
                                </p>
                                <p class="card-text fs-5">
                                    Inilah yang membuat ada <strong>perbedaan waktu</strong> di setiap negara.
                                    Selain berputar, Bumi juga <strong>bergerak mengelilingi Matahari</strong> selama
                                    <strong>1 tahun</strong>.
                                    Gerakan ini disebut <strong>revolusi</strong> dan menyebabkan <strong>perubahan
                                        musim</strong> di beberapa negara.
                                </p>

                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-body">
                                <h5 class="card-title">🔍 Fakta atau Mitos: Serangan Beruntun!</h5>
                                <p class="card-text">Siap menguji pengetahuanmu tentang Bumi? Jawab dan lanjut terus!</p>
                                <button class="btn btn-primary" onclick="startQuiz()">Mulai!</button>
                            </div>
                        </div>
                    </div>

                </section>
                <section id="page-2">
                    <div class="container my-5">
                        <div class="card shadow  border-0 mb-4">
                            <div class="card-body p-5">
                                <h2 class="card-title text-success fw-bold mb-4">
                                    🌎 Rotasi Bumi
                                </h2>
                                <p class="card-text fs-5">
                                    Perputaran Bumi pada porosnya disebut <strong>rotasi Bumi</strong>.
                                    Periode rotasi Bumi adalah <strong>23 jam 56 menit 4 detik</strong> yang dinamakan
                                    <strong>satu hari</strong>.
                                    Arah rotasi Bumi adalah dari <strong>barat ke timur</strong>, sehingga <strong>Matahari
                                        terbit di sebelah timur</strong> dan terbenam di sebelah barat.
                                </p>
                                <p class="card-text fs-5">
                                    Karena itu, wilayah Indonesia bagian timur lebih dulu melihat Matahari terbit dibanding
                                    bagian tengah dan barat.
                                    Dalam sekali rotasi, Bumi menempuh <strong>360º bujur dalam 24 jam</strong>. Artinya,
                                    <strong>1º bujur = 4 menit</strong>.
                                    Jadi, lokasi yang berbeda 1º bujur akan berbeda waktu sebesar 4 menit.
                                </p>
                            </div>
                        </div>

                        <div class="card shadow border-0">
                            <div class="card-body p-5">
                                <h4 class="card-title text-info fw-bold mb-3">
                                    🔄 Akibat Rotasi Bumi
                                </h4>
                                <ul class="fs-5">
                                    <li>🌞 Terjadinya <strong>siang dan malam</strong></li>
                                    <li>🕐 Perbedaan <strong>waktu</strong> di berbagai wilayah di dunia</li>
                                    <li>🌬️ Terjadinya <strong>gerak semu harian Matahari</strong></li>
                                    <li>💨 Pembelokan arah <strong>angin dan arus laut</strong> (efek Coriolis)</li>
                                    <li>🌪️ Terbentuknya <strong>zona waktu</strong> di Bumi</li>
                                    <li>🎡 Adanya <strong>penggembungan Bumi di khatulistiwa</strong></li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </section>
                <section id="page-3">
                    <div class="container py-5">
                        <style>
                            .sky-container {
                                width: 100%;
                                display: flex;
                                justify-content: center;
                                margin-bottom: 20px;
                            }

                            .sky {
                                width: 80%;
                                height: 300px;
                                background: linear-gradient(to bottom, #87CEEB, #E0F7FA);
                                position: relative;
                                overflow: hidden;
                                transition: all 0.5s ease;
                            }

                            .ground {
                                width: 100%;
                                height: 50px;
                                background-color: #4caf50;
                                position: absolute;
                                bottom: 0;
                            }


                            .sun {
                                width: 60px;
                                height: 60px;
                                background: radial-gradient(circle at 30% 30%, #FFF, #FFD700);
                                border-radius: 50%;
                                position: absolute;
                                box-shadow: 0 0 40px #FFD700;
                                transition: all 0.5s ease;
                                bottom: -30px;
                            }


                            .label {
                                position: absolute;
                                top: 10px;
                                font-size: 18px;
                                color: #2c3e50;
                                font-weight: bold;
                            }

                            .label-left {
                                left: 10%;
                            }

                            .label-right {
                                right: 10%;
                            }

                            .slider-container {
                                width: 80%;
                                margin-top: 20px;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                position: relative;
                            }

                            .time-display {
                                margin-top: 10px;
                                font-size: 18px;
                                font-weight: bold;
                                text-align: center;
                            }

                            .horizon-line {
                                position: absolute;
                                width: 100%;
                                height: 2px;
                                background-color: rgba(0, 0, 0, 0.2);
                                bottom: 50px;
                            }

                            .time-slider {
                                width: 100%;
                            }

                            .parabolic-path {
                                position: absolute;
                                width: 100%;
                                height: 150px;
                                bottom: 50px;
                                pointer-events: none;
                            }
                        </style>
                        <div class="card shadow border-0">
                            <div class="card-body p-5">
                                <figure class="text-center mb-4">
                                    {{-- <img src="{{ asset('images\content\gerak-semu-harian-matahari.jpg') }}"
                                        class="img-fluid rounded shadow-sm" alt="Gambar Bumi">
                                    <figcaption class="mt-2 text-muted">Gambar 6: Gerak semu harian matahari</figcaption> --}}

                                </figure>
                                <h2 class="card-title text-warning fw-bold mb-4">
                                    🌅 Gerak Semu Harian Matahari
                                </h2>
                                <p class="card-text fs-5">
                                    Bagaimanakah gerakan Matahari jika dilihat dari Bumi?
                                    <strong>Matahari selalu terbit di sebelah timur dan tenggelam di sebelah barat</strong>.
                                    Gerakan seperti ini disebut <strong>gerak semu harian Matahari</strong>.
                                </p>
                                <p class="card-text fs-5">
                                    Gerakan ini terjadi karena adanya <strong>rotasi Bumi</strong>. Bumi berotasi dari
                                    <strong>barat ke timur</strong>,
                                    sehingga Matahari <em>seolah-olah</em> tampak bergerak dari <strong>timur ke
                                        barat</strong>.
                                </p>
                                <div class="alert alert-info">
                                    ℹ️ Geser slider di bawah untuk melihat bagaimana Matahari bergerak dari terbit hingga
                                    terbenam!
                                </div>
                                <div class="sky-container">
                                    <div class="sky">
                                        <div class="label label-left">⬅️ Timur</div>
                                        <div class="parabolic-path"></div>
                                        <div class="sun" id="sun"></div>
                                        <div class="label label-right">Barat ➡️</div>
                                        <div class="ground"></div>
                                        <div class="horizon-line"></div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="range" min="6" max="18" step="0.5" id="time-slider"
                                        class="time-slider" value="6">
                                    <div class="time-display" id="time-display">Waktu: 06:00 (Matahari Terbit)</div>
                                </div>




                                <!-- Optional placeholder for image -->

                            </div>
                        </div>
                </section>
                <section id="page-4">
                    <div class="card shadow border-0">
                        <div class="card-body p-5">
                            <h2 class="card-title text-primary fw-bold mb-4">
                                🌤️ Adanya Siang dan Malam
                            </h2>
                            <p class="card-text fs-5">
                                Lama waktu <strong>siang dan malam</strong> tidak selalu sama di setiap tempat di dunia.
                                Di <strong>Indonesia</strong> dan negara-negara <strong>khatulistiwa</strong> lainnya, siang
                                dan malam
                                rata-rata berlangsung selama <strong>sekitar 12 jam</strong>.
                            </p>
                            <p class="card-text fs-5">
                                Namun di negara lain seperti <strong>Jepang</strong> atau negara-negara
                                <strong>Eropa</strong>,
                                durasi siang dan malam <strong>bergantung pada musim</strong> yang sedang terjadi.
                                Misalnya, saat <strong>musim dingin</strong>, siang hari akan lebih <strong>singkat</strong>
                                dan malam hari menjadi <strong>lebih panjang</strong>.
                            </p>

                            <!-- Optional image -->
                            <div class="text-center mt-4">
                                <img src="{{ asset('images\content\rotasi-bumi.jpg') }}" alt="Perbedaan Siang dan Malam"
                                    class="img-fluid rounded shadow-sm" style="max-width: 600px;">
                                <p class="text-muted mt-2"><em>Rotasi Bumi</em></p>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="page-5">
                    <div class="container py-5">
                        <div class="card shadow border-0">
                            <div class="card-body p-5">
                                <h2 class="card-title text-success fw-bold mb-4">
                                    🕒 Zona Waktu Akibat Rotasi Bumi
                                </h2>
                                <div class="text-center mt-4">
                                    <img src="{{ asset('images\content\zona-waktu.png') }}" alt="Peta Zona Waktu Dunia"
                                        class="img-fluid rounded shadow-sm" style="max-width: 100%;">
                                    <p class="text-muted mt-2"><em>Peta zona waktu di seluruh dunia</em></p>
                                </div>
                                <p class="card-text fs-5">
                                    Rotasi Bumi menyebabkan adanya <strong>perbedaan waktu</strong> di berbagai tempat di
                                    dunia.
                                    Bumi dibagi menjadi <strong>24 zona waktu</strong>. Kenapa 24? Karena Bumi berputar
                                    selama <strong>24 jam</strong>.
                                </p>
                                <p class="card-text fs-5">
                                    Saat satu bagian Bumi <strong>menghadap Matahari</strong>, di sana terjadi <strong>siang
                                        hari</strong>.
                                    Sementara bagian yang <strong>membelakangi Matahari</strong> mengalami <strong>malam
                                        hari</strong>.
                                    Karena rotasi terus berlangsung, setiap wilayah menerima sinar Matahari pada waktu yang
                                    berbeda.
                                </p>
                                <p class="card-text fs-5">
                                    Misalnya, ketika <strong>Indonesia siang</strong>, <strong>Amerika</strong> masih
                                    <strong>malam</strong>.
                                    Semakin jauh jaraknya, semakin besar selisih waktunya.
                                </p>

                                <!-- Gambar ilustrasi zona waktu -->

                            </div>
                        </div>
                </section>
                <section id="page-6">
                    @php
                        $questions = [
                            [
                                'text' =>
                                    'Tahukah kamu? Siang dan malam bisa terjadi karena Bumi berputar. Kalau Bumi tidak berputar, apa yang bisa terjadi?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Siang dan malam tetap ada'],
                                    ['text' => 'B. Matahari tidak bersinar'],
                                    ['text' => 'C. Hanya ada siang terus atau malam terus'],
                                    ['text' => 'D. Awan jadi tidak bergerak'],
                                ],
                                'correctAnswers' => [2],
                            ],
                            [
                                'text' =>
                                    'Kamu melihat bayangan pohon berubah posisi sepanjang hari. Itu terjadi karena…',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Awan menutupi matahari'],
                                    ['text' => 'B. Bulan bergerak'],
                                    ['text' => 'C. Bumi berputar'],
                                    ['text' => 'D. Angin bertiup kencang'],
                                ],
                                'correctAnswers' => [2],
                            ],
                            [
                                'text' =>
                                    'Di Indonesia bagian timur seperti Papua, matahari terbit lebih dulu. Kenapa begitu?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Karena lebih dekat ke matahari'],
                                    ['text' => 'B. Karena lebih panas'],
                                    ['text' => 'C. Karena Bumi berputar dari barat ke timur'],
                                    ['text' => 'D. Karena lebih banyak gunung'],
                                ],
                                'correctAnswers' => [2],
                            ],
                            [
                                'text' =>
                                    'Kalau kamu menelepon temanmu di negara lain dan dia bilang “masih malam di sini”, itu bisa terjadi karena…',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Bulan terlalu terang'],
                                    ['text' => 'B. Negara itu hujan'],
                                    ['text' => 'C. Bumi sedang diam'],
                                    ['text' => 'D. Perbedaan waktu karena rotasi Bumi'],
                                ],
                                'correctAnswers' => [3],
                            ],
                            [
                                'text' => 'Untuk menunjukkan siang dan malam, kamu bisa pakai…',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Kipas angin dan lilin'],
                                    ['text' => 'B. Bola dan senter'],
                                    ['text' => 'C. Payung dan batu'],
                                    ['text' => 'D. Buku dan penggaris'],
                                ],
                                'correctAnswers' => [1],
                            ],
                        ];

                    @endphp
                    <div class="card card-body">
                        <x-quiz title="latihan-3" materi="dampak-gerak-rotasi-dan-revolusi-bumi" :point="100" :questions="$questions" />
                    </div>
                </section>
                <nav>
                    <ul class="pagination justify-content-center" id="pagination">

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script>
        const slider = document.getElementById('time-slider');
        const sun = document.getElementById('sun');
        const timeDisplay = document.getElementById('time-display');
        const sky = document.querySelector('.sky');
        const skyHeight = sky.offsetHeight;
        const groundHeight = 50;
        const sunRadius = 30;
        const skyWidth = sky.offsetWidth;

        // Fungsi parabola untuk lintasan matahari
        function parabolicTrajectory(x, width) {
            // Persamaan parabola: y = a(x - h)² + k
            const h = width / 2; // Puncak parabola di tengah
            const k = 150; // Tinggi maksimum
            const a = -k / Math.pow(h, 2); // Koefisien untuk membuat parabola terbuka ke bawah

            return a * Math.pow(x - h, 2) + k;
        }

        // Fungsi untuk mengupdate posisi matahari
        function updateSunPosition(time) {
            // Normalisasi waktu (6-18 menjadi 0-1)
            const normalizedTime = (time - 6) / 12;

            // Hitung posisi x (bergerak dari kiri ke kanan)
            const x = normalizedTime * skyWidth;

            // Hitung posisi y berdasarkan lintasan parabola
            const y = parabolicTrajectory(x, skyWidth);

            // Atur posisi matahari
            sun.style.left = `${x - sunRadius}px`;
            sun.style.bottom = `${y + groundHeight - sunRadius}px`;

            // Ubah ukuran dan intensitas matahari berdasarkan ketinggian
            const scale = 0.8 + (y / 150) * 0.5; // Skala antara 0.8-1.3
            const opacity = 0.7 + (y / 150) * 0.5; // Opasitas antara 0.7-1.2
            sun.style.transform = `scale(${scale})`;
            sun.style.opacity = `${opacity}`;

            // Ubah warna langit berdasarkan waktu
            updateSkyColor(time);

            // Tampilkan waktu
            updateTimeDisplay(time);
        }

        // Fungsi untuk mengubah warna langit berdasarkan waktu
        function updateSkyColor(time) {
            let color1, color2;

            if (time >= 6 && time < 7) { // Fajar
                const progress = (time - 6) / 1;
                color1 = interpolateColor('#FF7F50', '#87CEEB', progress);
                color2 = interpolateColor('#FFD700', '#E0F7FA', progress);
            } else if (time >= 7 && time < 17) { // Siang
                const progress = (time - 7) / 10;
                color1 = interpolateColor('#87CEEB', '#6495ED', progress);
                color2 = interpolateColor('#E0F7FA', '#87CEEB', progress);
            } else if (time >= 17 && time <= 18) { // Senja
                const progress = (time - 17) / 1;
                color1 = interpolateColor('#6495ED', '#FF8C00', progress);
                color2 = interpolateColor('#87CEEB', '#4B0082', progress);
            }

            sky.style.background = `linear-gradient(to bottom, ${color1}, ${color2})`;
        }

        // Fungsi untuk interpolasi warna
        function interpolateColor(color1, color2, factor) {
            if (factor <= 0) return color1;
            if (factor >= 1) return color2;

            const hex = color => {
                const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(color);
                return result ? [
                    parseInt(result[1], 16),
                    parseInt(result[2], 16),
                    parseInt(result[3], 16)
                ] : [0, 0, 0];
            };

            const rgb1 = hex(color1);
            const rgb2 = hex(color2);

            const r = Math.round(rgb1[0] + factor * (rgb2[0] - rgb1[0]));
            const g = Math.round(rgb1[1] + factor * (rgb2[1] - rgb1[1]));
            const b = Math.round(rgb1[2] + factor * (rgb2[2] - rgb1[2]));

            return `rgb(${r}, ${g}, ${b})`;
        }

        // Fungsi untuk menampilkan waktu
        function updateTimeDisplay(time) {
            const hours = Math.floor(time);
            const minutes = Math.round((time - hours) * 60);
            const formattedTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}`;

            let timeDescription = '';
            if (time == 18){
                Swal.fire({
                    title: 'Matahari Terbenam',
                    text: 'Pada masa ini, Matahari terbenam di ufuk barat, dan langit berubah menjadi oranye kemerahan.',
                    icon: 'info',
                    confirmButtonText: 'Oke'
                });
                setProgress('dampak-gerak-rotasi-dan-revolusi-bumi', 'latihan-2', 100);
            }
            if (time === 6) timeDescription = ' (Matahari Terbit)';
            else if (time < 11) timeDescription = ' (Pagi)';
            else if (time < 13) timeDescription = ' (Tengah Hari)';
            else if (time < 17) timeDescription = ' (Siang)';
            else if (time < 18) timeDescription = ' (Sore)';
            else timeDescription = ' (Matahari Terbenam)';

            timeDisplay.textContent = `Waktu: ${formattedTime}${timeDescription}`;
        }

        function showExplain(expl) {

        }


        // Event listener untuk slider
        slider.addEventListener('input', function() {
            const time = parseFloat(slider.value);
            updateSunPosition(time);
        });

        // Inisialisasi posisi awal (jam 6 pagi)
        updateSunPosition(6);

        // Responsif terhadap resize window
        window.addEventListener('resize', function() {
            // Update dimensi
            const skyHeight = sky.offsetHeight;
            const skyWidth = sky.offsetWidth;
            updateSunPosition(parseFloat(slider.value));
        });
    </script>
    @include('scripts.content-scripts', [
        'nextLink' => route('materi', 'revolusi-bumi'),
        'prevLink' => route('quiz.prepare', 'latihan-1'),
    ])
@endsection


@push('scripts')
    <script>
        async function startQuiz() {
            let score = 0;

            // Soal 1
            const {
                value: rotasiJawaban
            } = await Swal.fire({
                title: "Apa nama gerakan Bumi yang menyebabkan siang dan malam?",
                input: "text",
                inputPlaceholder: "Tulis jawabanmu...",
                confirmButtonText: "Kirim",
            });

            if (rotasiJawaban?.toLowerCase().trim() === "rotasi") {
                await Swal.fire("Benar! 🎉", "Bumi berputar pada porosnya selama 24 jam. Itu disebut rotasi.",
                    "success");
                score++;
            } else {
                await Swal.fire("Oops! ❌",
                    "Jawaban yang benar adalah *rotasi*.<br><br>Karena rotasi Bumi menyebabkan satu bagian terkena sinar Matahari (siang) dan bagian lainnya tidak (malam).",
                    "error");
            }

            // Soal 2
            const {
                value: benarSalah
            } = await Swal.fire({
                title: "Benar atau Salah?\nBumi berputar pada porosnya selama 1 minggu.",
                showDenyButton: true,
                confirmButtonText: "Benar",
                denyButtonText: "Salah",
            });

            if (benarSalah === false) {
                await Swal.fire("Kamu benar! 🎯", "Bumi hanya butuh waktu 24 jam untuk 1 rotasi.", "success");
                score++;
            } else {
                await Swal.fire("Salah 😅",
                    "Yang benar itu *Salah*.<br><br>Bumi hanya butuh waktu 1 hari (24 jam), bukan seminggu, untuk menyelesaikan satu kali rotasi.",
                    "error");
            }

            const {
                value: perubahanWaktu
            } = await Swal.fire({
                title: "Benar atau Salah?\nRotasi Bumi menyebabkan perbedaan waktu di berbagai tempat di dunia.",
                showDenyButton: true,
                confirmButtonText: "Benar",
                denyButtonText: "Salah",
            });

            if (perubahanWaktu === true) {
                await Swal.fire("Betul banget! ⏰🌍",
                    "Karena Bumi berotasi, bagian yang terkena Matahari mengalami siang, sementara bagian lainnya malam. Inilah penyebab adanya zona waktu.",
                    "success");
                score++;
            } else {
                await Swal.fire("Kurang tepat 😅",
                    "Jawaban yang benar adalah *Benar*.<br><br>Rotasi Bumi bikin bagian yang berbeda menerima cahaya Matahari pada waktu yang berbeda. Makanya, waktu di Indonesia beda sama di Amerika!",
                    "error");
            }


            // Skor akhir
            let komentar = "";
            if (score === 3) {
                komentar = "Keren banget! Kamu ngerti betul tentang rotasi! 🌍🚀";
            } else if (score === 2) {
                komentar = "Lumayan! Tinggal sedikit lagi paham penuh 💡";
            } else {
                komentar = "Yuk belajar lagi, kamu pasti bisa! 🔥";
            }

            await Swal.fire({
                title: `Skor Akhir: ${score} / 3`,
                text: komentar,
                icon: "info",
                confirmButtonText: score >= 2 ? "Lanjut ke Materi Berikutnya" : "Ulangi Kuis"
            }).then((result) => {
                if (result.isConfirmed) {
                    setProgress('dampak-gerak-rotasi-dan-revolusi-bumi', 'latihan-1', (score * 100) / 3);
                    if (score >= 2) {
                        // Redirect ke materi berikutnya
                        renderAll(2)
                    }
                }
            });



        }
    </script>
@endpush
