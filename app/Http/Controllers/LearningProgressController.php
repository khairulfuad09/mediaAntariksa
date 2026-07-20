<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningProgress;
use Illuminate\Support\Facades\Auth;

class LearningProgressController extends Controller
{
    public function set_progress(Request $request)
    {
        $data = $request->all();
        $progress = learningProgress::where('user_id', Auth::User()->id)
            ->where("materi", $data["materi"])
            ->where("aktivitas", $data["activity"])
            ->first();

        if ($progress == null) {
            $progress = new learningProgress();
            $message = ["message" => "$progress->point Poin ditambahkan!"];
        } else {
            if ($progress->point == $data["point"]) {
                $message = ["message" => "Point mu masih sama dengan sebelumnya! ayo jawaban soal lebih baik lagi"];
            } else if ($progress->point < $data["point"]) {
                $selisih = $data["point"] - $progress->point;
                $message = ["message" => "Wow anda berhasil meningkatkan point $selisih point!, point anda sekarang adalah $data[point]"];
            } else if ($progress->point > $data["point"]) {
                $selisih = $progress->point - $data["point"];
                $message = ["message" => "Point anda kurang dari sebelumnya, ayo lebih semangat lagi"];
            }
        }
        $progress->user_id = Auth::User()->id;
        $progress->materi = $data["materi"];
        $progress->aktivitas = $data["activity"];
        $progress->point = $data["point"];
        $progress->jawaban = "[]";
        $progress->save();

        return response()->json($message);
    }

    public function get_progress($materi)
    {
        $progress = learningProgress::where("user_id", Auth::User()->id)
            ->where("materi", $materi)->get()->map(
                function ($item) {
                    $item->jawaban = json_decode($item->jawaban);
                    return $item;
                }
            )->toArray();

        return response()->json($progress);
    }

    public function countPoint()
    {
        $point = learningProgress::where("user_id", Auth::User()->id)->sum("point");
        return response()->json(["point" => $point]);
    }
}
