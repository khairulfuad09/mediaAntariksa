@extends('layouts.content-layout')

@section('page-name', 'Dashboard Siswa')
@section('page-description')

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
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="content">
                <section id="page-1">
                    <div class="card">
                        <div class="card-header">
                            MENJELAJAHI BUMI DAN ANTARIKSA
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <h3 class="text-primary">Tujuan Pembelajaran</h3>
                                <ul>
                                    <li>Peserta didik dapat menjelaskan sistem tata surya dan dampaknya bagi kehidupan di
                                        bumi
                                        dalam bentuk buku yang disertai ilustrasi.</li>
                                    <li>Peserta didik dapat melakukan penelusuran untuk mencari informasi yang dibutuhkan.
                                    </li>
                                </ul>
                            </div>

                            <div class="mb-4">
                                <h3 class="text-success">Capaian Pembelajaran</h3>
                                <p>Peserta didik mendemonstrasikan bagaimana sistem tata surya bekerja dan kaitannya dengan
                                    gerak rotasi dan revolusi bumi.</p>
                                <p>Peserta didik merefleksikan bagaimana perubahan kondisi alam di permukaan bumi terjadi
                                    akibat
                                    faktor alam maupun perbuatan manusia, mengidentifikasi pola hidup yang menyebabkan
                                    terjadinya permasalahan lingkungan serta memprediksi dampaknya terhadap kondisi sosial
                                    kemasyarakatan dan ekonomi.</p>
                            </div>

                            <div class="mb-4">
                                <h3 class="text-warning">Apa itu Bumi dan Antariksa?</h3>
                                <p>Bayangkan kamu bisa naik roket dan terbang ke luar angkasa… Apa yang akan kamu lihat?</p>
                                <p>Apakah Bumi benar-benar bulat? Apa rasanya melihat matahari dari luar angkasa? Dan
                                    bagaimana
                                    bulan bisa memengaruhi pasang surut air laut?</p>
                                <p>Kita akan menjelajahi rahasia langit dan luar angkasa. Kita akan belajar tentang planet,
                                    bintang, bulan, dan benda langit lainnya.</p>
                                <p>Tidak hanya itu, kita juga akan mengenal gerak bumi, seperti rotasi dan revolusi, yang
                                    ternyata memengaruhi kehidupan kita sehari-hari seperti siang dan malam, serta perubahan
                                    musim.</p>
                                <div class="alert alert-info mt-3" role="alert">
                                    🌌 Bersiaplah, karena pelajaran ini seperti petualangan luar angkasa penuh misteri dan
                                    keajaiban alam semesta!
                                </div>
                            </div>
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
        'nextLink' => route('materi', 'bumi-bulan-dan-matahari'),
        'prevLink' => '#',
    ])
@endsection


@push('scripts')
@endpush
