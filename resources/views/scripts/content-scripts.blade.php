<script>
    // Konstanta
    const sections = document.querySelectorAll("#content section"); // Semua <section> dalam #content
    const paginationUl = document.getElementById("pagination");
    const totalPages = sections.length; // Jumlah total halaman

    // Fungsi untuk menampilkan konten berdasarkan halaman
    function renderContent(currentPage) {
        // Perbarui hash URL
        updateHash(currentPage);
        sections.forEach((section, index) => {
            // Tambahkan `d-none` pada section yang tidak aktif
            if (index + 1 === currentPage) {
                section.classList.remove("d-none");
            } else {
                section.classList.add("d-none");
            }
        });
    }

    // Fungsi untuk membuat tombol pagination
    function renderPagination(currentPage) {
        paginationUl.innerHTML = "";

        // Tombol Previous
        const prevLi = document.createElement("li");
        prevLi.className = `page-item`;
        if (currentPage == 1) {
            if ('{{ $prevLink }}' != '#') {
                prevLi.innerHTML = `<a class="page-link" href="{{ $prevLink }}">Materi sebelumnya</a>`;
                prevLi.innerHTML = `<a class="page-link" href="{{ $prevLink }}">Materi sebelumnya</a>`;
                prevLi.addEventListener("click", (e) => {
                    e.preventDefault();
                    window.location.href = "{{ $prevLink }}";
                })
            }

        } else {
            prevLi.innerHTML = `<a class="page-link" href="#" data-page="${currentPage - 1}">sebelumnya</a>`;
        }
        paginationUl.appendChild(prevLi);

        // Tombol angka halaman
        for (let i = 1; i <= totalPages; i++) {
            const pageLi = document.createElement("li");
            pageLi.className = `page-item ${i === currentPage ? "active" : ""}`;
            pageLi.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
            paginationUl.appendChild(pageLi);
        }

        // Tombol Next
        const nextLi = document.createElement("li");
        nextLi.className = `page-item`
        if (currentPage === totalPages) {
            if ('{{ $nextLink }}' != '#') {
                nextLi.innerHTML = `<a class="page-link nextPage" href="{{ $nextLink }}">Materi Selanjutnya</a>`;
                nextLi.addEventListener("click", (e) => {
                    e.preventDefault();
                    window.location.href = "{{ $nextLink }}";
                })
            }
        } else {
            nextLi.innerHTML = `<a class="page-link" href="#" data-page="${currentPage + 1}">Selanjutnya</a>`;
        }
        paginationUl.appendChild(nextLi);
    }


    // Event handler untuk pagination
    paginationUl.addEventListener("click", (e) => {
        e.preventDefault();
        const page = parseInt(e.target.getAttribute("data-page"));
        if (!isNaN(page) && page > 0 && page <= totalPages) {
            renderContent(page);
            renderPagination(page);
        }
    });

    // Inisialisasi halaman pertama
    function getPageFromHash() {
        const hash = window.location.hash;
        if (hash.length > 1) {
            const num = parseInt(hash.substring(1), 10);
            if (!isNaN(num) && num >= 1 && num <= totalPages) {
                return num;
            }
        }
        return 1;
    }

    function updateHash(page) {
        history.replaceState(null, '', `#${page}`);
    }

    window.addEventListener('hashchange', () => {
        const newPage = getPageFromHash();
        renderAll(newPage);
    });

    function renderAll(currentPage = 1) {
        renderContent(currentPage);
        renderPagination(currentPage);
    }

    renderAll(getPageFromHash());
</script>
