<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row  align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Guru</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('guru.user') }}">Siswa</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Hasil Evaluasi</li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h4>Hasil Evaluasi</h4>
            <div class="card card-body mb-10">
                <div class="row">
                    <div class="col-md-10">
                        <div class="position-relative mb-10">
                            <input type="text" wire:model="search"
                                class="text-counter placeholder-13 form-control py-11 pe-76" maxlength="100"
                                id="courseTitle" placeholder="Cari Nama Siswa....">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button wire:click="retrieveData" class="btn btn-primary mb-0">
                            <i class="ph ph-magnifying-glass" wire:loading.remove></i>
                            <span wire:loading wire:target="retrieveData">
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </span>
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
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Statistik Hasil Evaluasi
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Jumlah Siswa Mengerjakan</h6>
                                            <h4 class="mb-0">{{ $jumlah_dikerjakan }} / {{ count($users) }}

                                                <span class="badge bg-light-info border border-info">
                                                    {{ $jumlah_dikerjakan > 0 ? round(($jumlah_dikerjakan / count($users)) * 100, 2) : 0 }}%
                                                </span>
                                            </h4>

                                        </div>
                                        <div id="statistik-graph-1"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Rata-rata Nilai</h6>
                                            <h4 class="mb-0">{{ $jumlah_dikerjakan > 0 ? round($rata_rata, 2) : 0 }}
                                            </h4>
                                        </div>
                                        <div id="statistik-graph-2"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Nilai Tertinggi</h6>
                                            <h4 class="mb-0">{{ $jumlah_dikerjakan > 0 ? $nilai_tertinggi : '-' }}
                                            </h4>
                                        </div>
                                        <div id="statistik-graph-3"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Nilai Terendah</h6>
                                            <h4 class="mb-0">{{ $jumlah_dikerjakan > 0 ? $nilai_terendah : '-' }}</h4>
                                        </div>
                                        <div id="statistik-graph-4"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Jumlah Lulus</h6>
                                            <h4 class="mb-0">
                                                {{ $jumlah_lulus }} / {{ count($users) }}
                                                <span class="badge bg-light-success border border-success">
                                                    {{ $jumlah_dikerjakan > 0 ? round(($jumlah_lulus / $jumlah_dikerjakan) * 100, 2) : 0 }}%
                                                </span>
                                            </h4>
                                        </div>
                                        <div id="statistik-graph-5"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="mb-2 f-w-400 text-muted">Jumlah Tidak Lulus</h6>
                                            <h4 class="mb-0">
                                                {{ $jumlah_tidak_lulus }}
                                                <span class="badge bg-light-danger border border-danger">
                                                    {{ $jumlah_dikerjakan > 0 ? round(($jumlah_tidak_lulus / $jumlah_dikerjakan) * 100, 2) : 0 }}%
                                                </span>
                                            </h4>
                                        </div>
                                        <div id="statistik-graph-6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="table-responsive">
                        <table id="assignmentTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="fixed-width">
                                        #
                                    </th>
                                    <th class="h6 text-gray-300">Nama</th>
                                    <th class="h6 text-gray-300">Nilai</th>
                                    <th class="h6 text-gray-300">Status</th>
                                    <th class="h6 text-gray-300">Waktu Mulai</th>
                                    <th class="h6 text-gray-300">Waktu Berakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="fixed-width">
                                            {{-- number --}}
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <div class="flex-align gap-8">
                                                <span
                                                    class="h6 mb-0 fw-medium text-gray-300">{{ $user->name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex-align gap-8">
                                                @if (count($user->quizzes) > 0)
                                                    <span
                                                        class="h6 mb-0 fw-medium text-gray-300">{{ $user->quizzes[0]->nilai }}</span>
                                                @else
                                                    <span class="h6 mb-0 fw-medium text-danger text-gray-300">Belum
                                                        dikerjakan</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            @if (count($user->quizzes) > 0)
                                                @if ($user->quizzes[0]->nilai > 70)
                                                    <span
                                                        class="badge bg-light-success border border-success text-success-600">
                                                        <span
                                                            class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>
                                                        Lulus
                                                    </span>
                                                @else
                                                    <span
                                                        class="badge bg-light-danger border border-danger text-danger-600">
                                                        <span
                                                            class="w-6 h-6 bg-danger-600 rounded-circle flex-shrink-0"></span>
                                                        Tidak lulus
                                                    </span>
                                                @endif
                                            @else
                                                <span
                                                    class="text-13 py-2 px-8 bg-danger-50 text-danger-600 d-inline-flex align-items-center gap-8 rounded-pill">
                                                    <span
                                                        class="w-6 h-6 bg-danger-600 rounded-circle flex-shrink-0"></span>
                                                    -
                                                </span>
                                            @endif
                                        </td>
                                        @if (count($user->quizzes) > 0)
                                            <td>

                                                <span
                                                    class="h6 mb-0 fw-medium text-gray-300">{{ $user->quizzes[0]->waktu_mulai }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="h6 mb-0 fw-medium text-gray-300">{{ $user->quizzes[0]->waktu_selesai }}</span>
                                            </td>
                                        @else
                                            <td>
                                                <span class="h6 mb-0 fw-medium text-gray-300">-</span>
                                            </td>
                                            <td>
                                                <span class="h6 mb-0 fw-medium text-gray-300">-</span>
                                            </td>
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
</div>
