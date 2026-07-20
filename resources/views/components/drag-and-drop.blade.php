<!-- resources/views/components/drag-drop-categorization.blade.php -->
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check-circle-fill" viewBox="0 0 16 16">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" viewBox="0 0 16 16">
        <path
            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>
<style>
    .drop-zone {
        border: 2px dashed #999;
        border-radius: 6px;
        position: relative;
        min-height: 150px;
        transition: border-color 0.3s ease;
        /* supaya hint bisa posisinya pas */
        display: flex;
        flex-wrap: wrap;
        align-items: start;
        padding: 0.5rem;
    }

    .drop-zone.dragover {
        border-color: #007bff;
        /* highlight saat dragover */
        background-color: #e9f5ff;
    }

    .drop-hint {
        font-size: 0.9rem;
        color: #999;
        user-select: none;
        pointer-events: none;
        width: 100%;
        text-align: center;
        padding: 1rem 0;
        border: 2px dashed #ccc;
        border-radius: 6px;
        margin-bottom: 0.5rem;
    }

    /* sembunyikan hint kalau sudah ada item di drop zone */
    .drop-zone:not(:empty) .drop-hint {
        display: none;
    }
</style>

<div class="card card-body my-1">
    <h2 class="text-center mb-4">Mengkategorikan</h2>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Instruksi</h4>
        <p>{{ $instruction }}</p>
        <hr>
        <p class="mb-0">Poin didapat kan (100)</p>
    </div>
    <div class="row">
        <!-- Daftar Item -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Item</h5>
                </div>
                <div class="card-body" id="items-container">
                    @foreach ($items as $item)
                        <div class="item d-flex align-items-center mb-2 p-2 bg-light border rounded" draggable="true"
                            data-name="{{ $item['name'] }}">
                            <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['img'] }}" class="me-2"
                                style="min-height:500px;width: 50px;">
                            <span>{{ $item['name'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Kategori -->
        <div class="col-md-6">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-12 mb-4">
                        <div class="card h-100 category" data-category="{{ $category['key'] }}"
                            style="min-height: 500px;">
                            <div class="card-header bg-secondary text-white text-center">
                                <h5 class="mb-0">{{ $category['label'] }}</h5>
                            </div>
                            <div class="card-body drop-zone d-flex flex-wrap align-items-start"
                                style="min-height: 150px;">
                                <div class="drop-hint">Tarik atau seret item ke sini</div>
                                <!-- Item yang diseret akan ditempatkan di sini -->
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Tombol -->
    <div class="text-center mt-4">
        <button class="btn btn-success me-2 check-btn">Periksa</button>
        <button class="btn btn-danger reset-btn">Reset</button>
    </div>

    <!-- JavaScript untuk Drag and Drop -->


</div>

@push('scripts')
    <script>
        // Array untuk pesan jawaban benar
        // Pesan jawaban benar
        const correctMessages = [
            "Luar biasa! Kamu di jalur yang benar!",
            "Hebat! Teruskan usaha kerasmu!",
            "Bagus sekali! Semangat terus!",
            "Sempurna! Pemahamanmu semakin dalam!",
            "Keren! Terus berkembang!"
        ];

        // Pesan jawaban salah
        const incorrectMessages = [
            "Tidak masalah! Kesalahan adalah guru terbaik!",
            "Hampir! Perbaiki sedikit lagi!",
            "Coba lagi, kamu pasti bisa!",
            "Belajar dari kesalahan, kamu semakin dekat!",
            "Setiap langkah membawa kamu lebih dekat ke tujuan!"
        ];

        document.addEventListener('DOMContentLoaded', () => {
            const items = document.querySelectorAll('.item');
            const categories = document.querySelectorAll('.drop-zone');
            const checkBtn = document.querySelector('.check-btn');
            const resetBtn = document.querySelector('.reset-btn');
            const title = `{{ $title }}`
            const materi = `{{ $materi }}`

            // Parsing soal dan jawaban dari PHP ke JavaScript
            const correctAnswers = @json(collect($items)->pluck('category', 'name')->toArray());
            console.log(correctAnswers)
            let userAnswers = {};

            items.forEach(item => {
                item.addEventListener('dragstart', dragStart);
            });

            categories.forEach(category => {
                category.addEventListener('dragover', dragOver);
                category.addEventListener('drop', drop);
                category.addEventListener('dragenter', dragEnter);
                category.addEventListener('dragleave', dragLeave);
            });

            function dragStart(e) {
                e.dataTransfer.setData('text/plain', e.target.getAttribute('data-name'));
                setTimeout(() => {
                    e.target.classList.add('opacity-50');
                }, 0);
            }

            function dragOver(e) {
                e.preventDefault();
            }

            function drop(e) {
                e.preventDefault();
                const name = e.dataTransfer.getData('text/plain');
                const category = e.currentTarget.parentElement.getAttribute('data-category');

                const item = document.querySelector(`.item[data-name="${name}"]`);
                if (item) {
                    item.classList.remove('opacity-50');
                    e.currentTarget.appendChild(item);
                    userAnswers[name] = category;

                    // sembunyikan hint karena ada item
                    const hint = e.currentTarget.querySelector('.drop-hint');
                    if (hint) hint.style.display = 'none';
                }
                e.currentTarget.classList.remove('bg-info');
            }

            function dragEnter(e) {
                e.preventDefault();
                e.preventDefault();
                const dropZone = e.currentTarget;
                dropZone.parentElement.classList.add('bg-info', 'bg-opacity-25');
                // sembunyikan hint saat drag enter
                const hint = dropZone.querySelector('.drop-hint');
                if (hint) hint.style.display = 'none';

            }

            function dragLeave(e) {
                const dropZone = e.currentTarget;
                dropZone.parentElement.classList.remove('bg-info', 'bg-opacity-25');
                // tampilkan hint kalau drop zone kosong
                const hint = dropZone.querySelector('.drop-hint');
                if (hint && dropZone.children.length === 1) { // hanya hint doang
                    hint.style.display = 'block';
                }
            }

            checkBtn.addEventListener('click', () => {
                let score = 0;
                const total = Object.keys(correctAnswers).length;


                Object.keys(correctAnswers).forEach(name => {
                    console.log(userAnswers[name], correctAnswers[name])
                    if (userAnswers[name] === correctAnswers[name]) {
                        score++;
                    }
                });


                let point = score / total * 100;

                if (score === total) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Benar!',
                        text: `${getMotivationalMessage(true)} Anda mendapatkan ${point} Point`,
                    });


                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Salah!',
                        text: `${getMotivationalMessage(false)} Anda mendapatkan ${point} Point`,
                        footer: `Anda menjawab benar ${score} dari ${total} item`,
                        confirmButtonText: `
                        <i class="fa fa-thumbs-up"></i> Coba lagi!
                        `,
                    });
                }
                setProgress(materi, title, point)
            });

            resetBtn.addEventListener('click', () => {
                // Pindahkan semua item kembali ke daftar awal
                const itemsContainer = document.getElementById('items-container');
                const allItems = document.querySelectorAll('.drop-zone .item');
                allItems.forEach(item => {
                    itemsContainer.appendChild(item);
                });
                userAnswers = {};
            });

            function getMotivationalMessage(isCorrect) {
                let message;

                if (isCorrect) {
                    // Pilih pesan jawaban benar secara acak
                    const randomIndex = Math.floor(Math.random() * correctMessages.length);
                    message = correctMessages[randomIndex];
                } else {
                    // Pilih pesan jawaban salah secara acak
                    const randomIndex = Math.floor(Math.random() * incorrectMessages.length);
                    message = incorrectMessages[randomIndex];
                }

                return message;
            }
        });
    </script>
@endpush
