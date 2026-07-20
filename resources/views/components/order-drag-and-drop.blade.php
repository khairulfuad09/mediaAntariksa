<!-- resources/views/components/drag-drop-ordering.blade.php -->
<div class="container my-5">
    <h2 class="text-center mb-4"></h2>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Instruksi</h4>
        <p>{{ $instruction }}</p>
        <hr>
        <p class="mb-0">Poin didapat kan (100)</p>
    </div>
    <div class="row">
        <!-- Daftar Item untuk Diurutkan -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Item</h5>
                </div>
                <div class="card-body" id="sortable-list">
                    @foreach ($items as $item)
                        <div class="list-group-item d-flex align-items-center mb-2 p-2 bg-light border rounded"
                            draggable="true" data-name="{{ $item['name'] }}">
                            @if (isset($item['image']))
                                <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                    class="me-2" style="width: 50px;">
                            @endif
                            <span>{{ $item['name'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Urutan yang Diberikan -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Urutan Anda</h5>
                </div>
                <div class="card-body" id="user-order">
                    <!-- Placeholder text when empty -->
                    <div id="drop-zone-placeholder" class="text-center py-5 border-3 border-dashed rounded"
                        style="border-color: #6c757d;">
                        <i class="bi bi-arrow-down-circle fs-1 text-muted"></i>
                        <p class="mt-2 text-muted">Tarik item kesini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol -->
    <div class="text-center mt-4">
        <button class="btn btn-success me-2 check-btn">Periksa</button>
        <button class="btn btn-danger reset-btn">Reset</button>
    </div>

    <!-- JavaScript untuk Drag and Drop dan Validasi -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sortableList = document.getElementById('sortable-list');
            const userOrder = document.getElementById('user-order');
            const checkBtn = document.querySelector('.check-btn');
            const resetBtn = document.querySelector('.reset-btn');
            const dropZonePlaceholder = document.getElementById('drop-zone-placeholder');

            const correctOrder = @json($correctOrder);

            let point = {{ $point }};
            let title = `{{ $title }}`;
            let materi = `{{ $materi }}`;

            // Inisialisasi Sortable untuk dua container
            let userAnswers = [];

            function updateDropZone() {
                if (userOrder.querySelectorAll('.list-group-item').length > 0) {
                    dropZonePlaceholder.style.display = 'none';
                    userOrder.classList.remove('border-dashed');
                    userOrder.classList.add('border-solid');
                } else {
                    dropZonePlaceholder.style.display = 'block';
                    userOrder.classList.add('border-dashed');
                    userOrder.classList.remove('border-solid');
                }
            }

            // Sortable untuk item list kiri (source)
            Sortable.create(sortableList, {
                group: {
                    name: 'shared',
                    put: ['userOrder'], // Bisa masuk ke list kiri dari kanan (userOrder)
                    pull: 'clone' // biar itemnya bisa disalin, tapi kita nanti custom
                },
                animation: 150,
                sort: false, // supaya user gak bisa reorder di list kiri
                onAdd: function(evt) {
                    // Kalau item dipindah balik ke list kiri, hapus dari userOrder
                    // Tapi kita pakai 'clone' jadi gak perlu hapus, ini untuk safety
                    updateDropZone();
                }
            });

            // Sortable untuk urutan user di kanan (target)
            Sortable.create(userOrder, {
                group: {
                    name: 'shared',
                    put: true,
                    pull: true
                },
                animation: 150,
                onAdd: function(evt) {
                    // Hapus elemen clone asli dari list kiri agar item 'dipindah', bukan disalin
                    const item = evt.item;
                    const itemName = item.getAttribute('data-name');

                    // Remove original dari list kiri (kecuali kalau itu clone)
                    const original = sortableList.querySelector(`[data-name="${itemName}"]`);
                    if (original) {
                        original.remove();
                    }

                    updateUserAnswers();
                    updateDropZone();
                },
                onRemove: function(evt) {
                    updateUserAnswers();
                    updateDropZone();
                },
                onUpdate: function(evt) {
                    updateUserAnswers();
                }
            });

            // Update userAnswers dari urutan DOM di userOrder
            function updateUserAnswers() {
                userAnswers = Array.from(userOrder.querySelectorAll('.list-group-item')).map(el => el.getAttribute(
                    'data-name'));
            }

            // Tombol Periksa Jawaban
            checkBtn.addEventListener('click', () => {
                updateUserAnswers();

                const userOrderItems = userAnswers;
                let score = 0;
                const totalItems = correctOrder.length;
                let isCorrect = true;
                for (let i = 0; i < correctOrder.length; i++) {
                    if (userOrderItems[i] === correctOrder[i]) {
                        score += 1;
                    } else {
                        isCorrect = false;
                    }
                }

                const point = Math.round((score / totalItems) * 100);
                console.log(userOrderItems, score, totalItems, isCorrect, point);
                setProgress(materi, title, point);

                if (isCorrect && userOrderItems.length === correctOrder.length) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Benar!',
                        text: 'Urutan Anda benar!, anda mendapatkan ' + point + " Poin"
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Salah!',
                        text: 'Urutan Anda salah. Silakan coba lagi! anda mendapatkan ' + point +
                            " Poin"
                    });
                }
            });

            // Tombol Reset
            resetBtn.addEventListener('click', () => {
                // Reset userOrder ke kosong, dan pindahkan semua item ke sortableList
                userOrder.querySelectorAll('.list-group-item').forEach(item => {
                    userOrder.removeChild(item);
                    sortableList.appendChild(item);
                });
                userAnswers = [];
                updateDropZone();
            });

            // Init UI
            updateDropZone();
        });
    </script>

    <style>
        .border-dashed {
            border-style: dashed !important;
        }

        .border-solid {
            border-style: solid !important;
        }

        #user-order {
            min-height: 200px;
            transition: all 0.3s ease;
        }

        #drop-zone-placeholder {
            transition: all 0.3s ease;
        }
    </style>
</div>
