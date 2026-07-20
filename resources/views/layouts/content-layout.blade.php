<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>@yield('page-name', 'Materi') | @yield('page-description', '')</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('assets') }}/images/favicon.svg" type="image/x-icon">
    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/tabler-icons.min.css">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/feather.css">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/fontawesome.css">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/material.css">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style-preset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    @stack('styles')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    @include('partials.content.Sidebar')
    <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
    @include('partials.content.Navbar')
    <!-- [ Header ] end -->
    <!-- [ Main Content ] start -->
    @yield('content')

    <!-- [ Main Content ] end -->
    @include('partials.content.Footer')



    <!-- [Page Specific JS] start -->
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="{{ asset('assets') }}/js/plugins/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/fonts/custom-font.js"></script>
    <script src="{{ asset('assets') }}/js/pcoded.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>


    <script>
        layout_change('light');
    </script>
    <script>
        change_box_container('false');
    </script>
    <script>
        layout_rtl_change('false');
    </script>
    <script>
        preset_change("preset-1");
    </script>
    <script>
        font_change("Public-Sans");
    </script>

    <script>
        var notyf = new Notyf({
            duration: 4000
        });

        async function setProgress(materi, activity, point) {

            try {
                const respons = await axios.post('{{ route('learning-progress.set') }}', {
                    materi: materi,
                    activity: activity,
                    point: point
                });
                if (point > 0) {
                    notyf.success(respons.data.message);
                }
                return respons.data;
            } catch (error) {
                console.error(error.response.status);
            }
        }
    </script>

    @stack('scripts')
    <script>
        const pages = [{
                title: "Dashboard",
                url: "{{ route('dashboard') }}"
            },
            {
                title: "Menjelajahi Bumi Dan Antariksa",
                link: "{{ route('materi', 'menjelajahi-bumi-dan-antariksa') }}"
            },
            {
                title: "Bumi, Bulan, dan Matahari",
                link: "{{ route('materi', 'bumi-bulan-dan-matahari') }}"
            },
            {
                title: "Berkenalan lebih dalam dengan planet bumi",
                link: "{{ route('materi', 'bumi') }}"
            },
            {
                title: "Berkenalan lebih dalam dengan Bulan",
                link: "{{ route('materi', 'bulan') }}"
            },
            {
                title: "Berkenalan Lebih dalam dengan Matahari",
                link: "{{ route('materi', 'matahari') }}"
            },
            {
                title: "Latihan 1",
                link: "{{ route('quiz.prepare', 'latihan-1') }}"
            },
            {
                title: "Rotasi Bumi",
                link: "{{ route('materi', 'rotasi-bumi') }}"
            },
            {
                title: "Revolusi Bumi",
                link: "{{ route('materi', 'revolusi-bumi') }}"
            },
            {
                title: "Latihan 2",
                link: "{{ route('quiz.prepare', 'latihan-2') }}"
            },
            {
                title: "Tata surya dan matahari sebagai pusatnya",
                link: "{{ route('materi', 'tata-surya-dan-matahari-sebagai-pusatnya') }}"
            },
            {
                title: "Planet sebagai anggota tata surya",
                link: "{{ route('materi', 'planet-sebagai-anggota-tata-surya') }}"
            },
            {
                title: "Mengenal Lebih Dalam Tentang Planet",
                link: "{{ route('materi', 'mengenal-lebih-dalam-tentang-planet') }}"
            },
            {
                title: "Mari berkenalan dengan benda langit",
                link: "{{ route('materi', 'berkenalan-dengan-benda-langit') }}"
            },
            {
                title: "Latihan 3",
                link: "{{ route('quiz.prepare', 'latihan-3') }}"
            },
            {
                title: "Evaluasi",
                link: "#"
            },
        ];


        let searchModalInstance = null;

        function openSearchModalAndSync() {
            const navbarInput = document.getElementById('searchInput');
            const modalInput = document.getElementById('modalSearchInput');

            // Isi input di modal sama kayak input di navbar
            modalInput.value = navbarInput.value;

            if (!searchModalInstance) {
                searchModalInstance = new bootstrap.Modal(document.getElementById('searchModal'));
            }

            // Kalau modal belum kebuka, buka
            if (!document.getElementById('searchModal').classList.contains('show')) {
                searchModalInstance.show();
            }

            // Jalankan pencarian
            searchMenu();
        }

        function searchMenu() {
            const searchInput = document.getElementById('modalSearchInput').value.toLowerCase();
            const results = pages.filter(page => page.title.toLowerCase().includes(searchInput));

            const searchResultsModal = document.getElementById('searchResultsModal');
            searchResultsModal.innerHTML = '';

            if (searchInput === '') {
                searchResultsModal.innerHTML = '';
            } else {
                results.forEach(result => {
                    const li = document.createElement('li');
                    li.classList.add('list-group-item');
                    li.innerHTML = `<a href="${result.link}">${result.title}</a>`;
                    searchResultsModal.appendChild(li);
                });
                if (results.length === 0) {
                    const li = document.createElement('li');
                    li.classList.add('list-group-item');
                    li.textContent = 'Tidak ada hasil ditemukan, coba pencarian lainnya!. ';
                    searchResultsModal.appendChild(li);
                }
            }
        }
    </script>

</body>
<!-- [Body] end -->

</html>
