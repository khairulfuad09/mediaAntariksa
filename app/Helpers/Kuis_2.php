<?php

namespace App\Helpers;

class Kuis_2
{
    public static $questions = [
        [
            "question" => "Tahukah kamu? Siang dan malam bisa terjadi karena Bumi berputar. Kalau Bumi tidak berputar, apa yang bisa terjadi?",
            "choice" => [
                "A" => "Siang dan malam tetap ada",
                "B" => "Matahari tidak bersinar",
                "C" => "Hanya ada siang terus atau malam terus",
                "D" => "Awan jadi tidak bergerak",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Kamu melihat bayangan pohon berubah posisi sepanjang hari. Itu terjadi karena…",
            "choice" => [
                "A" => "Awan menutupi matahari",
                "B" => "Bulan bergerak",
                "C" => "Bumi berputar",
                "D" => "Angin bertiup kencang",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Di Indonesia bagian timur seperti Papua, matahari terbit lebih dulu. Kenapa begitu?",
            "choice" => [
                "A" => "Karena lebih dekat ke matahari",
                "B" => "Karena lebih panas",
                "C" => "Karena Bumi berputar dari barat ke timur",
                "D" => "Karena lebih banyak gunung",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Kalau kamu menelepon temanmu di negara lain dan dia bilang “masih malam di sini”, itu bisa terjadi karena…",
            "choice" => [
                "A" => "Bulan terlalu terang",
                "B" => "Negara itu hujan",
                "C" => "Bumi sedang diam",
                "D" => "Perbedaan waktu karena rotasi Bumi",
            ],
            "answer" => "D"
        ],
        [
            "question" => "Untuk menunjukkan siang dan malam, kamu bisa pakai…",
            "choice" => [
                "A" => "Kipas angin dan lilin",
                "B" => "Bola dan senter",
                "C" => "Payung dan batu",
                "D" => "Buku dan penggaris",
            ],
            "answer" => "B"
        ]
    ];

    public static function getQuestion()
    {
        return self::$questions;
    }
}
