<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningProgress;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $list_materi = [

        "menjelajah-matahari-bumi-dan-bulan" => [
            "title" => "Menjelajahi Matahari, Bumi dan Bulan",
            "total" => 6,
            "kuis" => 'kuis-1'
        ],
        "dampak-gerak-rotasi-dan-revolusi-bumi" => [
            "title" => "Dampak Gerak Rotasi dan Revolusi bumi",
            "total" => 5,
            "kuis" => 'kuis-2'
        ],

        "menjelajahi-sistem-tata-surya" => [
            "title" => "Menjelajahi Sistem Tata Surya",
            "total" => 3,
            "kuis" => 'kuis-3'
        ],
    ];

    protected $kuis = [
        'kuis-1',
        'kuis-2',
        'kuis-3',
        'evaluasi'
    ];

    protected $badge = [
        "pemula" => [
            "point_minimum" => 100,
            "badge" => "1.png",
            "get" => false,
        ],
        "menengah" => [
            "point_minimum" => 300,
            "badge" => "2.png",
            "get" => false,
        ],
        "ahli" => [
            "point_minimum" => 500,
            "badge" => "3.png",
            "get" => false,
        ],
        "Ahli Evaluasi" => [
            "point_minimum" => 700,
            "badge" => "4.png",
            "get" => false,
        ],
    ];
    public function index()
    {
        foreach ($this->list_materi as $key => $value) {
            // 1. Hitung Progress Materi Bacaan
            $this->list_materi[$key]["count"] = LearningProgress::where("user_id", auth()->user()->id)
                ->where('materi', $key)
                ->count();

            // 2. Cek Apakah Kuis Sudah Dikerjakan (Ambil Datanya)
            $quizData = Quiz::where('user_id', Auth::user()->id)
                ->where('materi', $this->list_materi[$key]['kuis'])
                ->first();

            // Jika kuis ada, hitung sebagai progress dan simpan nilainya
            if ($quizData) {
                $this->list_materi[$key]['count'] += 1; // Tambah 1 progress point dari kuis
                $this->list_materi[$key]['quiz_done'] = true; // Flag penanda kuis selesai
                $this->list_materi[$key]['model_kuis'] = $quizData->nilai; // Simpan nilai asli
            } else {
                $this->list_materi[$key]['quiz_done'] = false;
                $this->list_materi[$key]['model_kuis'] = 0;
            }

            // 3. Hitung Persentase Total
            $this->list_materi[$key]["percentage"] = floor(($this->list_materi[$key]['count'] / $value['total']) * 100);

            // 4. Status (Opsional, buat styling)
            if ($this->list_materi[$key]["percentage"] >= 100) {
                $this->list_materi[$key]["status"] = "done";
            } else {
                $this->list_materi[$key]["status"] = "progress";
            }
        }
        $topUsers = User::with('learningProgress')->where("role", "siswa")->get()->sortByDesc(function ($user) {
            return $user->learningProgress->sum('point');
        })->take(5);

        $loggedInUser = User::with('learningProgress')
            ->where('id', auth()->user()->id)
            ->first();

        $rank = User::with(['learningProgress', 'evaluasi'])->where('role', 'siswa')
            ->get()
            ->sortByDesc(function ($user) {
                return $user->learningProgress->sum('point');
            })
            ->pluck('id')
            ->search($loggedInUser->id) + 1;

        $total = 0;
        $progress = 0;

        $evaluasi = Quiz::where('user_id', Auth::user()->id)
            ->where('materi', "evaluasi")
            ->first();

        if ($evaluasi) {
            $progress += 1; // Tambah 1 progress point dari kuis   
        }


        foreach ($this->list_materi as $key => $value) {
            $progress += $value["count"];
            $total += $value["total"];
        }
        $total += 1;

        $list_materi = $this->list_materi;
        $percentage = floor(($progress / $total) * 100);


        $point = $loggedInUser->learningProgress->sum('point');
        $badge = $this->badge;
        $countBadge = 0;
        foreach ($badge as $key => $value) {
            $badge[$key]["percentage"] = floor($point * 100 / $value["point_minimum"]);
            if ($point >= $value["point_minimum"]) {
                $badge[$key]["get"] = true;
                $countBadge += 1;
            }
        }

        $nilai_kuis = Quiz::where("user_id", auth()->user()->id)->get();

        // dd($percentage,$progress,$total);

        return view('pages.dashboard', compact('percentage', 'progress', 'total', 'list_materi', 'topUsers', 'rank', 'badge', 'point', 'countBadge', 'nilai_kuis'));
    }
}
