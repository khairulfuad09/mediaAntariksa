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
                            <h5 class="m-b-10">{{ $data['materi'] }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">{{ $data['title'] }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow border-0">
                        <div class="card-header">
                            <h5>Data Siswa</h5>
                        </div>
                        <div class="card-body p-4 ">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td scope="col">Nama</td>
                                        <td scope="col">{{ Auth::User()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">NIS</td>
                                        <td scope="col">{{ Auth::User()->identity }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Kelas</td>
                                        <td scope="col">{{ Auth::User()->kelas }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Tanggal Mengerjakan</td>
                                        <td scope="col">{{ now() }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow border-0">
                        <div class="card-header">
                            <h5>Informasi Kuis</h5>
                        </div>
                        <div class="card-body p-4 ">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td scope="col">Judul</td>
                                        <td scope="col">{{ $data['title'] }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Materi</td>
                                        <td scope="col">{{ $data['materi'] }}</td>
                                    </tr>

                                    <tr>
                                        <td scope="col">KKM (Batas Lulus)</td>
                                        <td scope="col">
                                            {{-- Pakai '?? 70' sebagai pengaman jika controller belum diupdate --}}
                                            <span class="badge bg-light-danger text-danger border border-danger fw-bold fs-6">
                                                {{ $data['kkm'] ?? 70 }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Jumlah Soal</td>
                                        <td scope="col">{{ $data['countQuestion'] }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Waktu</td>
                                        <td scope="col">{{ $data['durasi'] }} Menit</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="d-flex flex-strecth">
                                <button id="startQuiz" class="btn btn-primary flex-fill">Mulai {{ $data['title'] }}</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    const buttonStart = document.getElementById('startQuiz');
    buttonStart.addEventListener('click', function() {
        startQuiz();
    });

    function startQuiz() {
        Swal.fire({
            title: "Mulai Mengerjakan?"
            , text: "Anda akan mengerjakan {{ $data['title'] }} materi {{ $data['materi'] }}"
            , icon: "warning"
            , showCancelButton: true
            , confirmButtonColor: "#3085d6"
            , cancelButtonColor: "#d33"
            , confirmButtonText: "Mulai"
        }).then((result) => {
            if (result.isConfirmed) {
                let timerInterval;
                window.location.href = "{{ route('eval.start', $param) }}";
                Swal.fire({
                    title: "Mengarahkan ke halaman {{ $data['title'] }}!"
                    , html: "Batal dalam <b></b> milliseconds."
                    , timer: 210000
                    , timerProgressBar: true
                    , didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                            timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    }
                    , willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log("I was closed by the timer");
                    }
                });
            } else {

            }
        });
    }

</script>
@endpush
