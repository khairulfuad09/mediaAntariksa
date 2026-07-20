<div class="modal fade" id="modal-badge" tabindex="-1" aria-labelledby="modal-badge" aria-hidden="true">
    <!-- Modal dialog dengan ukuran ekstra besar -->
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Header modal -->
            <div class="modal-header">
                <h5 class="modal-title">Semua Lencana</h5> <!-- Judul modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- Tombol tutup modal -->
            </div>
            <!-- Body modal -->
            <div class="modal-body">
                <!-- Carousel untuk menampilkan semua lencana -->
                <div class="owl-carousel owl-theme" id="all-badge">
                    @foreach ($badge as $key => $value)
                        <!-- Looping melalui setiap lencana -->
                        @if (isset($value['badge']))
                            <!-- Memeriksa apakah lencana ada -->
                            @if ($value['get'])
                                <!-- Jika lencana sudah diperoleh -->
                                <div class="item" style="width:160px" data-bs-placement="bottom" data-merge="1"
                                    data-bs-toggle="tooltip" data-bs-title="{{ $key }} diperoleh">
                                @else
                                    <!-- Jika lencana belum diperoleh -->
                                    <div class="item" style="width:160px" data-merge="1">
                            @endif
                            <!-- Kartu untuk menampilkan informasi lencana -->
                            <div class="card card-body text-center">
                                <img src="{{ asset('badges/' . $value['badge']) }}" alt="" class="img-fluid "
                                    {{ $value['get'] ? '' : 'style=filter:grayscale(100%);' }}> <!-- Gambar lencana -->
                                <strong>{{ $key }}</strong> <!-- Nama lencana -->
                                @if (!$value['get'])
                                    <!-- Jika lencana belum diperoleh -->
                                    <p class="text-muted">
                                        <!-- Progress bar untuk menunjukkan kemajuan -->
                                    <div class="progress m-0" role="progressbar" aria-label="Example with label"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height:10px;">
                                        <div class="progress-bar text-bg-warning"
                                            style="width: {{ $value['percentage'] }}%; ">
                                        </div>
                                    </div>
                                    <!-- Menampilkan informasi poin -->
                                    <small class="text-center m-0 p-0"
                                        style="font-size: 10px;">{{ $point }}/{{ $value['point_minimum'] }} Point
                                        ({{ $value['percentage'] }}%)
                                    </small>
                                @else
                                    <!-- Jika lencana sudah diperoleh -->
                                    <h1 class='bx bx-check-circle text-success badge-done'></h1>
                                    <!-- Ikon centang hijau -->
                                @endif
                            </div>
                </div> <!-- Penutup div.item -->
                @endif
                @endforeach
            </div> <!-- Penutup div.owl-carousel -->
        </div> <!-- Penutup div.modal-body -->
    </div> <!-- Penutup div.modal-content -->
</div> <!-- Penutup div.modal -->
