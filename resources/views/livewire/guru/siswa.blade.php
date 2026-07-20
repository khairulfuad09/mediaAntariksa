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
                            <li class="breadcrumb-item" aria-current="page">Siswa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-body mb-10">
            <div class="row">
                <div class="col-md-11">
                    <div class="position-relative mb-10">
                        <input type="text" wire:model="search"
                            class="text-counter placeholder-13 form-control py-11 pe-76" maxlength="100"
                            id="courseTitle" placeholder="Cari siwa, berdasarkan : nama dan nis">
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
            <h2 class="card-title mb-3">Progress Belajar Siswa</h2>
            <div class="table-responsive">
                <table id="assignmentTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="fixed-width">
                                #
                            </th>
                            <th class="h6 text-gray-300">Nama</th>
                            <th class="h6 text-gray-300">Nis</th>
                            <th class="h6 text-gray-300">Point</th>
                            <th class="h6 text-gray-300">Progress Belajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $user)
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
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $user->identity }}</span>
                                </td>
                                <td>
                                    <span
                                        class="h6 mb-0 fw-medium text-gray-300">{{ $user->learningProgress->sum('point') }}</span>
                                </td>
                                <td>
                                    @php
                                        $percentage = floor((($user->learningProgress->count() + $user->evaluasi->count())/15) * 100)
                                    @endphp
                                    <div class="progress" style="height: 15px;" role="progressbar" aria-label="Example with label"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: {{ $percentage }}%">{{ $percentage }}%</div>
                                    </div>
                                    <span class="mt-2 fw-bold text-primary">{{($user->learningProgress->count() + $user->evaluasi->count())  }}/15 - {{ $percentage }}%</span>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
