<!-- resources/views/components/hotspot-quiz.blade.php -->
@php
    // Validasi input jika diperlukan
    if (!isset($image) || !isset($hotspots) || !isset($correctAnswers)) {
        throw new Exception("HotspotQuiz component requires 'image', 'hotspots', and 'correctAnswers' props.");
    }
@endphp

<div class="row">
    <div class="col-md-6 my-auto">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Instruksi</h4>
            <p>{{ $instruction }}</p>
            <hr>
            <p class="mb-0">Poin didapat kan ({{ $point }})</p>
        </div>
        <p class="h6">{{ $pertanyaan }}</p>
        <button id="{{ $quizid }}-check-button" class="btn btn-primary mt-3">Periksa Jawaban</button>
    </div>
    <div class="col-md-6">

        <div class="hotspot-quiz-container position-relative d-inline-block">
            <img src="{{ asset($image) }}" id="{{ $quizid }}-image" class="img-fluid" />

            @foreach ($hotspots as $index => $hotspot)
                <div class="hotspot position-absolute" data-name="{{ $hotspot['name'] }}"
                    style="
                        top: {{ $hotspot['top'] }}%;
                        left: {{ $hotspot['left'] }}%;
                        width: {{ $hotspot['width'] }}%;
                        height: {{ $hotspot['height'] }}%;
                        cursor: pointer;
                        background-color: rgba(0, 123, 255, 0.3); /* Bootstrap primary color with transparency */
                        border: 2px solid transparent;
                        border-radius: 4px;
                        transition: border 0.3s;
                    "
                    title="{{ $hotspot['name'] }}"></div>
            @endforeach
        </div>
        <br>
    </div>

</div>


<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        (function() {
            const quizId = "{{ $quizid }}";
            const hotspots = document.querySelectorAll(`#${quizId}-image ~ .hotspot`);
            const selectedHotspots = new Set();
            const checkButton = document.getElementById(`${quizId}-check-button`);

            const point = {{ $point }}
            const title = `{{ $title }}`
            const materi = `{{ $materi }}`

            const correctAnswers = @json($correctAnswers);


            hotspots.forEach(hotspot => {
                hotspot.addEventListener('click', function() {
                    const name = this.getAttribute('data-name');
                    if (selectedHotspots.has(name)) {
                        selectedHotspots.delete(name);
                        this.style.border = '2px solid transparent';
                    } else {
                        selectedHotspots.add(name);
                        this.style.border = '2px solid red';
                    }
                });
            });

            checkButton.addEventListener('click', function() {
                const userAnswers = Array.from(selectedHotspots);

                // Count the number of correct answers
                const correctSelected = userAnswers.filter(answer => correctAnswers.includes(
                        answer))
                    .length;
                const wrongSelected = userAnswers.filter(answer => !correctAnswers.includes(answer))
                    .length;

                // Count the total selected answers
                const totalSelected = userAnswers.length;

                const totalCorrectRequired = correctAnswers.length;

                // Calculate points based on the number of correct answers relative to total selected answers

                // Check if the user's answers are exactly the same as the correct answers
                const isCorrect = (
                    totalSelected === correctAnswers.length &&
                    userAnswers.every(answer => correctAnswers.includes(answer))
                );

                function calculateScore(correctSelected, wrongSelected, totalCorrectRequired, ) {
                    // Bobot per jawaban benar
                    const pointPerCorrect = 100 / totalCorrectRequired;

                    // Penalty per jawaban salah (setengah dari nilai jawaban benar)
                    const penaltyPerWrong = pointPerCorrect / 2;

                    // Hitung skor
                    let score = (correctSelected * pointPerCorrect) - (wrongSelected *
                        penaltyPerWrong);

                    // Pastikan skor tidak negatif dan tidak lebih dari 100
                    return Math.max(0, Math.min(100, score));
                }


                const pointQuiz = Math.round(calculateScore(correctSelected, wrongSelected,
                    totalCorrectRequired));
                console.log(correctSelected, wrongSelected, userAnswers, pointQuiz);

                setProgress(materi, title, pointQuiz);

                if (isCorrect) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Benar!',
                        text: 'Anda telah memilih semua jawaban yang benar. Anda mendapatkan ' +
                            pointQuiz + " Poin",
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Salah!',
                        text: 'Masih ada jawaban yang salah nih, anda mendapatkan ' +
                            pointQuiz + " Poin",
                        confirmButtonText: 'Coba Lagi'
                    });
                }
            });
        })();
    });
</script>
