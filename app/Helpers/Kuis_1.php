<?php

namespace App\Helpers;

class Kuis_1
{
     public static  $questions = [
        [
            "question" => "Saat malam hari di Bumi, bagian Bumi yang mengalami malam tidak mendapatkan cahaya Matahari. Mengapa bagian itu tidak mendapatkan cahaya, padahal Matahari tetap bersinar?",
            "choice" => [
                "A" => "Karena Matahari sedang bersembunyi",
                "B" => "Karena bulan menutupi cahaya Matahari",
                "C" => "Karena Bumi berputar sehingga bagian itu membelakangi Matahari",
                "D" => "Karena Matahari berpindah ke sisi lain",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Bayangkan kamu sedang berdiri di pantai dan melihat air laut pasang naik. Apa hubungan peristiwa ini dengan posisi Bulan terhadap Bumi?",
            "choice" => [
                "A" => "Bulan membuat angin laut bertiup kencang",
                "B" => "Gravitasi Bulan menarik air laut sehingga menyebabkan pasang",
                "C" => "Cahaya Bulan menghangatkan air laut",
                "D" => "Bulan menyebabkan hujan di laut",
            ],
            "answer" => "B"
        ],
        [
            "question" => "Jika tidak ada rotasi Bumi, maka... Apa yang akan terjadi pada kehidupan di Bumi?",
            "choice" => [
                "A" => "Siang dan malam tetap terjadi seperti biasa",
                "B" => "Musim akan lebih cepat berubah",
                "C" => "Hanya satu sisi Bumi yang terus mengalami siang, sisi lain malam terus",
                "D" => "Bulan akan tampak lebih besar",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Mengapa gerhana Matahari tidak terjadi setiap bulan, padahal Bulan terus mengelilingi Bumi?",
            "choice" => [
                "A" => "Karena Bumi kadang tidak terlihat dari Bulan",
                "B" => "Karena posisi Bulan, Bumi, dan Matahari tidak selalu sejajar",
                "C" => "Karena cahaya Matahari sangat terang",
                "D" => "Karena Bulan tidak cukup besar untuk menutupi Matahari",
            ],
            "answer" => "B"
        ],
        [
            "question" => "Seorang siswa mengatakan bahwa Matahari mengelilingi Bumi karena terlihat bergerak dari timur ke barat. Bagaimana kamu menjelaskan bahwa sebenarnya Bumi yang berputar, bukan Matahari yang bergerak?",
            "choice" => [
                "A" => "Karena Matahari lebih kecil dari Bumi",
                "B" => "Karena Bumi tidak bisa bergerak",
                "C" => "Karena arah bayangan benda berubah karena rotasi Bumi",
                "D" => "Karena Bulan juga tampak bergerak",
            ],
            "answer" => "C"
        ]
    ];


    static public function getQuestion()
    {
        return self::$questions;
    }

}
