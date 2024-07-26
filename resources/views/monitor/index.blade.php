<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Monitor Peserta</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap"
        rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo1/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo1/style.css') }}">
    <!-- End layout styles -->

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body class="sidebar-folded">
    <div class="main-wrapper d-flex flex-column">
        {{-- CONTENT --}}
        <div class="content p-3">
            <h1 class="text-center">MONITOR KEHADIRAN PESERTA</h1>
            <form action="{{ route('logout') }}" method="POST" class="monitor-logout">
                @csrf
                <button type="submit" class="btn">Logout</button>
            </form>
            <div class="card" style="overflow: auto">
                <div class="card-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Kehadiran</th>
                                    <th>Email</th>
                                    <th>No telepon</th>
                                    <th>Jabatan</th>
                                    <th class="text-center">Asal <br> Perusahaan</th>
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

        <footer
            class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
            <p class="text-muted mb-1 mb-md-0">Copyright © {{ date('Y') }} <a href="https://www.nobleui.com/"
                    target="_blank">UT School</a>.</p>
            <p class="text-muted">Created by DMDC team <i class="mb-1 text-primary ms-1 icon-sm"
                    data-feather="heart"></i></p>
        </footer>

    </div>
    </div>

    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>

</body>

</html>
