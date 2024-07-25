@extends('admin-layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/demo1/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo1/fab.css') }}">
    <script src="{{ asset('assets/js/handleModalShow.js') }}"></script>
    <div class="grid-margin stretch-card d-flex flex-column">
        <div class="card mb-4 flex-row justify-content-between align-items-center p-3">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-dot mb-0">
                        <li class="breadcrumb-item active" aria-current="page">List peserta</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end d-flex flex-row gap-3">
                <form class="search-form">
                    <div class="input-group">
                        <div class="input-group-text">
                            <i data-feather="search"></i>
                        </div>
                        <input type="text" class="form-control" id="navbarForm" name="query"
                            value="{{ request('query') }}" placeholder="Search here...">
                    </div>
                </form>
                @if (count($participants) > 0)
                    <div class="download-pdf">
                        <button class="btn btn-primary"
                            onclick="window.location.href = '{{ route('admin.download_all_pdf') }}'">Unduh semua pdf
                            peserta</button>
                    </div>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Kehadiran</th>
                                <th>Email</th>
                                <th>No telepon</th>
                                <th>Jabatan</th>
                                <th class="text-center">Asal <br> Perusahaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($participants as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        {{ ucfirst(str_replace('_', ' ', $item->kehadiran)) }}
                                        @if (is_null($item->konfirmasi_kehadiran))
                                            <i data-feather="alert-circle" class="text-warning" width='18px'></i>
                                        @elseif ($item->konfirmasi_kehadiran == 'hadir')
                                            <i data-feather="check-circle" class="text-success" width='18px'></i>
                                        @elseif ($item->konfirmasi_kehadiran == 'tidak_hadir')
                                            <i data-feather="x-circle" class="text-danger" width='18px'></i>
                                        @endif
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td class="text-center">{{ $item->perusahaan }}</td>
                                    <td class="d-flex flex-row">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi lainnya
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <div class="dropdown-item">
                                                    <button class="btn"
                                                        onclick="changeValueForm('{{ $item->id }}','{{ $item->substitute }}', '{{ $item->konfirmasi_kehadiran }}')">Konfirmasi</button>
                                                </div>
                                                <div class="dropdown-item">
                                                    <form action="{{ route('admin.delete-user', $item->id) }}"
                                                        method="post" class="participant" data-name="{{ $item->name }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn">Hapus</button>
                                                    </form>
                                                </div>
                                                <div class="dropdown-item">
                                                    @if ($item->kehadiran == 'hadir')
                                                        <a href="{{ route('admin.get-invitation', $item->id) }}"
                                                            class="btn">Download</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <p class="mt-3 mb-3 text-center fw-bold">
                                            {{ request('query') ? 'Data not found!' : 'Data is empty...' }}
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $participants->links('pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleKehadiran">Konfirmasi Kehadiran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.confirmation_present') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" id="userId">
                        <div class="form-group">
                            <p class="form-label">Status Kehadiran</p>
                            <div class="d-flex flex-rows">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="confirmation_present"
                                        id="radioHadir" value="hadir">
                                    <label class="form-check-label" for="radioHadir">
                                        Hadir
                                    </label>
                                </div>
                                <div class="form-check ms-3">
                                    <input class="form-check-input" type="radio" name="confirmation_present"
                                        id="radioTidakHadir" value="tidak_hadir">
                                    <label class="form-check-label" for="radioTidakHadir">
                                        Tidak Hadir
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Pengganti (Jika ada):</label>
                            <input type="text" class="form-control" id="substitute" name="substitute">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/confirm-delete.js') }}"></script>
    <script>
        showConfirmDeleteModal('.participant');
    </script>
@endsection
