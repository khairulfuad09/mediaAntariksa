<?php

namespace App\Livewire\Guru\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\KkmSetting; // Pastikan model ini sudah ada
use App\Exports\NilaiExport; // <--- Import Export Class
use Maatwebsite\Excel\Facades\Excel;


class Nilai extends Component
{
    public $users;
    public $materi;
    public $search = '';

    // KKM Logic
    public $kkm;

    // Statistik
    public $jumlah_dikerjakan;
    public $jumlah_belum_dikerjakan;
    public $rata_rata;
    public $nilai_tertinggi;
    public $nilai_terendah;
    public $jumlah_lulus;
    public $jumlah_tidak_lulus;

    public function mount($materi = "kuis-1")
    {
        $this->materi = $materi;
        $this->loadKkm(); // Load KKM awal
        $this->retrieveData();
    }

    // Load KKM dari Database berdasarkan materi yang dipilih
    public function loadKkm()
    {
        $setting = KkmSetting::where('materi', $this->materi)->first();
        $this->kkm = $setting ? $setting->kkm : 70; // Default 70 jika belum diset
    }

    

    // Listener jika dropdown materi berubah
    public function updatedMateri()
    {
        // 1. Load KKM milik materi yang baru dipilih
        $this->loadKkm(); 
        // 2. Load data user & hitung statistik ulang
        $this->retrieveData(); 
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

    // Action untuk Tombol Simpan KKM
    public function saveKkm()
    {
        $this->validate([
            'kkm' => 'required|integer|min:0|max:100',
        ]);

        KkmSetting::updateOrCreate(
            ['materi' => $this->materi],
            ['kkm' => $this->kkm]
        );

        // Hitung ulang statistik setelah save
        $this->retrieveData();
        
        // Opsional: Kirim notifikasi toast kalau ada librarynya, atau session flash
        session()->flash('message', 'KKM berhasil diperbarui!');
    }

    public function retrieveData()
    {
        $query = User::with(['quizzes' => function ($q) {
            $q->where('materi', $this->materi);
        }])->where('role', 'siswa');

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $this->users = $query->get();

        // Gabungkan semua quiz
        $allQuizzes = $this->users->flatMap(fn($user) => $user->quizzes);
        $this->jumlah_dikerjakan = $allQuizzes->count();
        $this->rata_rata = $allQuizzes->avg('nilai');
        $this->nilai_tertinggi = $allQuizzes->max('nilai');
        $this->nilai_terendah = $allQuizzes->min('nilai');

        // Logic Lulus/Tidak Lulus REALTIME berdasarkan $this->kkm
        $this->jumlah_lulus = $allQuizzes->filter(fn($q) => $q->nilai >= $this->kkm)->count();
        $this->jumlah_tidak_lulus = $allQuizzes->filter(fn($q) => $q->nilai < $this->kkm)->count();
        
        $this->jumlah_belum_dikerjakan = $this->users->count() - $this->jumlah_dikerjakan;
    }

    public function render()
    {
        return view('livewire.guru.users.nilai')->layout('layouts.guru-layout');
    }
}