<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Guru</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('guru.user') }}">Siswa</a></li>
                            <li class="breadcrumb-item">Hasil Kuis</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h4>Hasil Kuis</h4>

            <div class="card card-body mb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="position-relative">
                            <input type="text" wire:model.live="search" class="form-control py-2" placeholder="Cari Nama Siswa....">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select wire:model.live="materi" class="form-control form-select py-2">
                            <option value="kuis-1">Kuis Menjelajahi Bumi, Matahari, dan Bulan</option>
                            <option value="kuis-2">Kuis Dampak Revolusi dan Rotasi Bumi</option>
                            <option value="kuis-3">Kuis Menjelajahi Tata Surya</option>
                            <option value="evaluasi">Evaluasi</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button wire:click="retrieveData" class="btn btn-primary w-100 mb-0">
                            <i class="ph ph-magnifying-glass" wire:loading.remove target="retrieveData"></i>
                            <div wire:loading wire:target="retrieveData" class="spinner-border spinner-border-sm" role="status"></div>
                        </button>
                    </div>
                    <div class="col-md-1">
                        <button wire:click="exportExcel" class="btn btn-success w-100 mb-0" title="Export Excel">
                            <i class="ph ph-file-xls" wire:loading.remove target="exportExcel"></i>
                            <div wire:loading wire:target="exportExcel" class="spinner-border spinner-border-sm" role="status"></div>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card mb-3 border-left-primary shadow-sm" style="border-left: 5px solid #4680ff;">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5 class="mb-1">Pengaturan Kelulusan</h5>
                            <small class="text-muted">
                                Atur KKM untuk <strong>{{ strtoupper(str_replace('-', ' ', $materi)) }}</strong>.
                                Nilai di bawah KKM akan dianggap tidak lulus.
                            </small>

                            @if (session()->has('message'))
                            <div class="text-success small mt-1">
                                <i class="ph ph-check-circle"></i> {{ session('message') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-light fw-bold">KKM</span>
                                <input type="number" wire:model="kkm" class="form-control fw-bold text-center" placeholder="70">
                                <button wire:click="saveKkm" class="btn btn-dark" type="button">
                                    <span wire:loading.remove wire:target="saveKkm">Simpan</span>
                                    <span wire:loading wire:target="saveKkm">
                                        <span class="spinner-border spinner-border-sm"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion mb-3" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            Statistik Hasil Kuis (Batas Lulus: {{ $kkm }})
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Peserta</h6>
                                            <h4 class="mb-0">{{ $jumlah_dikerjakan }} / {{ count($users) }}
                                                <span class="badge bg-light-info border border-info text-xs">
                                                    {{ $jumlah_dikerjakan > 0 ? round(($jumlah_dikerjakan / count($users)) * 100) : 0 }}%
                                                </span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Rata-rata</h6>
                                            <h4 class="mb-0">{{ $jumlah_dikerjakan > 0 ? round($rata_rata, 2) : 0 }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Tertinggi</h6>
                                            <h4 class="mb-0">{{ $jumlah_dikerjakan > 0 ? $nilai_tertinggi : '-' }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Terendah</h6>
                                            <h4 class="mb-0">{{ $jumlah_dikerjakan > 0 ? $nilai_terendah : '-' }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Lulus (>= {{ $kkm }})</h6>
                                            <h4 class="mb-0 text-success">
                                                {{ $jumlah_lulus }}
                                                <span class="badge bg-light-success border border-success text-xs">
                                                    {{ $jumlah_dikerjakan > 0 ? round(($jumlah_lulus / $jumlah_dikerjakan) * 100, 2) : 0 }}%
                                                </span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Tidak Lulus (< {{ $kkm }})</h6>
                                                    <h4 class="mb-0 text-danger">
                                                        {{ $jumlah_tidak_lulus }}
                                                        <span class="badge bg-light-danger border border-danger text-xs">
                                                            {{ $jumlah_dikerjakan > 0 ? round(($jumlah_tidak_lulus / $jumlah_dikerjakan) * 100, 2) : 0 }}%
                                                        </span>
                                                    </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Berakhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $user->name }}</span>
                                </td>
                                <td>
                                    @if (count($user->quizzes) > 0)
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $user->quizzes[0]->nilai }}</span>
                                    @else
                                    <span class="text-danger small">Belum dikerjakan</span>
                                    @endif
                                </td>
                                <td>
                                    @if (count($user->quizzes) > 0)
                                    {{-- BANDINGKAN DENGAN VARIABLE KKM --}}
                                    @if ($user->quizzes[0]->nilai >= $kkm)
                                    <span class="badge bg-light-success border border-success text-success-600">
                                        <span class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>
                                        Lulus
                                    </span>
                                    @else
                                    <span class="badge bg-light-danger border border-danger text-danger-600">
                                        <span class="w-6 h-6 bg-danger-600 rounded-circle flex-shrink-0"></span>
                                        Tidak lulus
                                    </span>
                                    @endif
                                    @else
                                    <span class="badge bg-light-secondary text-secondary">-</span>
                                    @endif
                                </td>
                                @if (count($user->quizzes) > 0)
                                <td>{{ $user->quizzes[0]->waktu_mulai }}</td>
                                <td>{{ $user->quizzes[0]->waktu_selesai }}</td>
                                @else
                                <td>-</td>
                                <td>-</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
