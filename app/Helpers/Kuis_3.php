<?php

namespace App\Helpers;

class Kuis_3
{
    public static $questions = [
        [
            "question" => "Tahukah kamu? Di negara-negara empat musim seperti Jepang, tanaman apel hanya bisa tumbuh subur pada musim tertentu. Hal ini berkaitan dengan revolusi Bumi. Mengapa tanaman apel tidak bisa tumbuh di Indonesia yang hanya memiliki dua musim?",
            "choice" => [
                "A" => "Karena revolusi Bumi tidak terjadi di Indonesia",
                "B" => "Karena Indonesia tidak memiliki musim dingin akibat letaknya di garis khatulistiwa",
                "C" => "Karena Indonesia terlalu panas sepanjang tahun",
                "D" => "Karena Bumi tidak berputar di wilayah tropis",
            ],
            "answer" => "B"
        ],
        [
            "question" => "Budi memperhatikan bahwa siang hari menjadi lebih lama daripada malam hari di bulan Juni. Ia penasaran mengapa hal itu bisa terjadi. Apa penjelasan yang paling tepat berdasarkan dampak revolusi Bumi?",
            "choice" => [
                "A" => "Karena Bumi berotasi lebih cepat",
                "B" => "Karena matahari lebih dekat ke Bumi",
                "C" => "Karena Bumi sedang condong ke arah utara yang mengalami musim panas",
                "D" => "Karena bulan memantulkan cahaya lebih banyak",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Bayangkan jika Bumi tidak memiliki kemiringan sumbu. Apa yang mungkin akan terjadi pada musim di Bumi?",
            "choice" => [
                "A" => "Musim akan menjadi lebih banyak",
                "B" => "Tidak akan ada perubahan musim seperti sekarang",
                "C" => "Suhu Bumi menjadi sangat panas",
                "D" => "Siang dan malam akan selalu sama panjang",
            ],
            "answer" => "B"
        ],
        [
            "question" => "Jika kamu tinggal di Australia dan mengalami musim dingin, pada saat yang sama temanmu di Jepang sedang menikmati musim panas. Apa kesimpulan logis dari perbedaan musim tersebut?",
            "choice" => [
                "A" => "Matahari hanya menyinari bagian utara Bumi",
                "B" => "Sumbu Bumi tegak lurus terhadap Matahari",
                "C" => "Revolusi Bumi menyebabkan belahan Bumi utara dan selatan menerima sinar Matahari berbeda-beda",
                "D" => "Orbit Bumi berbentuk lingkaran sempurna",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Amira membaca di buku bahwa revolusi Bumi menyebabkan rasi bintang yang terlihat di langit malam berubah setiap bulan. Mengapa hal ini bisa terjadi?",
            "choice" => [
                "A" => "Karena Matahari berputar mengelilingi Bumi",
                "B" => "Karena posisi Bumi terhadap bintang berubah selama revolusi",
                "C" => "Karena bintang-bintang bergerak mengikuti arah Bumi",
                "D" => "Karena langit selalu berubah bentuk setiap malam",
            ],
            "answer" => "B"
        ]
    ];

    public static function getQuestion()
    {
        return self::$questions;
    }
}
