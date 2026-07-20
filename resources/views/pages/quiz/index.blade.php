<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet">
    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <nav class="navbar text-white sticky-top bg-primary">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <h4>Kuis {{ $title }}</h4>
            </a>
            <div class="d-flex align-items-stretch justify-content-start ">
                <h2 class="m-0"><span class="badge text-bg-warning me-3" id="waktu-durasi">12 : 90</span></h2>
                <button id="stop_test" class="btn btn-danger  rounded-2"><i class="bi bi-stop-circle-fill"></i> Hentikan
                    Kuis</button>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-3">
            <h1 class="float-end mb-5">Pertanyaan Kuis</h1>

            <div class="col-md-9">
                @php
                    $no = 1;
                    $label = ['A', 'C', 'B', 'D'];
                @endphp
                @foreach ($soalQuiz as $key => $value)
                    <div class="section d-none" id="section-{{ $no }}">
                        <div class="card mb-2">
                            <h5 class="card-header">Soal {{ $no }}</h5>
                            <div class="card-body">
                                <p style="font-size:20px;">{!! $value['question'] !!}</p>
                            </div>
                            <div class="card-footer bg-white p-4">
                                <h5 class="mb-3">Pilihan Jawaban</h5>
                                <div class="row">
                                    @foreach ($value['choice'] as $option => $key)
                                        <div class="col-md-6 d-flex justify-content-start mb-2 align-items-baseline">
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" id="{{ $no . '-' . $option }}"
                                                    name="{{ $no }}" autocomplete="off"
                                                    value="{{ $option }}">
                                                <label class="btn btn-outline-primary"
                                                    for="{{ $no . '-' . $option }}">{{ $option }}</label><br>
                                            </div>
                                            <label class="ms-3"
                                                for="{{ $no . '-' . $option }}">{!! $key !!}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @php
                            $no++;
                        @endphp
                    </div>
                @endforeach
            </div>
            <div class="col-md-3">
                <div class="card  card-body rounded-0">
                    <h4 class="mx-2 mb-2">Soal <span id="pages-show">1</span> / {{ count($soalQuiz) }}</h4>
                    <div class="m-auto d-flex justify-content-center align-items-center flex-wrap">

                        @php $no = 1; @endphp
                        @for ($i = 0; $i < count($soalQuiz); $i++)
                            @if ($i > 8)
                                <button class="btn btn-outline-primary m-2 btn-nav rounded-0 position-relative"
                                    id="num-{{ $no }}">{{ $no }}
                                    <span id="let-{{ $no++ }}"
                                        class="d-none position-absolute top-0 start-100 translate-middle badge rounded-2 bg-success">
                                        A </span>
                                </button>
                            @else
                                <button class="btn btn-outline-primary m-2 btn-nav rounded-0 position-relative"
                                    id="num-{{ $no }}">0{{ $no }}
                                    <span id="let-{{ $no++ }}"
                                        class="d-none position-absolute top-0 start-100 translate-middle badge rounded-2 bg-success">
                                        A </span>
                                </button>
                            @endif
                        @endfor
                    </div>
                </div>
                <div class="m-auto d-flex justify-content-between align-items-center mt-2">
                    <button class="btn btn-primary me-1 rounded-0" id="prev" onclick="prevButton()"><i
                            class='bx bx-chevron-left me-2'></i> Sebelumnya</button>
                    <button class="btn btn-primary rounded-0" id="next" onclick="nextButton()"> Selanjutnya <i
                            class='bx bx-chevron-right ms-2'></i></button>
                </div>
                <div class="d-flex justify-content-center align-items-center flex-wrap mt-3">
                    <button class="btn btn-primary rounded-0 btn-block flex-fill" id="btn-submit">Selesai</button>
                </div>
            </div>



            <div class="modal fade" id="hasil-quiz" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hasil Kuis {{ $title }}</h5>
                        </div>
                        <div class="modal-body" id="modal-hasil">


                        </div>
                    </div>

                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.all.min.js"></script>

            <script>
                const materi = "{{ $materi }}"
                const durasiView = document.getElementById('waktu-durasi');
                const pagesShow = document.getElementById('pages-show');
                const quiz = @json($soalQuiz);
                const stopTest = document.getElementById('stop_test');

                const kkm = parseInt("{{ $kkm }}");

                const quizModal = new bootstrap.Modal(document.getElementById('hasil-quiz'));

                const total = quiz.length;
                let currentPage = 1;
                let benar = 0;
                let salah = 0;
                let tidak_dijawab = 0
                let nilai = 0
                let answer = [];
                let startTime = "{{ session('startTime') }}";
                let endTime = "{{ session('endtime') }}";
                let remainingDuration = (new Date(endTime) - new Date()) / 1000;
                console.log(remainingDuration)
                const submitBtn = document.getElementById('btn-submit');

                startTimer(remainingDuration, durasiView);

                stopTest.addEventListener("click", () => {
                    swal.fire({
                        title: "Apakah anda yakin menghentikan Ujian?",
                        text: "Ujian akan dihentikan!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, Hentikan!",
                        cancelButtonText: "Tidak, Batalkan",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('quiz.prepare', $materi) }}"
                        }
                    });
                })

                function startTimer(duration, display) {
                    let timer = duration,
                        minutes, seconds;
                    setInterval(function() {
                        minutes = parseInt(timer / 60, 10);
                        seconds = parseInt(timer % 60, 10);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;

                        display.textContent = minutes + ":" + seconds;

                        if (--timer < 0) {
                            timer = duration;
                            submit();
                        }

                    }, 1000);
                }

                submitBtn.addEventListener('click', function() {
                    console.log(quiz.length, answer)
                    swal.fire({
                        title: "Apakah anda yakin?",
                        text: "Periksa kembali jawaban anda sebelum mengakhiri Kuis!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, selesai!",
                        cancelButtonText: "Tidak, kembali",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            submit();
                        }
                    });

                });


                const btnNav = document.querySelectorAll('.btn-nav');
                btnNav.forEach(btn => {
                    btn.addEventListener('click', function() {
                        currentPage = parseInt(this.innerHTML);
                        refreshPage();
                    });
                });

                const radioButtons = document.querySelectorAll('input[type="radio"]');
                radioButtons.forEach(radio => {
                    radio.addEventListener('change', function() {
                        answer[currentPage - 1] = this.value;

                        document.getElementById('let-' + currentPage).classList.remove('d-none');
                        document.getElementById('let-' + currentPage).innerHTML = this.value;
                    });
                });


                start();

                function start() {
                    refreshPage();
                }

                function nextButton() {
                    if (currentPage == total) {
                        return;
                    }
                    currentPage += 1;
                    refreshPage();
                }

                function prevButton() {
                    if (currentPage == 1) {
                        return;
                    }
                    currentPage -= 1;
                    refreshPage();
                }

                function submit() {
                    let submitTime = new Date();
                    let data = [];
                    benar = 0;
                    salah = 0;
                    nilai = 0
                    for (let i = 1; i <= quiz.length; i++) {
                        const answer = document.querySelector(`input[name="${i}"]:checked`);
                        if (answer) {
                            temp = {};
                            temp.question = i;
                            temp.answer = answer.value;
                            temp.benar = quiz[i - 1].answer == answer.value;
                            if (temp.benar) {
                                benar += 1;
                            } else {
                                salah += 1
                            }
                            data.push(temp);
                        } else {
                            tidak_dijawab += 1;
                        }
                    }

                    nilai = Math.floor((benar * 100) / quiz.length)
                    console.log(nilai, benar, salah, tidak_dijawab)
                    waktu_pengerjaan = Math.floor((submitTime - startTime) / 1000);
                    document.getElementById("modal-hasil").innerHTML = `
            <h1 id="hasil-quiz-nilai" class="text-center" style="font-size:80px;">${nilai}</h1>
            <table class="table text-center" >
                <thead>
                    <tr>
                        <th scope="col">Benar</th>
                        <th scope="col">Salah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="benar">${benar}</td>
                        <td id="salah">${salah}</td>
                    </tr>
                </tbody>
            </table>

        </div>
            `
                    if (nilai >= kkm) {
                        document.getElementById("hasil-quiz-nilai").classList.add("text-success")
                        document.getElementById("hasil-quiz-nilai").classList.remove("text-danger")
                        document.getElementById("modal-hasil").innerHTML += `
                    <div class="alert alert-success" role="alert">
                        <i class='bx bx-error me-2'></i><box-icon name='error'></box-icon> Selamat anda lulus! )
                    </div>
        `
                    } else {
                        document.getElementById("hasil-quiz-nilai").classList.add("text-danger")
                        document.getElementById("hasil-quiz-nilai").classList.remove("text-success")
                        document.getElementById("modal-hasil").innerHTML += `
                    <div class="alert alert-danger" role="alert">
                        <i class='bx bx-error me-2'></i><box-icon name='error'></box-icon> Maaf anda tidak lulus!)
                    </div>
        `
                    }

                    document.getElementById("modal-hasil").innerHTML += `
        <div class="d-flex justify-content-center">
                <a href="{{ route('quiz.prepare', $materi) }}"  class="btn btn-primaryPs">Kembali ke Materi!</a>
            </div>
        `

                    storeEval({
                        data,
                        waktu_pengerjaan: Math.floor(3600 - remainingDuration),
                        nilai
                    })
                    quizModal.show();
                }

                function refreshPage() {
                    pagesShow.innerHTML = currentPage;
                    hideAll();
                    document.getElementById('section-' + currentPage).classList.remove('d-none');
                    document.getElementById('num-' + currentPage).classList.add('btn-primary');
                    document.getElementById('num-' + currentPage).classList.add('text-light');
                }

                function hideAll() {
                    for (let i = 1; i <= total; i++) {
                        document.getElementById('section-' + i).classList.add('d-none');

                        document.getElementById('num-' + i).classList.remove('btn-primary');
                        document.getElementById('num-' + i).classList.remove('text-light');
                    }
                }

                async function storeEval(data) {
                    try {
                        const response = await axios.post("{{ route('eval.submit') }}", {
                            materi: "{{ $materi }}",
                            quiz: data,
                            nilai: nilai,
                            waktu_mulai: startTime,
                            waktu_selesai: endTime,
                            _csrf: "{{ csrf_token() }}"
                        })

                        if (response.status == 200) {
                            console.log(response.data)
                        }
                    } catch (error) {
                        console.log("error" + error)
                    }
                }
            </script>
</body>

</html>
