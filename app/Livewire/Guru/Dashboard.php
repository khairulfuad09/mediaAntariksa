<?php

namespace App\Livewire\Guru;

use App\Models\Quiz;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon\Carbon;

class Dashboard extends Component
{
    public $countSiswa;
    public $countLulus;
    public $countTidakLulus;
    public $averageEval;
    public $mengerjakanEvaluasi;

    public $topUsers;

    public $rataKelas;
    public $distribusiNilai;
    public function mount()
    {
        $this->countSiswa = User::where("role", "siswa")->count();
        $this->countLulus = Quiz::where("materi", "evaluasi")
            ->where("status", "lulus")->count();
        $this->countTidakLulus = Quiz::where("materi", "evaluasi")
            ->where("status", "tidak lulus")->count();
        $this->averageEval = Quiz::where("materi", "evaluasi")
            ->avg("nilai");
        $this->mengerjakanEvaluasi = Quiz::where("materi", "evaluasi")->count();

        $this->durasiMengerjakan = DB::table('quizzes')
            ->select(DB::raw('AVG(TIMESTAMPDIFF(SECOND, waktu_mulai, waktu_selesai)) as avg_seconds'))
            ->value('avg_seconds');

        $this->topUsers = Quiz::with('user')->where('materi', 'latihan-3')
            ->orderBy('nilai', 'desc')
            ->take(5)->get();


        $this->distribusiNilai = [
            'tidak lulus' => Quiz::where('status', 'tidak lulus')->count(),
            'dibawah dari 70' => Quiz::where('nilai', '<', 70)->where('status', 'lulus')->count(),
            '70-80' => Quiz::whereBetween('nilai', [70, 80])->where('status', 'lulus')->count(),
            '80-90' => Quiz::whereBetween('nilai', [80, 90])->where('status', 'lulus')->count(),
            '90-100' => Quiz::whereBetween('nilai', [90, 100])->where('status', 'lulus')->count(),
        ];

        $this->rataKelas = DB::table('quizzes')
            ->join('users', 'quizzes.user_id', '=', 'users.id')
            ->select('users.kelas', DB::raw('AVG(quizzes.nilai) as rata_rata'))
            ->groupBy('users.kelas')
            ->get();
    }

    public function render()
    {
        return view('livewire.guru.dashboard')->layout('layouts.guru-layout');
    }
}
