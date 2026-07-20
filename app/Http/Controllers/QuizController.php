<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Helpers\Kuis_1;
use App\Helpers\Kuis_2;
use App\Helpers\Kuis_3;
use App\Helpers\Kuis_4;
use App\Helpers\Evaluasi;
use App\Helpers\Latihan_1;
use App\Helpers\Latihan_2;
use App\Helpers\Latihan_3;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Json;
use App\Models\KkmSetting;


class QuizController extends Controller
{


    public $quizInfo;

    public function __construct()
    {
        $this->quizInfo = [
            "kuis-1" => [
                "title" => "Kuis 1",
                "materi" => "Menjelajah Bumi dan Antariksa",
                "type" => "Kuis",
                "question" => Latihan_1::$question,
            ],
            "kuis-2" => [
                "title" => "Kuis 2",
                "materi" => "Dampak Rotasi dan Revolusi Bumi",
                "type" => "Kuis",
                "question" => Latihan_2::$question,
            ],
            "kuis-3" => [
                "title" => "Kuis 3",
                "materi" => "Menjelajah Bumi dan Antariksa",
                "type" => "Kuis",
                "question" => Latihan_3::$question,
            ],
            "evaluasi" => [
                "title" => "Evaluasi",
                "materi" => "evaluasi",
                "type" => "Evaluasi",
                "question" => Evaluasi::$questions,
                "durasi" => 60
            ]
        ];
    }

    public function BeforeQuiz($param)
    {
        $title = $this->quizInfo[$param]["title"];
        $info = $this->quizInfo[$param];
        $countQuestion = count($this->quizInfo[$param]["question"]);

        // --- LOGIC BARU: Ambil KKM dari database ---
        $setting = KkmSetting::where('materi', $param)->first();
        $kkm = $setting ? $setting->kkm : 70; // Default 70 jika belum diset
        // ------------------------------------------

        $data = [
            "title" => $title,
            "materi" => $this->quizInfo[$param]["materi"],
            "info" => $info,
            "countQuestion" => $countQuestion,
            "durasi" => 20,
            "kkm" => $kkm, // <--- Masukkan variable kkm ke sini
        ];

        return view("pages.quiz.quizStart", compact("data", "param"));
    }

    public function startQuiz($param)
    {
        $durasiEvaluasi = 20;

        $data = $this->quizInfo[$param];
        if (isset($data['durasi'])) {
            $durasiEvaluasi = $data["durasi"];
        }

        $endtime = date("Y-m-d H:i:s", strtotime("+$durasiEvaluasi minutes"));
        if (!session("endtime")) {
            session(["endtime" => $endtime, "startTime" => date("Y-m-d H:i:s")]);
        } else {
            session(["endtime" => $endtime, "startTime" => date("Y-m-d H:i:s")]);
        }

        $soalQuiz = $this->quizInfo[$param]["question"];
        $materi = $param;
        $info = $this->quizInfo[$param];
        $title = $this->quizInfo[$param]["title"];

        // --- TAMBAHAN LOGIC KKM ---
        // Ambil KKM dari DB berdasarkan materi, default 70 kalau belum diset
        $setting = KkmSetting::where('materi', $param)->first();
        $kkm = $setting ? $setting->kkm : 70;

        // Kirim variable $kkm ke view
        return view("pages.quiz.index", compact("soalQuiz", "materi", "info", "title", "kkm"));
    }

    public function submit(Request $request)
    {
        // --- TAMBAHAN LOGIC KKM ---
        // Ambil KKM lagi untuk validasi server-side
        $setting = KkmSetting::where('materi', $request->materi)->first();
        $batas_lulus = $setting ? $setting->kkm : 70;

        $quiz = Quiz::where("user_id", Auth::User()->id)->where("materi", $request->materi)->first();

        // Siapkan data yang mau disimpan/update
        $dataToSave = [
            'user_id' => Auth::User()->id,
            'materi' => $request->materi,
            'nilai' => $request->nilai,
            'jawaban' => Json::encode($request->quiz),
            'waktu_mulai' => Carbon::parse($request->waktu_mulai)->format('Y-m-d H:i:s'),
            'waktu_selesai' => Carbon::parse($request->waktu_selesai)->format('Y-m-d H:i:s'),
            // Gunakan variable $batas_lulus, BUKAN angka 70 manual
            'status' => $request->nilai >= $batas_lulus ? "lulus" : "tidak lulus"
        ];

        if ($quiz) {
            $quiz->update($dataToSave); // Pakai update biar lebih rapi
        } else {
            Quiz::create($dataToSave); // Pakai create
        }

        return response()->json($request->all());
    }
}
