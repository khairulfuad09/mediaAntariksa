<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Informasi Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="true">
                            Profile
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="accounts-tab" data-bs-toggle="tab" data-bs-target="#accounts"
                            type="button" role="tab" aria-controls="accounts" aria-selected="false">
                            Akun
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-3" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">

                       <div class="m-2 rounded-circle d-flex justify-content-center">
                            <img src="{{ asset('assets') }}/images/user/avatar-2.jpg"  alt="user-image" class="user-avtar rounded-circle" style="width: 200px; height: 200px;">
                       </div>
                       <div class="table">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td>{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">NISN</th>
                                        <td>{{ Auth::user()->identity }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kelas</th>
                                        <td>{{ Auth::user()->kelas }}</td>
                                    </tr>
                                </tbody>
                            </table>
                       </div>
                    </div>
                    <div class="tab-pane fade p-3" id="accounts" role="tabpanel" aria-labelledby="accounts-tab">
                        <form id="userForm" action="{{ route('auth.updateProfile') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-1">
                                <label for="nama" class="col-form-label">Nama :</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="nama"
                                    value="{{ old('name', Auth::user()->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    value="{{ old('email', Auth::user()->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label for="identity" class="col-form-label">NISN:</label>
                                <input type="text" name="identity"
                                    class="form-control @error('identity') is-invalid @enderror" id="identity"
                                    value="{{ old('identity', Auth::user()->identity) }}">
                                @error('identity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kelas" class="col-form-label">Kelas:</label>
                                <input type="text" name="kelas"
                                    class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                                    value="{{ old('kelas', Auth::user()->kelas) }}">
                                @error('kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="alert alert-primary mb-0" role="alert">
                                Isi Password Jika ingin mengubah password
                            </div>

                            <div class="mb-3">
                                <label for="password" class="col-form-label">Password:</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>


                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
