<?php

namespace App\Helpers;

class Latihan_1
{
    static public $question = [
        [
            "question" => "Bayu melihat bulan terlihat bulat sempurna di langit malam. Keesokan harinya, air laut
                            di pantai dekat rumahnya naik sangat tinggi. Menurut kamu, apa hubungan antara
                            bentuk bulan dan air laut itu?   ",
            "choice" => [
                "A" => "Bulan yang bulat membuat angin bertiup lebih kencang",
                "B" => "Bulan purnama menyebabkan pasang laut yang tinggi ",
                "C" => "Bulan bulat membuat suhu udara menjadi panas",
                "D" => "Bulan berpengaruh pada terbitnya matahari ",
            ],
            "answer" => "B"
        ],
        [
            "question" => "Bayangkan jika Bumi tidak berputar pada porosnya. Apa yang kemungkinan akan terjadi pada siang dan malam? ",
            "choice" => [
                "A" => "Siang dan malam tetap bergantian setiap hari",
                "B" => "Tidak ada siang maupun malam",
                "C" => "Sebagian Bumi selalu siang dan sebagian lagi selalu malam",
                "D" => "Semua bagian Bumi menjadi malam terus-menerus ",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Lani memperhatikan bahwa bayangan pohon di halaman rumahnya berbeda panjang saat pagi dan siang hari. Apa penyebab perbedaan bayangan itu menurut kamu?",
            "choice" => [
                "A" => "Bumi mengelilingi Matahari ",
                "B" => "Bulan menutupi cahaya Matahari",
                "C" => "Bumi berputar sehingga posisi Matahari berubah di langit",
                "D" => " Pohon berubah arah mengikuti cahaya",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Jika Bulan tidak pernah bergerak mengelilingi Bumi, apa akibatnya terhadap penampakan Bulan dari Bumi? ",
            "choice" => [
                "A" => "Kita bisa melihat Bulan hanya saat siang hari ",
                "B" => "Bulan akan terlihat terus-menerus purnama",
                "C" => "Bentuk Bulan tidak akan berubah setiap malam",
                "D" => "Bulan akan menjadi lebih dekat ke Matahari",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Setiap pagi, Matahari tampak terbit dari arah timur. Namun sebenarnya, yang bergerak bukanlah Matahari. Apa yang sebenarnya terjadi?",
            "choice" => [
                "A" => "Matahari bergerak mengelilingi Bumi",
                "B" => "Bumi berputar dari barat ke timur ",
                "C" => "Bumi berputar dari timur ke barat",
                "D" => "Bulan menutupi cahaya Matahari",
            ],
            "answer" => "C"
        ],
    ];

    static public function getQuestion()
    {
        return self::$question;
    }

}
