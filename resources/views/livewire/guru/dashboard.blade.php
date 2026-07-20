<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row  align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Guru</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="content">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Total Siswa</h6>
                        <h4 class="mb-0">{{ $countSiswa }}</h4>
                    </div>
                    <div id="total-value-graph-1"></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Sudah Mengerjakan Evaluasi</h6>
                        <h4 class="mb-0">{{ $mengerjakanEvaluasi }} <span
                                class="badge bg-light-info border border-primary"><i class="ti ti-trending-down"></i>
                                {{ ($mengerjakanEvaluasi / $countSiswa) * 100 }}%</span></h4>
                    </div>
                    <div id="total-value-graph-2"></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Lulus Evaluasi</h6>
                        <h4 class="mb-0">{{ $countLulus }} <span
                                class="badge bg-light-success border border-success"><i
                                    class="ti ti-trending-up"></i>{{ ($countLulus / $countSiswa) * 100 }}</span></h4>
                    </div>
                    <div id="total-value-graph-3"></div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Tidak Lulus Evaluasi</h6>
                        <h4 class="mb-0">{{ $countTidakLulus }} <span
                                class="badge bg-light-danger border border-danger"><i class="ti ti-trending-down"></i>
                                {{ ($countTidakLulus / $countSiswa) * 100 }}</span></h4>
                    </div>
                    <div id="total-value-graph-4"></div>
                </div>
            </div>

            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">🏆 Top 5 Siswa Nilai Tertinggi</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-numbered">
                            @if (count($topUsers) == 0)
                                <div class="alert alert-info">
                                    <strong>Belum ada siswa yang mengerjakan evaluasi</strong>
                                </div>
                    </div>
                @else
                    @foreach ($topUsers as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $item->user->name }}</span>
                            <span class="badge bg-primary rounded-pill">{{ $item->nilai }}</span>
                        </li>
                    @endforeach
                    @endif
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">📊 Distribusi Nilai Siswa</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="nilaiChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">📊 Nilai Tiap Kelas Siswa</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="chartKelas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('nilaiChart').getContext('2d');
        console.log(@json($distribusiNilai))
        var nilaiChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    label: 'Jumlah Siswa',
                    data: @json($distribusiNilai),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        const ctxs = document.getElementById('chartKelas');

        const chart = new Chart(ctxs, {
            type: 'bar',
            data: {
                labels: {!! json_encode($rataKelas->pluck('kelas')) !!},
                datasets: [{
                    label: 'Rata-rata Nilai',
                    data: {!! json_encode($rataKelas->pluck('rata_rata')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }]
            },
            options: {
                scales: {
                    y: {
                        min: 0,
                        max: 100,
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
