<?php

namespace App\Helpers;

class Latihan_2
{
    static public $question = [
        [
            "question" => "Setiap pagi matahari terlihat terbit di timur dan tenggelam di barat. Hal ini terjadi karena Bumi berputar pada porosnya dari barat ke timur. Selain itu, rotasi Bumi juga menyebabkan perbedaan waktu di berbagai daerah. Berdasarkan penjelasan tersebut, manakah yang merupakan dampak dari rotasi Bumi?",
            "choice" => [
                "A" => "Terjadinya musim hujan dan kemarau",
                "B" => "Perbedaan waktu antara daerah di Indonesia",
                "C" => "Terjadinya gerhana matahari",
                "D" => "Perubahan bentuk bulan setiap malam",
            ],
            "answer" => "B"
        ],
        [
            "question" => "Setiap tahun, negara-negara yang berada jauh dari garis khatulistiwa mengalami empat musim: semi, panas, gugur, dan dingin. Musim-musim ini terjadi karena Bumi bergerak mengelilingi Matahari dan sumbu Bumi miring. Apa dampak dari revolusi Bumi yang paling terlihat?",
            "choice" => [
                "A" => "Terjadinya siang dan malam secara bergantian",
                "B" => "Perbedaan suhu antara siang dan malam",
                "C" => "Pergantian musim sepanjang tahun",
                "D" => "Perubahan bentuk Bumi",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Indonesia memiliki tiga zona waktu, yaitu WIB, WITA, dan WIT. Ketiganya menunjukkan waktu yang berbeda meskipun masih dalam satu negara. Hal ini disebabkan oleh letak wilayah yang berbeda secara geografis. Apa penyebab utama perbedaan zona waktu di Indonesia?",
            "choice" => [
                "A" => "Karena revolusi Bumi membuat musim berubah",
                "B" => "Karena Indonesia memiliki banyak pulau",
                "C" => "Karena rotasi Bumi membuat matahari terlihat di tempat berbeda setiap waktu",
                "D" => "Karena bentuk Bumi yang bulat",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Jika suatu hari sumbu Bumi menjadi tegak lurus (tidak miring), maka sinar matahari akan mengenai semua tempat dengan sudut yang sama sepanjang tahun. Apa yang kemungkinan akan terjadi jika hal itu benar-benar terjadi?",
            "choice" => [
                "A" => "Musim akan tetap berganti seperti sekarang",
                "B" => "Musim tidak akan berganti dan cuaca menjadi sama sepanjang tahun",
                "C" => "Siang dan malam menjadi lebih panjang",
                "D" => "Bumi tidak lagi berotasi",
            ],
            "answer" => "B"
        ],
        [
            "question" => "Bayangkan Bumi berhenti berputar pada porosnya. Artinya, satu sisi Bumi akan terus menghadap matahari dan sisi lainnya tidak. Apa akibat yang paling mungkin terjadi pada manusia jika Bumi tidak berotasi?",
            "choice" => [
                "A" => "Tidak akan ada musim hujan dan kemarau",
                "B" => "Semua tempat akan terasa panas sepanjang waktu",
                "C" => "Satu sisi Bumi akan selalu siang, dan sisi lainnya akan selalu malam",
                "D" => "Matahari tidak akan terlihat dari Bumi",
            ],
            "answer" => "C"
        ],
    ];


    static public function getQuestion()
    {
        return self::$question;
    }

}
