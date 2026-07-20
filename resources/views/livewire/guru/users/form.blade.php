<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row  align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Guru</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('guru.user') }}">Pengguna</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{ $id != null ? 'Ubah data pengguna' : 'Buat Pengguna' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>{{ $form }}</h3>
                        <a wire:navigate class="btn btn-sm btn-primary" href="{{ route('guru.user') }}"><i
                                class="ph ph-x"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent='{{ $id != null ? 'update' : 'submit' }}' method="post">
                            @csrf
                            <div class="form-group mb-10">
                                <label for="name" class="mb-10 fw-bold">Nama Siswa</label>

                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ph ph-user"></i>
                                    </span>
                                    <input type="text" wire:model="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Cth. Aulia" id="name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-10">
                                <label for="name" class="mb-10 fw-bold">NISN/NIP</label>

                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ph ph-identification-badge"></i>
                                    </span>
                                    <input type="text" wire:model="identity"
                                        class="form-control @error('identity') is-invalid @enderror"
                                        placeholder="00000000" id="identity">
                                    @error('identity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="kelas">Role</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ph ph-user-gear"></i>
                                    </span>
                                    <select wire:model.lazy="role"
                                        class="form-select @error('role') is-invalid @enderror" id="kelas"
                                        aria-label="jenis guru">
                                        <option value="" disabled>Pilih Role</option>
                                        <option value="siswa">Siswa</option>
                                        <option value="guru">Guru</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-10">
                                <label for="name" class="mb-10 fw-bold">Email</label>

                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ph ph-envelope-open"></i>
                                    </span>
                                    <input type="text" wire:model="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="abcd@example.com" id="email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-10">
                                <label for="name" class="mb-10 fw-bold">Password</label>

                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ph ph-password"></i>
                                    </span>
                                    <input type="password" wire:model="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password" id="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex">
                                <button type="submit" wire:click="{{ $id != null ? 'update' : 'submit' }}"
                                    class="btn btn-primary">
                                    <span wire:loading.remove wire:target="{{ $id != null ? 'update' : 'submit' }}">
                                        Simpan Data
                                    </span>
                                    <span wire:loading wire:target="{{ $id != null ? 'update' : 'submit' }}">
                                        <div class="spinner-border spinner-border-sm" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        Menyimpan...
                                    </span>
                                </button>
                            </form>

                            @if ($id != null)
                                <button type="button"
                                    wire:click="$dispatch('confirm-delete', { id: {{ $id }} })"
                                class="btn btn-danger ms-2">
                                    <span wire:loading.remove wire:target="delete">
                                        Hapus Data
                                    </span>
                                    <span wire:loading wire:target="delete">
                                        <div class="spinner-border spinner-border-sm" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        Menyimpan...
                                    </span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@push('scripts')
    <script data-navigate-once>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('confirm-delete', (event) => {
                const id = event.id;
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.delete(id);
                    }
                });
            });
        });
    </script>
@endpush
