<div class="auth-main">
    <div class="auth-wrapper v3">
        <div class="auth-form">
            <div class="auth-header">
            </div>
            <div class="card my-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-end mb-4">
                        <h3 class="mb-0"><b>Sign up</b></h3>
                        <a href="{{ route('login') }}" class="link-primary">Sudah punya akun?</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label class="form-label ">Nama</label>
                                <input wire:model='name' type="text" class="form-control @error('name') is-invalid @enderror" placeholder="nama">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Nisn</label>
                        <input wire:model='nisn' type="text" class="form-control @error('nisn') is-invalid @enderror" placeholder="Nis">
                        @error('nisn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Kelas</label>
                        <input wire:model='kelas' type="text" class="form-control @error('kelas') is-invalid @enderror" placeholder="Kelas">
                        @error('kelas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <input wire:model='email' type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat email!">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Password</label>
                        <input wire:model='password' type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid mt-3">
                        <button wire:click='store' type="button" class="btn btn-primary">Buat Akun</button>
                    </div>

                </div>
            </div>
            <div class="auth-footer row">
                <!-- <div class=""> -->
                <div class="col my-1">
                    <p class="m-0">Copyright © <a href="#">Media Antariksa</a></p>
                </div>
                <div class="col-auto my-1">

                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
