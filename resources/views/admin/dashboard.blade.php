@extends('admin-layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/demo1/style.css') }}">
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
                                    <td>{{ ucfirst(str_replace('_', ' ', $item->kehadiran)) }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td class="text-center">{{ $item->perusahaan }}</td>
                                    <td class="d-flex flex-row">
                                        <form action="{{ route('admin.delete-user', $item->id) }}" method="post"
                                            class="participant" data-name="{{ $item->name }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                        @if ($item->kehadiran == 'hadir')
                                            <a href="{{ route('admin.get-invitation', $item->id) }}"
                                                class="download-btn ms-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"
                                                    class="svgIcon">
                                                    <path
                                                        d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                                                    </path>
                                                </svg>
                                                <span class="icon2"></span>
                                            </a>
                                        @endif
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
    <script src="{{ asset('assets/js/confirm-delete.js') }}"></script>
    <script>
        showConfirmDeleteModal('.participant');
    </script>
@endsection
