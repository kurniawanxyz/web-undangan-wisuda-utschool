@extends('admin-layout')

@section('content')
    <div class="grid-margin stretch-card d-flex flex-column">
        <div class="card mb-4 flex-row justify-content-between align-items-center p-3">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-dot mb-0">
                        <li class="breadcrumb-item active" aria-current="page">List peserta</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end">
                <form class="search-form">
                    <div class="input-group">
                        <div class="input-group-text">
                            <i data-feather="search"></i>
                        </div>
                        <input type="text" class="form-control" id="navbarForm" name="query"
                            value="{{ request('query') }}" placeholder="Search here...">
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Asal Perusahaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($participants as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ "Jakarta" }}</td>
                                    <td>
                                        <form action="{{ route('admin.delete-user', $item->id) }}" method="post" class="participant"
                                            data-name="{{ $item->name }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
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
