@php
    use App\Models\KkmSetting;
    use App\Models\Quiz;
    use Illuminate\Support\Facades\Auth;

    // Pastikan function ini tidak redeclare jika di-include berkali-kali
    if (!function_exists('isReady')) {
        function isReady($requirement)
        {
            // Guru bebas akses
            if ($requirement == '' || Auth::user()->role == 'guru') {
                return true; 
            }

            $user_id = auth()->user()->id;
            
            // 1. Ambil Nilai Kuis Siswa
            $kuis = Quiz::where('materi', $requirement)
                        ->where('user_id', $user_id)
                        ->first();

            if ($kuis) {
                // 2. Ambil KKM Dinamis dari Database sesuai materi
                $setting = KkmSetting::where('materi', $requirement)->first();
                $batas_lulus = $setting ? $setting->kkm : 70; // Default 70 kalau belum diset guru

                // 3. Cek apakah Nilai >= KKM
                return $kuis->nilai >= $batas_lulus;
            } else {
                return false; // Belum mengerjakan, berarti belum siap
            }
        }
    }
@endphp

<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('welcome.index') }}" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <h3>Media Antariksa</h3>
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('materi', 'menjelajahi-bumi-dan-antariksa') }}" class="pc-link d-flex">
                        <span class="pc-micon"><i class="fas fa-rocket"></i></span>
                        <span class="pc-mtext">Menjelajahi Bumi Dan Antariksa</span>
                    </a>
                </li>


                <li class="pc-item pc-caption">
                    <label>Materi</label>
                    <i class="ti ti-news"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link d-flex">
                        <span class="pc-micon"><i class="ti ti-menu"></i></span>
                        <span class="pc-mtext">Menjelajahi Bumi Matahari,dan Bulan</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link"
                                href="{{ route('materi', 'bumi-bulan-dan-matahari') }}">Bumi, Bulan, dan Matahari</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('materi', 'bumi') }}">Berkenalan lebih
                                dalam dengan planet bumi</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('materi', 'bulan') }}">Berkenalan lebih
                                dalam dengan Bulan</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('materi', 'matahari') }}">Berkenalan Lebih
                                dalam dengan Matahari</a></li>
                        {{-- <li class="pc-item"><a class="pc-link" href="{{ route("quiz.prepare","kuis-1") }}">Kuis</a></li> --}}
                        <li class="pc-item"><a class="pc-link" href="{{ route('quiz.prepare', 'kuis-1') }}">Kuis</a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link d-flex {{ isReady('kuis-1') ? '' : 'locked-menu' }}">
                        @if (isReady('kuis-1'))
                            <span class="pc-micon"><i class="ti ti-menu"></i></span>
                        @else
                            <span class="pc-micon text-danger"><i class="ti ti-lock"></i></span>
                        @endif
                        <span class="pc-mtext">Dampak Gerak Rotasi dan Revolusi di kehidupan kita</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        @if (isReady('kuis-1'))
                            <li class="pc-item"><a class="pc-link" href="{{ route('materi', 'rotasi-bumi') }}">Rotasi
                                    Bumi</a></li>
                            {{-- <li class="pc-item"><a class="pc-link" href="{{ route('quiz.prepare', 'kuis-2') }}">Kuis Rotasi
                                Bumi</a></li> --}}
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('materi', 'revolusi-bumi') }}">Revolusi
                                    Bumi</a></li>
                            {{-- <li class="pc-item"><a class="pc-link" href="{{ route("quiz.prepare","kuis-3") }}">Kuis Revolusi Bumi</a></li> --}}
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('quiz.prepare', 'kuis-2') }}">Kuis</a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link d-flex {{ isReady('kuis-2') ? '' : 'locked-menu' }}">
                        @if (isReady('kuis-2'))
                            <span class="pc-micon"><i class="ti ti-menu"></i></span>
                        @else
                            <span class="pc-micon text-danger"><i class="ti ti-lock"></i></span>
                        @endif
                        <span class="pc-mtext">Menjelajahi Sistem Tata Surya</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        @if (isReady('kuis-2'))
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('materi', 'tata-surya-dan-matahari-sebagai-pusatnya') }}">Tata surya
                                    dan
                                    matahari sebagai pusatnya.</a></li>
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('materi', 'planet-sebagai-anggota-tata-surya') }}">Planet sebagai
                                    anggota
                                    tata surya</a></li>
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('materi', 'mengenal-lebih-dalam-tentang-planet') }}">Mengenal Lebih
                                    Dalam
                                    Tentang Plannet</a></li>
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('materi', 'berkenalan-dengan-benda-langit') }}">Mari berkenalan
                                    dengan
                                    benda langit</a></li>
                            {{-- <li class="pc-item"><a class="pc-link" href="{{ route("quiz.prepare","kuis-4") }}">Kuis Menjelajah Tata surya</a></li> --}}
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('quiz.prepare', 'kuis-3') }}">Kuis</a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="pc-item pc-caption">
                    <label>Evaluasi</label>
                    <i class="ti ti-news"></i>
                </li>
                <li class="pc-item">
                    <a href="{{ route("quiz.prepare","evaluasi") }}" class="pc-link d-flex {{ isReady('kuis-3') ? '' : 'locked-menu' }}">
                        @if (isReady('kuis-3'))
                            <span class="pc-micon"><i class="fas fa-rocket"></i></span>
                        @else
                            <span class="pc-micon text-danger"><i class="ti ti-lock"></i></span>
                        @endif
                        <span class="pc-mtext">Evaluasi</span>
                    </a>
                </li>
                @if (Auth::user()->role == 'guru')
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="{{ asset('assets') }}/images/img-navbar-card.png" alt="images"
                                class="img-fluid mb-2">
                            <h5>Dashboard</h5>
                            <p>Fitur Khusus Guru!</p>
                            <a href="{{ route('guru.nilai') }}" class="btn btn-success">Dashboard Guru</a>
                        </div>
                    </div>
                @endif
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lockedMenus = document.querySelectorAll('.locked-menu');
            lockedMenus.forEach(function(menu) {
                menu.addEventListener('click', function(e) {
                    e.preventDefault(); // blok supaya gak dropdown
                    Swal.fire({
                        imageUrl: 'https://cdn-icons-png.flaticon.com/512/3064/3064197.png', // ikon gembok
                        imageWidth: 80,
                        imageAlt: 'Akses Terkunci',
                        title: 'Akses Terkunci!',
                        // Ubah pesan teks di bawah ini:
                        text: 'Selesaikan kuis materi sebelumnya dengan nilai mencapai KKM agar bisa lanjut!',
                        confirmButtonText: 'Siap!',
                        confirmButtonColor: '#d33'
                    });
                });
            });
        });
    </script>
@endpush