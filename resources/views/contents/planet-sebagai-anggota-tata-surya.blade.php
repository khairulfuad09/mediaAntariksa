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
                                <h5 class="m-b-10">Menjelajahi sistem tata surya!</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">Planet sebagai anggota tata surya</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="content">
                <section id="page-1">
                    <div class="container my-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">🪐 Planet dalam Tata Surya</h5>
                                <p class="card-text">
                                    <strong>Bumi</strong> merupakan salah satu dari <strong>delapan planet</strong> yang
                                    mengelilingi Matahari.
                                    Sebelum tahun 2006, para astronom menyepakati bahwa ada 9 planet dalam tata surya.
                                </p>
                                <p class="card-text">
                                    Namun, pada <strong>25 Agustus 2006</strong>, ada kesepakatan baru yang dibuat oleh para
                                    astronom.
                                    <strong>Pluto tidak lagi dianggap sebagai planet</strong> karena ukurannya terlalu kecil
                                    — bahkan lebih kecil dari Bulan!
                                </p>
                                <p class="card-text">
                                    Sejak saat itu, kita hanya mengenal <strong>delapan planet utama</strong> dalam tata
                                    surya, yaitu:
                                    <em>Merkurius, Venus, Bumi, Mars, Jupiter, Saturnus, Uranus, dan Neptunus</em>.
                                </p>
                                <p class="card-text">
                                    Kedelapan planet tersebut <strong>mengorbit Matahari</strong> melalui jalur yang disebut
                                    <strong>garis edar</strong> atau <strong>orbit</strong>,
                                    dan orbit ini berbentuk <strong>elips</strong>, bukan lingkaran sempurna.
                                </p>
                            </div>
                        </div>
                    </div>

                </section>
                <section id="page-2">
                    @php
                        $items = [
                            ['name' => 'Saturnus', 'image' => 'content/Saturnus.png'],
                            ['name' => 'Mars', 'image' => 'content/Mars.png'],
                            ['name' => 'Bumi', 'image' => 'content/Bumi.png'],
                            ['name' => 'Uranus', 'image' => 'content/Uranus.png'],
                            ['name' => 'Merkurius', 'image' => 'content/Merkurius.png'],
                            ['name' => 'Venus', 'image' => 'content/Venus.png'],
                            ['name' => 'Neptunus', 'image' => 'content/Neptunus.png'],
                            ['name' => 'Jupiter', 'image' => 'content/Jupiter.png'],
                        ];

                        $correctOrder = [
                            'Merkurius',
                            'Venus',
                            'Bumi',
                            'Mars',
                            'Jupiter',
                            'Saturnus',
                            'Uranus',
                            'Neptunus',
                        ];
                    @endphp

                    <div class="container my-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">🪐 Planet dalam Tata Surya</h5>
                                <x-order-drag-and-drop title="latihan-1"
                                    instruction="Urutkan Planet-planet di tata surya berdasarkan jaraknya dengan matahari"
                                    materi="menjelajahi-sistem-tata-surya" :point="100" :items="$items"
                                    :correctOrder="$correctOrder" />
                            </div>

                        </div>
                    </div>
                </section>
                <section id="page-6">
                    @php
                        $questions = [
                            [
                                'text' =>
                                    'Tahukah kamu? Semua planet di tata surya mengelilingi Matahari. Apa yang membuat planet-planet tetap mengorbit dan tidak terlepas menjauh dari Matahari?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Suhu tinggi di Matahari'],
                                    ['text' => 'B. Gaya gravitasi Matahari'],
                                    ['text' => 'C. Cahaya yang dipantulkan'],
                                    ['text' => 'D. Kecepatan rotasi planet'],
                                ],
                                'correctAnswers' => [1],
                            ],
                            [
                                'text' =>
                                    'Bumi memiliki satelit alami yang disebut Bulan. Apa fungsi utama Bulan bagi Bumi?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Menghasilkan cahaya bagi Bumi'],
                                    ['text' => 'B. Mengatur cuaca Bumi'],
                                    ['text' => 'C. Menyebabkan pasang surut air laut'],
                                    ['text' => 'D. Menjadi sumber panas bagi Bumi'],
                                ],
                                'correctAnswers' => [2],
                            ],
                            [
                                'text' =>
                                    'Bulan memiliki banyak kawah akibat tabrakan dengan benda langit lain. Mengapa Bumi tidak memiliki kawah sebanyak Bulan?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Karena Bumi lebih dekat ke Matahari'],
                                    ['text' => 'B. Karena Bumi memiliki atmosfer yang melindungi dari benturan'],
                                    ['text' => 'C. Karena Bumi lebih besar dari Bulan'],
                                    ['text' => 'D. Karena Bumi tidak memiliki satelit'],
                                ],
                                'correctAnswers' => [1],
                            ],
                            [
                                'text' =>
                                    'Planet-planet di tata surya mengelilingi Matahari dengan jarak yang berbeda. Mengapa planet yang lebih dekat dengan Matahari memiliki suhu yang lebih tinggi?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Karena mereka lebih besar'],
                                    ['text' => 'B. Karena mereka lebih padat'],
                                    ['text' => 'C. Karena mereka menerima lebih banyak cahaya dan panas dari Matahari'],
                                    ['text' => 'D. Karena mereka memiliki atmosfer yang lebih tebal'],
                                ],
                                'correctAnswers' => [2],
                            ],
                            [
                                'text' =>
                                    'Planet-planet dalam tata surya terdiri dari planet berbatu dan planet gas. Mengapa planet berbatu lebih cocok untuk dihuni dibanding planet gas?',
                                'type' => 'single',
                                'options' => [
                                    ['text' => 'A. Karena planet berbatu memiliki atmosfer yang lebih tebal'],
                                    ['text' => 'B. Karena planet berbatu memiliki permukaan yang padat'],
                                    ['text' => 'C. Karena planet berbatu lebih besar'],
                                    ['text' => 'D. Karena planet berbatu lebih dekat dengan Matahari'],
                                ],
                                'correctAnswers' => [1],
                            ],
                        ];

                    @endphp
                    <div class="card card-body">
                        <x-quiz title="latihan-2" materi="menjelajahi-sistem-tata-surya" :point="100" :questions="$questions" />
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
        'nextLink' => route('materi', 'mengenal-lebih-dalam-tentang-planet'),
        'prevLink' => route('materi', 'tata-surya-dan-matahari-sebagai-pusatnya'),
    ])
@endsection


@push('scripts')
@endpush
