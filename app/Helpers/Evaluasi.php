<?php

namespace App\Helpers;

class Evaluasi
{
    public static $questions = [
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
        ],

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

        [
            "question" => "Tahukah kamu? Di negara-negara empat musim seperti Jepang, tanaman apel hanya bisa tumbuh subur pada musim tertentu. Hal ini berkaitan dengan revolusi Bumi. \n\nMengapa tanaman apel tidak bisa tumbuh di Indonesia yang hanya memiliki dua musim?",
            "choice" => [
                "A" => "Karena revolusi Bumi tidak terjadi di Indonesia",
                "B" => "Karena Indonesia tidak memiliki musim dingin akibat letaknya di garis khatulistiwa",
                "C" => "Karena Indonesia terlalu panas sepanjang tahun",
                "D" => "Karena Bumi tidak berputar di wilayah tropis",
            ],
            "answer" => "B"
        ],
        [
            "question" => "Budi memperhatikan bahwa siang hari menjadi lebih lama daripada malam hari di bulan Juni. Ia penasaran mengapa hal itu bisa terjadi. \n\nApa penjelasan yang paling tepat berdasarkan dampak revolusi Bumi?",
            "choice" => [
                "A" => "Karena Bumi berotasi lebih cepat",
                "B" => "Karena matahari lebih dekat ke Bumi",
                "C" => "Karena Bumi sedang condong ke arah utara yang mengalami musim panas",
                "D" => "Karena bulan memantulkan cahaya lebih banyak",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Bayangkan jika Bumi tidak memiliki kemiringan sumbu. \n\nApa yang mungkin akan terjadi pada musim di Bumi?",
            "choice" => [
                "A" => "Musim akan menjadi lebih banyak",
                "B" => "Tidak akan ada perubahan musim seperti sekarang",
                "C" => "Suhu Bumi menjadi sangat panas",
                "D" => "Siang dan malam akan selalu sama panjang",
            ],
            "answer" => "B"
        ],
        [
            "question" => "Jika kamu tinggal di Australia dan mengalami musim dingin, pada saat yang sama temanmu di Jepang sedang menikmati musim panas. \n\nApa kesimpulan logis dari perbedaan musim tersebut?",
            "choice" => [
                "A" => "Matahari hanya menyinari bagian utara Bumi",
                "B" => "Sumbu Bumi tegak lurus terhadap Matahari",
                "C" => "Revolusi Bumi menyebabkan belahan Bumi utara dan selatan menerima sinar Matahari berbeda-beda",
                "D" => "Orbit Bumi berbentuk lingkaran sempurna",
            ],
            "answer" => "C"
        ],
        [
            "question" => "Amira membaca di buku bahwa revolusi Bumi menyebabkan rasi bintang yang terlihat di langit malam berubah setiap bulan. \n\nMengapa hal ini bisa terjadi?",
            "choice" => [
                "A" => "Karena Matahari berputar mengelilingi Bumi",
                "B" => "Karena posisi Bumi terhadap bintang berubah selama revolusi",
                "C" => "Karena bintang-bintang bergerak mengikuti arah Bumi",
                "D" => "Karena langit selalu berubah bentuk setiap malam",
            ],
            "answer" => "B"
        ],

    ];


    static public function getQuestion()
    {
        return self::$questions;
    }

}
