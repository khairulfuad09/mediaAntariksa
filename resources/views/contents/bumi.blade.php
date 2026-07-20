@extends('layouts.content-layout')

@section('page-name', 'Bumi')
@section('page-description', 'Mengenal Bumi')

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
                    <div class="card card-body shadow-sm">
                        <h2 class="text-success mb-4">Berkenalan Lebih Dalam dengan Planet Bumi</h2>

                        <figure class="text-center mb-4">
                            <img src="{{ asset('images\content\bumi-background.jpeg') }}"
                                class="img-fluid rounded shadow-sm" alt="Gambar Bumi">
                            <figcaption class="mt-2 text-muted">Gambar 2: Bumi</figcaption>
                        </figure>



                        <p>
                            <strong>Bumi</strong> merupakan salah satu dari delapan planet yang mengelilingi Matahari.
                            Sampai saat ini, Bumi adalah <strong>satu-satunya tempat yang diketahui memiliki makhluk
                                hidup</strong>.
                            Rumah kita ini spesial, lho!
                        </p>

                        <p>
                            Bumi merupakan <span class="text-primary">planet berbatu</span> yang sebagian besar permukaannya
                            berupa perairan.
                            Sekitar <strong>70%</strong> permukaan Bumi ditutupi oleh air. Keberadaan air ini sangat penting
                            bagi kehidupan.
                            Bumi terbentuk dari bebatuan dan logam, sehingga masuk dalam kelompok planet terrestrial
                            (berbatu).
                        </p>

                        <p>
                            Suhu rata-rata di permukaan Bumi adalah sekitar <strong>22°C</strong>, yang memungkinkan makhluk
                            hidup bertahan.
                            Jarak Bumi dari Matahari adalah sekitar <strong>150 juta kilometer</strong>.
                            Untuk melakukan satu revolusi mengelilingi Matahari, Bumi memerlukan waktu sekitar <strong>365¼
                                hari</strong> (satu tahun).
                        </p>

                        <p>
                            Sementara itu, ia melakukan satu kali rotasi selama satu bulan
                            (30 hari).
                        </p>

                        <div class="alert alert-info">
                            🌍 <strong>Bentuk Bumi</strong> tidak sepenuhnya bulat sempurna, tetapi <em>geoid</em> — agak
                            pepat di kutub dan sedikit cembung di khatulistiwa.
                            Diameter di kutub sekitar <strong>12.714 km</strong>, sementara di khatulistiwa sekitar
                            <strong>12.757 km</strong>.
                        </div>

                        <p>
                            Perbedaan kecil ini mungkin tidak terlalu besar, tapi penting dalam menghitung keliling Bumi
                            dan memahami berbagai fenomena alam seperti gaya gravitasi, arus laut, hingga satelit.
                        </p>

                    </div>
                    <div class="card card-body shadow-sm">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            <strong>Cermati bentuk bumi berikut</strong> kamu bisa berinteraksi dengan klik kanan pada mouse
                            untuk putar, klik kiri untuk menggeser, dan scroll untuk zoom
                        </div>

                        <x-Planet width="100%" height="500px" id="planet-1"
                            texture="{{ asset('textures/earth-texture.jpg') }}" />

                    </div>
                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title">🔍 Fakta atau Mitos: Serangan Beruntun!</h5>
                            <p class="card-text">Siap menguji pengetahuanmu tentang Bumi? Jawab dan lanjut terus!</p>
                            <button class="btn btn-primary" onclick="startQuiz()">Mulai!</button>
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
        'nextLink' => route('materi', 'bulan'),
        'prevLink' => route('materi', 'bumi-bulan-dan-matahari'),
    ])
@endsection


@push('scripts')
    <script>
        const questions = [{
                text: "Bumi melakukan satu rotasi selama 30 hari.",
                correct: false,
                explanation: `
          Bumi hanya butuh <strong>23 jam 56 menit</strong> untuk satu rotasi.
          Kalau 30 hari, bisa-bisa satu sisi Bumi gosong, sisi lain beku. 😱
        `
            },
            {
                text: "Permukaan Bumi terdiri dari sekitar 70% air.",
                correct: true,
                explanation: `
          Yap! Sekitar <strong>70%</strong> permukaan Bumi berupa laut, dan itu yang bikin Bumi tampak biru dari luar angkasa 🌊🌍.
        `
            },
            {
                text: "Bumi adalah planet terbesar di tata surya.",
                correct: false,
                explanation: `
          Nope! Planet terbesar adalah <strong>Jupiter</strong>. Bumi termasuk planet berbatu, tapi ukurannya sedang aja.
        `
            },
            {
                text: "Bentuk Bumi itu geoid, bukan bulat sempurna.",
                correct: true,
                explanation: `
          Betul! Karena pepat di kutub dan cembung di khatulistiwa, bentuk Bumi disebut <em>geoid</em> 🌀.
        `
            },
            {
                text: "Bumi lebih dekat ke Matahari dibandingkan Merkurius.",
                correct: false,
                explanation: `
          Salah, bro! Merkurius yang paling deket ke Matahari 🔥. Bumi di urutan ketiga dari Matahari.
        `
            }
        ];

        let currentQuestionIndex = 0;
        let score = 0;

        function startQuiz() {
            currentQuestionIndex = 0;
            score = 0;
            showQuestion();
        }

        function showQuestion() {
            if (currentQuestionIndex >= questions.length) {
                setProgress('menjelajah-matahari-bumi-dan-bulan', 'latihan-3', (score * 100 / questions.length));
                Swal.fire({
                    title: '🎉 Kuis Selesai!',
                    html: `Kamu menjawab <strong>${score}</strong> dari <strong>${questions.length}</strong> pertanyaan dengan benar!<br><br>Bagus! Sekarang kamu makin kenal Bumi 🌍`,
                    icon: 'success'
                });
                return;
            }

            const q = questions[currentQuestionIndex];

            Swal.fire({
                title: `🧠 ${q.text}`,
                showDenyButton: true,
                confirmButtonText: 'Fakta ✅',
                denyButtonText: 'Mitos ❌',
                icon: 'question'
            }).then((result) => {
                const isCorrect = (result.isConfirmed && q.correct === true) || (result.isDenied && q.correct ===
                    false);

                Swal.fire({
                    icon: isCorrect ? 'success' : 'error',
                    title: isCorrect ? '✅ Benar!' : '❌ Salah!',
                    html: q.explanation
                }).then(() => {
                    if (isCorrect) score++;
                    currentQuestionIndex++;
                    showQuestion(); // next question
                });
            });
        }
    </script>
@endpush
