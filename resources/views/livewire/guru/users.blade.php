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
                            <li class="breadcrumb-item" aria-current="page">Pengguna</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-body mb-10">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('guru.user.form') }}" wire:navigate class="btn btn-primary mb-10">Buat
                        Pengguna</a>
                </div>
                <div class="col-md-6">
                    <div class="position-relative mb-10">
                        <input type="text" wire:model="search"
                            class="text-counter placeholder-13 form-control py-11 pe-76" maxlength="100"
                            id="courseTitle" placeholder="Cari Pengguna....">
                    </div>
                </div>
                <div class="col-md-1">
                    <button wire:click="retrieveData" class="btn btn-primary mb-0">
                        <i class="ph ph-magnifying-glass" wire:loading.remove></i>
                        <span wire:loading wire:target="retrieveData">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </button>
                </div>
            </div>

        </div>
        <div class="card card-body">
            <div class="table-responsive">
                <table id="assignmentTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="fixed-width">
                                #
                            </th>
                            <th class="h6 text-gray-300">Nama</th>
                            <th class="h6 text-gray-300">Email</th>
                            <th class="h6 text-gray-300">Identitas</th>
                            <th class="h6 text-gray-300">Tgl Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="fixed-width">
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    <div class="flex-align gap-8">
                                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $user->email }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $user->identity }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $user->created_at }}</span>
                                </td>
                                <td>
                                    @if ($user->role === 'guru')
                                        <h2
                                            class="badge text-bg-success h2">
                                            <span class="ti ti-user"></span>
                                            Guru
                                        </h2>
                                    @else
                                        <h2
                                            class="badge text-bg-info h2 ">
                                            <span class="ti ti-school"></span>
                                            Siswa
                                        </h2>
                                    @endif
                                </td>
                                <td>
                                    <a  href="{{ route('guru.user.edit', $user->id) }}"
                                        class="btn btn-info">
                                        <i class="ti ti-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
