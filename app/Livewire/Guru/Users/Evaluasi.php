<?php

namespace App\Livewire\Guru\Users;

use Livewire\Component;
use App\Models\User;
use App\Exports\NilaiExport; // <--- Import Export Class
use Maatwebsite\Excel\Facades\Excel;
use App\Models\KkmSetting;

class Evaluasi extends Component
{
    public $users;
    public $materi;
    public $search = '';

      public $kkm;

    // Statistik keseluruhan
    public $jumlah_dikerjakan;
    public $jumlah_belum_dikerjakan;
    public $rata_rata;
    public $nilai_tertinggi;
    public $nilai_terendah;
    public $jumlah_lulus;
    public $jumlah_tidak_lulus;

    public function mount($materi = "evaluasi")
    {
        $this->materi = $materi;
        $this->retrieveData();
        $this->loadKkm(); // Load KKM awal
    }

    public function loadKkm()
    {
        $setting = KkmSetting::where('materi', $this->materi)->first();
        $this->kkm = $setting ? $setting->kkm : 70; // Default 70 jika belum diset
    }

    

    public function retrieveData()
    {
        // Ambil user dengan quiz yang sesuai materi
        $query = User::with(['quizzes' => function ($q) {
            $q->where('materi', $this->materi);
        }])->where('role', 'siswa');

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $this->users = $query->get();

        // Gabungkan semua quiz dari semua user untuk statistik
        $allQuizzes = $this->users->flatMap(fn($user) => $user->quizzes);

        $this->jumlah_dikerjakan = $allQuizzes->count();
        $this->rata_rata = $allQuizzes->avg('nilai');
        $this->nilai_tertinggi = $allQuizzes->max('nilai');
        $this->nilai_terendah = $allQuizzes->min('nilai');
        $this->jumlah_lulus = $allQuizzes->where('status', 'lulus')->count();
        $this->jumlah_tidak_lulus = $allQuizzes->where('status', 'tidak lulus')->count();
        $this->jumlah_belum_dikerjakan = $this->users->count() - $this->jumlah_dikerjakan;

    }

    public function exportExcel()
    {
        // Pastikan data terbaru sudah ter-load (termasuk filter search kalau ada)
        $this->retrieveData();

        // Nama file: Nilai_kuis-1_2025-01-01.xlsx
        $fileName = 'Nilai_' . $this->materi . '_' . date('Y-m-d_H-i') . '.xlsx';

        // Download Excel
        // Kita kirim $this->users, $this->kkm, dan $this->materi ke Class Export
        return Excel::download(new NilaiExport($this->users, $this->kkm, $this->materi), $fileName);
    }

    public function render()
    {
        return view('livewire.guru.users.evaluasi')->layout('layouts.guru-layout');
    }
}
