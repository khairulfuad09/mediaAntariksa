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
                                <li class="breadcrumb-item" aria-current="page">Berkenalan dengan benda langit!</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="content">

                <section id="page-1">
                    <div class="container">
                        <div class="card shadow-sm border-0 p-4">
                            <h2 class="fw-bold mb-4 text-center">⭐ Mengenal Bintang</h2>
                            <img src="{{ asset('images/content/silhouette-young-man-background-milky-way-galaxy-bright-star-dark-sky-tone.jpg') }}"
                                class="img-fluid rounded-top" alt=""
                                style="height: 300px; object-fit: cover; object-position: center center;" />

                            <p class="mb-4">
                                Bintang adalah bola gas panas yang memancarkan cahaya sendiri karena reaksi nuklir yang
                                terjadi di dalamnya. Energi ini begitu besar sehingga bisa terlihat dari Bumi meskipun
                                jaraknya sangat jauh. Karena jauhnya, bintang terlihat kecil dan berkelap-kelip di langit
                                malam.
                            </p>
                            <p class="mb-4">
                                Satu-satunya bintang yang dekat dengan kita adalah <strong>Matahari</strong>. Matahari
                                tampak besar dan terang bukan karena ukurannya paling besar, tapi karena letaknya yang
                                paling dekat dengan Bumi. Di luar sana, ada banyak bintang yang ukurannya jauh lebih besar
                                dari Matahari!
                            </p>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="border-start border-4 border-warning ps-3 h-100">
                                        <h5 class="fw-bold">✨ Ukuran & Warna</h5>
                                        <p>Bintang punya ukuran dan warna yang beragam. Warna menunjukkan suhu: biru =
                                            sangat panas, kuning (seperti Matahari) = sedang, merah = lebih dingin.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="border-start border-4 border-primary ps-3 h-100">
                                        <h5 class="fw-bold">🌌 Rasi Bintang</h5>
                                        <p>Susunan bintang di langit membentuk pola bernama <em>rasi bintang</em>, contohnya
                                            Rasi Orion (pemburu) dan Rasi Scorpio (kalajengking).</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="border-start border-4 border-danger ps-3 h-100">
                                        <h5 class="fw-bold">📏 Jarak Bintang</h5>
                                        <p>Semakin kecil cahaya bintang yang terlihat dari Bumi, tandanya bintang itu berada
                                            sangat jauh dari kita.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="page-2">
                    <div class="container">
                        <div class="card shadow-sm border-0 p-4">
                            <h2 class="fw-bold mb-4 text-center">🌍 Apa Itu Planet?</h2>
                            <img src="{{ asset('images/content/planet-earth-background.jpg') }}"
                                class="img-fluid rounded-top" alt=""
                                style="height: 300px; object-fit: cover; object-position: center center;" />
                            <p class="mt-3 mb-1">
                                Planet adalah benda langit yang mengelilingi bintang, seperti Matahari. Gerakan planet
                                mengelilingi bintang ini disebut <strong>revolusi</strong>. Selain itu, planet juga
                                berputar pada porosnya sendiri, dan gerakan ini disebut <strong>rotasi</strong>.
                            </p>
                            <p class="mb-1">
                                Berbeda dengan bintang, planet tidak memancarkan cahaya sendiri. Kita bisa melihat
                                planet karena mereka memantulkan cahaya dari bintang, contohnya cahaya Matahari.
                            </p>
                            <p class="">
                                Secara umum, planet lebih besar dari benda langit lain seperti asteroid atau komet
                                (kecuali bintang tentunya). Planet juga memiliki bentuk bulat karena <strong>gaya
                                    gravitasi</strong> mereka sendiri yang menarik semua bagian ke arah tengah.
                            </p>

                            <div class="row text-center">
                                <div class="col-md-4 mb-3">
                                    <div class="p-3 border-start border-4 border-success h-100">
                                        <h5 class="fw-bold">🌀 Rotasi</h5>
                                        <p>Perputaran planet pada porosnya sendiri. Contohnya, Bumi butuh 24 jam untuk
                                            satu rotasi penuh.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="p-3 border-start border-4 border-info h-100">
                                        <h5 class="fw-bold">🔄 Revolusi</h5>
                                        <p>Gerakan planet mengelilingi bintang. Bumi butuh 365 hari untuk satu revolusi
                                            mengelilingi Matahari.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="p-3 border-start border-4 border-warning h-100">
                                        <h5 class="fw-bold">💡 Memantulkan Cahaya</h5>
                                        <p>Planet tidak bercahaya sendiri, tapi tampak terang karena memantulkan cahaya
                                            dari Matahari.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>
                <section id="page-3">
                    <div class="container">
                        <div class="card shadow-sm border-0 p-4">
                            <h2 class="fw-bold mb-4 text-center">🌕 Mengenal Bulan</h2>
                            <img src="{{ asset('images/content/bulan-background.jpg') }}" class="img-fluid rounded-top"
                                alt="" style="height: 300px; object-fit: cover; object-position: center center;" />
                            <p class="mb-2">
                                Bulan adalah benda langit yang mengelilingi planet atau asteroid. Karena itu, Bulan juga
                                dikenal sebagai <strong>satelit alami</strong>. Ukurannya selalu lebih kecil dibandingkan
                                benda yang diorbitinya.
                            </p>
                            <p class="mb-1">
                                Bulan tidak memancarkan cahaya sendiri. Cahaya yang kita lihat dari Bulan sebenarnya berasal
                                dari <strong>pantulan cahaya Matahari</strong>.
                            </p>
                            <p class="mb-1">
                                Meskipun lebih kecil dari Bumi, Bulan tetap memiliki <strong>gaya gravitasi</strong>. Gaya
                                ini memengaruhi pasang surut air laut di Bumi, lho!
                            </p>
                            <p class="mb-1">
                                Bumi hanya punya satu Bulan, tapi planet lain bisa punya banyak satelit alami. Contohnya,
                                Jupiter punya lebih dari <strong>90 Bulan</strong>!
                            </p>
                            <p class="">
                                Dari Bumi, bentuk Bulan terlihat berubah-ubah. Ini disebut <strong>fase-fase Bulan</strong>,
                                yang terjadi karena posisi Bulan, Bumi, dan Matahari terus berubah.
                            </p>

                            <div class="row text-center">
                                <div class="col-md-4 mb-3">
                                    <div class="p-3 border-start border-4 border-secondary h-100">
                                        <h5 class="fw-bold">🌑 Tidak Bercahaya</h5>
                                        <p>Bulan tampak terang karena memantulkan cahaya Matahari, bukan karena memancarkan
                                            cahaya sendiri.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="p-3 border-start border-4 border-primary h-100">
                                        <h5 class="fw-bold">🌊 Pengaruh Gravitasi</h5>
                                        <p>Gravitasi Bulan memengaruhi pasang dan surut air laut di Bumi.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="p-3 border-start border-4 border-info h-100">
                                        <h5 class="fw-bold">🌘 Fase Bulan</h5>
                                        <p>Bentuk Bulan yang kita lihat berubah-ubah sesuai posisinya terhadap Bumi dan
                                            Matahari.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="page-4">
                    <div class="container">
                        <div class="card shadow-sm border-0 p-4">
                            <h2 class="fw-bold mb-4 text-center">☄️ Komet, Si Bintang Berekor</h2>
                            <img src="{{ asset('images/content/starry-sky-night-with-landscape-mountains.jpg') }}"
                                class="img-fluid rounded-top" alt=""
                                style="height: 300px; object-fit: cover; object-position: center center;" />
                            <p class="mb-4">
                                Pernah lihat cahaya terang seperti bintang tapi punya ekor panjang di langit? Nah, itu
                                adalah <strong>komet</strong> atau sering juga disebut bintang berekor. Jumlah komet di
                                angkasa diperkirakan lebih dari <strong>100 milyar</strong>!
                            </p>
                            <p class="mb-4">
                                Komet terdiri dari <strong>debu dan es</strong>. Saat komet mendekati Matahari, es yang ada
                                di dalamnya menguap karena panas, membentuk ekor yang bercahaya.
                            </p>
                            <p class="mb-4">
                                Komet juga bergerak mengelilingi Matahari, sama seperti planet. Tapi uniknya, <strong>ekor
                                    komet selalu menjauhi Matahari</strong>. Jadi, saat mendekati Matahari, ekornya di
                                belakang. Tapi waktu menjauhi, ekornya malah di depan.
                            </p>
                            <p class="mb-4">
                                Salah satu komet paling terkenal adalah <strong>Komet Halley</strong>. Komet ini muncul
                                setiap 75–76 tahun sekali. Terakhir terlihat tahun 1986, dan akan muncul lagi di tahun
                                <strong>2061</strong>. Catat ya, jangan sampai kelewatan! 😄
                            </p>

                            <div class="row text-center mt-4">
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border-start border-4 border-warning h-100">
                                        <h5 class="fw-bold">💫 Tersusun dari Debu & Es</h5>
                                        <p>Ketika mendekati Matahari, es di komet menguap dan membentuk ekor terang yang
                                            indah.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border-start border-4 border-success h-100">
                                        <h5 class="fw-bold">🌞 Ekor Menjauhi Matahari</h5>
                                        <p>Arah ekor komet ditentukan oleh angin Matahari, jadi selalu menjauh dari
                                            Matahari.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="page-5">
                    <div class="container">
                        <div class="card shadow-sm border-0 p-4">
                            <h2 class="fw-bold mb-4 text-center">🪨 Asteroid, Si Planet Mini</h2>
                            <img src="{{ asset('images/content/spaceship-orbits-planet-galaxy-starry-night-sky-exploring-deep-generated-by-ai.jpg') }}"
                                class="img-fluid rounded-top" alt=""
                                style="height: 300px; object-fit: cover; object-position: center center;" />
                            <p class="mb-4">
                                Asteroid adalah <strong>batuan luar angkasa</strong> yang terbuat dari campuran batu dan
                                logam. Bentuknya tidak beraturan dan ukurannya lebih kecil dari planet. Karena itu,
                                asteroid sering disebut sebagai <strong>planet kecil</strong>.
                            </p>
                            <p class="mb-4">
                                Sama seperti planet, asteroid juga mengorbit Matahari. Tapi jangan salah, mereka nggak
                                tersebar sembarangan, kebanyakan terkumpul di suatu area yang disebut <strong>sabuk
                                    asteroid</strong>. Lokasinya ada di antara orbit <strong>Mars dan Jupiter</strong>.
                            </p>
                            <p class="mb-4">
                                Selain itu, ada juga asteroid yang ditemukan di antara <strong>Saturnus dan
                                    Uranus</strong>. Asteroid ini terkenal dengan nama <strong>Chiron</strong>.
                            </p>
                            <div class="row text-center mt-4">
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border-start border-4 border-danger h-100">
                                        <h5 class="fw-bold">🌌 Sabuk Asteroid</h5>
                                        <p>Zona padat asteroid yang berada di antara orbit Mars dan Jupiter.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border-start border-4 border-info h-100">
                                        <h5 class="fw-bold">🪐 Chiron</h5>
                                        <p>Salah satu asteroid terkenal yang berada di antara Saturnus dan Uranus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <section id="page-6">
                    <div class="container">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Meteorid</h5>
                                <p class="card-text">
                                    <img src="{{ asset('images/content/meteorid.png') }}" class="img-fluid rounded-top"
                                        alt=""
                                        style="height: 300px; object-fit: cover; object-position: center center;" />
                                <p class="mb-4">
                                    Meteorid merupakan pecahan-pecahan dari asteroid yang berbenturan. Meteorid berukuran
                                    kecil dan mengorbit Matahari dalam lintasan yang tidak tetap.
                                </p>
                                <p class="card-text">
                                    Terkadang, meteorid memasuki atmosfer Bumi dan menjadi panas terbakar sehingga cahayanya
                                    teramati oleh mata kita. Meteorid dengan kilatan cahaya ini bergerak sangat cepat. Benda
                                    inilah yang terlihat sebagai bintang jatuh atau disebut meteor.
                                </p>
                                <p class="card-text">
                                    Ada meteorid yang habis terbakar di atmosfer sebelum mencapai permukaan Bumi. Akan
                                    tetapi, ada juga pecahan batu meteorid yang mencapai permukaan Bumi. Batuan tersebut
                                    biasanya membentuk sebuah kawah yang disebut <strong>kawah meteor</strong>.
                                </p>
                            </div>
                        </div>
                    </div>

                </section>
                <section id="page-7">
                    <div class="container">
                        <div class="card shadow-sm border-0 p-4">
                            <h2 class="fw-bold mb-4 text-center">🛰️ Satelit: Alami dan Buatan</h2>
                            <img src="{{ asset('images/content/spacecraft-orbiting-planet-earth-global-communications-generated-by-ai.jpg') }}" class="img-fluid rounded-top"
                                alt=""
                                style="height: 300px; object-fit: cover; object-position: center center;" />

                            <p class="mb-4">
                                <strong>Satelit</strong> adalah benda yang mengorbit atau mengelilingi planet. Satelit
                                bisa bersifat <strong>alami</strong> seperti Bulan yang mengelilingi Bumi, atau
                                <strong>buatan</strong> yang dibuat manusia dan diluncurkan ke luar angkasa.
                            </p>

                            <p class="mb-4">
                                Bumi punya satu satelit alami yaitu Bulan. Tapi, banyak juga satelit buatan yang dibuat
                                untuk berbagai tujuan penting, kayak cuaca, komunikasi, dan lingkungan. Yuk kenali
                                jenis-jenis satelit buatan!
                            </p>

                            <div class="row text-center">
                                <div class="col-md-4 mb-4">
                                    <div class="p-3 border-start border-4 border-info h-100">
                                        <h5 class="fw-bold">🌦️ Satelit Cuaca</h5>
                                        <p>Digunakan untuk memantau kondisi cuaca, membantu prediksi hujan, badai, suhu,
                                            dan peringatan cuaca ekstrem.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="p-3 border-start border-4 border-warning h-100">
                                        <h5 class="fw-bold">📡 Satelit Komunikasi</h5>
                                        <p>Mengirim sinyal telepon, TV, radio, dan internet ke seluruh dunia, bahkan ke
                                            daerah terpencil dan saat bencana.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="p-3 border-start border-4 border-success h-100">
                                        <h5 class="fw-bold">🌍 Satelit Pengamat Polusi</h5>
                                        <p>Memantau kualitas udara dan polusi dari luar angkasa. Bisa deteksi asap, gas
                                            beracun, dan bantu jaga lingkungan.</p>
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4 text-center">
                                Satelit buatan itu penting banget, bro! Tanpa mereka, kita nggak bisa dapet update cuaca
                                akurat, sinyal internet stabil, atau info polusi udara. Teknologi luar angkasa emang
                                keren! 🚀
                            </p>
                        </div>
                    </div>

                </section>
            </div>
            <nav>
                <ul class="pagination justify-content-center" id="pagination">

                </ul>
            </nav>

        </div>
    </div>
    @include('scripts.content-scripts', [
        'nextLink' => route('quiz.prepare', 'kuis-3'),
        'prevLink' => route('materi', 'mengenal-lebih-dalam-tentang-planet'),
    ])
@endsection


@push('scripts')
@endpush
