<?php

namespace App\Helpers;

class Latihan_3
{
    static public $question = [
        [
            "question" => "Jika Bumi tidak melakukan rotasi, maka yang paling mungkin terjadi adalah ...",
            "choice" => [
                "A" => "Bumi tidak lagi memiliki satelit",
                "B" => "Suhu Bumi menjadi stabil",
                "C" => "Tidak terjadi pergantian siang dan malam",
                "D" => "Bulan tidak terlihat dari Bumi",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Bulan memiliki waktu rotasi dan revolusi yang sama, yaitu 27 hari. Apa akibat dari hal ini bagi kita di Bumi?",
            "choice" => [
                "A" => "Bulan tidak pernah terlihat di malam hari",
                "B" => "Kita hanya melihat satu sisi Bulan saja",
                "C" => "Bulan memancarkan cahaya sendiri",
                "D" => "Permukaan Bulan terus berubah-ubah",
            ],
            "answer" => "B"
        ],
        [
            "question" => "Jika jarak antara Bumi dan Matahari bertambah jauh, kemungkinan besar yang akan terjadi adalah ...",
            "choice" => [
                "A" => "Terjadi siang terus-menerus",
                "B" => "Suhu Bumi akan meningkat drastic",
                "C" => "Revolusi Bumi menjadi lebih cepat",
                "D" => "Suhu Bumi menjadi lebih dingin",
            ],
            "answer" => "D"
        ],
        [
            "question" => "Mengapa planet-planet tidak jatuh ke Matahari meskipun memiliki gaya tarik gravitasi?",
            "choice" => [
                "A" => "Karena planet memantulkan cahaya",
                "B" => "Karena planet memiliki orbit dan kecepatan tertentu",
                "C" => "Karena Matahari tidak memiliki gravitasi",
                "D" => "Karena planet lebih berat dari Matahari",
            ],
            "answer" => "B"
        ],
        [
            "question" => "Jika tidak ada cahaya Matahari, apa yang paling mungkin terjadi pada kehidupan di Bumi?",
            "choice" => [
                "A" => "Tanaman akan tumbuh lebih cepat",
                "B" => "Hewan akan menjadi lebih banyak",
                "C" => "Tidak terjadi perubahan cuaca",
                "D" => "Tidak ada fotosintesis sehingga makhluk hidup kesulitan bertahan hidup",
            ],
            "answer" => "D"
        ],
    ];


    static public function getQuestion()
    {
        return self::$question;
    }

}
