<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="../dashboard/index.html" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <h3>Media Antariksa</h3>
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{ route('guru.dashboard') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('guru.siswa') }}" class="pc-link d-flex">
                        <span class="pc-micon"><i class="fas fa-user-graduate"></i></span>
                        <span class="pc-mtext">Siswa</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('guru.user') }}" class="pc-link d-flex">
                        <span class="pc-micon"><i class="fas fa-rocket"></i></span>
                        <span class="pc-mtext">Pengguna</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('guru.nilai') }}" class="pc-link d-flex">
                        <span class="pc-micon"><i class="fas fa-file-invoice"></i></span>
                        <span class="pc-mtext">Nilai Kuis</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('guru.evaluasi') }}" class="pc-link d-flex" disabled>
                        <span class="pc-micon"><i class="far fa-file-alt"></i></span>
                        <span class="pc-mtext">Nilai Evaluasi</span>
                    </a>
                </li>


                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('assets') }}/images/img-navbar-card.png" alt="images"
                            class="img-fluid mb-2">
                        <h5>Materi</h5>
                        <p>Kembali Ke Halaman Materi</p>
                        <a href="{{ route("welcome.index") }}"
                            class="btn btn-success">Materi</a>
                    </div>
                </div>
        </div>
    </div>
</nav>
