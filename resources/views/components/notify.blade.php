<script data-navigate-track>
    document.addEventListener('livewire:navigated', () => {
        if (!window.hasToastListener) {
            window.hasToastListener = true;

            // Simpan instance notyf secara global
            window.notyf = new Notyf({
                duration: 4000
            });

            Livewire.on('toast', (data) => {
                console.log(data)
                if (data[0].type === 'success') {
                    window.notyf.success(data[0].message);
                } else {
                    window.notyf.error(data[0].message);
                }
            });
        }
    })
</script>

@if (session('success') || session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notyf = ew Notyf({
                duration: 4000
            });

            @if (session('success'))
                notyf.open({
                    type: 'success',
                    message: "{{ session('success') }}",
                });
            @endif

            @if (session('error'))
                notyf.open({
                    type: 'error',
                    message: "{{ session('error') }}",
                });
            @endif
        });
    </script>
@endif
