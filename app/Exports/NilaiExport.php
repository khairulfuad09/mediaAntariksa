<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NilaiExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $users;
    protected $kkm;
    protected $materi;

    // Kita terima data users, kkm, dan materi dari Livewire
    public function __construct($users, $kkm, $materi)
    {
        $this->users = $users;
        $this->kkm = $kkm;
        $this->materi = $materi;
    }

    public function collection()
    {
        return $this->users;
    }

    // Mengatur Header Kolom Excel
    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'Materi',
            'Nilai',
            'KKM',
            'Status',
            'Waktu Mulai',
            'Waktu Selesai',
        ];
    }

    // Mengatur isi data per baris
    public function map($user): array
    {
        // Ambil quiz yang sesuai materi (karena relasi sudah diload di Livewire)
        $quiz = $user->quizzes->first(); 

        // Default value kalau belum mengerjakan
        $nilai = 0;
        $status = 'Belum Mengerjakan';
        $mulai = '-';
        $selesai = '-';

        if ($quiz) {
            $nilai = $quiz->nilai;
            $mulai = $quiz->waktu_mulai;
            $selesai = $quiz->waktu_selesai;

            // Logika Status Sesuai KKM Dinamis
            if ($nilai >= $this->kkm) {
                $status = 'LULUS';
            } else {
                $status = 'TIDAK LULUS';
            }
        }

        // Return array baris excel
        return [
            // Kita gak punya $loop->iteration di sini, jadi manual atau biarkan kosong
            // Tapi karena map tidak punya index, kita skip nomor atau pakai trik lain. 
            // Untuk simpelnya kita isi nama langsung, atau ID.
            $user->identity ?? $user->id, // Bisa diganti NIS/Identity
            $user->name,
            str_replace('-', ' ', strtoupper($this->materi)),
            $quiz ? $nilai : '0',
            $this->kkm,
            $status,
            $mulai,
            $selesai,
        ];
    }

    // Styling Header biar Bold (Opsional)
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}