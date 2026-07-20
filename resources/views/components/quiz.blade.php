<div class="container">
    <form id="quizForm">
        @csrf
        @foreach ($questions as $index => $question)
            <div class="card mb-3">
                <div class="card-header">
                    <span class="me-2" id="index-{{ $index + 1 }}"></span></i><strong>Pertanyaan
                        {{ $index + 1 }}:</strong> {{ $question['text'] }}
                    @if (isset($question['image']))
                        <div class="mt-2">
                            <img src="{{ asset($question['image']) }}" alt="Gambar Pertanyaan" class="img-fluid">
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    @if ($question['type'] == 'single')
                        @foreach ($question['options'] as $optionIndex => $option)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="answer{{ $index }}"
                                    id="question{{ $index }}option{{ $optionIndex }}"
                                    value="{{ $optionIndex }}">
                                <label class="form-check-label"
                                    for="question{{ $index }}option{{ $optionIndex }}">
                                    @if (is_array($option))
                                        {{ $option['text'] }}
                                        @if (isset($option['image']))
                                            <div class="mt-2">
                                                <img src="{{ asset($option['image']) }}" alt="Gambar Jawaban"
                                                    class="img-fluid">
                                            </div>
                                        @endif
                                    @else
                                        {{ $option }}
                                    @endif
                                </label>
                            </div>
                        @endforeach
                    @elseif($question['type'] == 'multiple')
                        @foreach ($question['options'] as $optionIndex => $option)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="answer{{ $index }}[]"
                                    id="question{{ $index }}option{{ $optionIndex }}"
                                    value="{{ $optionIndex }}">
                                <label class="form-check-label"
                                    for="question{{ $index }}option{{ $optionIndex }}">
                                    @if (is_array($option))
                                        {{ $option['text'] }}
                                        @if (isset($option['image']))
                                            <div class="mt-2">
                                                <img src="{{ asset($option['image']) }}" alt="Gambar Jawaban"
                                                    class="img-fluid">
                                            </div>
                                        @endif
                                    @else
                                        {{ $option }}
                                    @endif
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
        <button type="button" class="btn btn-primary" id="checkAnswers">Periksa</button>
        <button type="reset" class="btn btn-secondary" id="resetAnswers">Reset Jawaban</button>
    </form>
</div>

<!-- Tambahkan SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const questions = @json($questions);
    let allCorrect = true;
    let messages = [];
    const point = {{ $point }}
    const title = `{{ $title }}`
    const materi = `{{ $materi }}`

    let correctAnswer = 0;

    document.getElementById('checkAnswers').addEventListener('click', function() {
        correctAnswer = 0;

        questions.forEach((question, index) => {
            const userAnswers = [];

            if (question.type === 'single') {
                const selected = document.querySelector('input[name="answer' + index + '"]:checked');
                if (selected) {
                    userAnswers.push(parseInt(selected.value));
                }
            } else if (question.type === 'multiple') {
                const selected = document.querySelectorAll('input[name="answer' + index +
                    '[]"]:checked');
                selected.forEach((checkbox) => {
                    userAnswers.push(parseInt(checkbox.value));
                });
            }

            // Cek jawaban
            const correctAnswers = question.correctAnswers;
            userAnswers.sort();
            correctAnswers.sort();

            const isCorrect = JSON.stringify(userAnswers) === JSON.stringify(correctAnswers);
            if (!isCorrect) {
                allCorrect = false;

                document.getElementById(`index-${index+1}`).innerHTML =
                    '<i class="text-danger fa-solid fa-xmark"></i>'
            } else {
                document.getElementById(`index-${index+1}`).innerHTML =
                    '<i class="text-success fa-regular fa-circle-check"></i>'
                correctAnswer += 1;
            }
        });

        let pointQuiz = correctAnswer * 100 / questions.length;

        if (allCorrect) {
            Swal.fire({
                icon: 'success',
                title: 'Selamat! Semua jawaban Anda benar. ',
                text: 'Anda Mendapatkan ' + pointQuiz + " point",
            });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Jawabannya belum benar semua nih!',
                html: "Kamu mendapatkan " + pointQuiz + " point"
            });
        }
        setProgress(materi, title, pointQuiz)
    });
    document.getElementById('resetAnswers').addEventListener('click', function() {
        document.getElementById('quizForm').reset();
        questions.forEach((question, index) => {
            document.getElementById(`index-${index+1}`).innerHTML =
                ''
        });
    });
</script>
