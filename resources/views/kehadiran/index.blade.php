<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konfirmasi Kehadiran</title>
    <link rel="stylesheet" href="{{asset('assets/css/demo1/style.min.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<style>

    *{
        font-family: 'Rubik', sans-serif;
    }

    .text-warning{
        color: #FDD508 !important;
    }
    .bg-warning{
        background-color: #FDD508 !important;
    }
    .btn-warning{
        background-color: #FDD508 !important;
    }

    label{
        color: var(--bs-secondary) !important;
    }
    .countdown-item{
        background-color: #FDD508;
        padding: 10px;
        border-radius: 10px;
        color: white;
    }

    main{
        background-color: #DFDBE5;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 56 28' width='56' height='28'%3E%3Cpath fill='%23fdd508' fill-opacity='0.14' d='M56 26v2h-7.75c2.3-1.27 4.94-2 7.75-2zm-26 2a2 2 0 1 0-4 0h-4.09A25.98 25.98 0 0 0 0 16v-2c.67 0 1.34.02 2 .07V14a2 2 0 0 0-2-2v-2a4 4 0 0 1 3.98 3.6 28.09 28.09 0 0 1 2.8-3.86A8 8 0 0 0 0 6V4a9.99 9.99 0 0 1 8.17 4.23c.94-.95 1.96-1.83 3.03-2.63A13.98 13.98 0 0 0 0 0h7.75c2 1.1 3.73 2.63 5.1 4.45 1.12-.72 2.3-1.37 3.53-1.93A20.1 20.1 0 0 0 14.28 0h2.7c.45.56.88 1.14 1.29 1.74 1.3-.48 2.63-.87 4-1.15-.11-.2-.23-.4-.36-.59H26v.07a28.4 28.4 0 0 1 4 0V0h4.09l-.37.59c1.38.28 2.72.67 4.01 1.15.4-.6.84-1.18 1.3-1.74h2.69a20.1 20.1 0 0 0-2.1 2.52c1.23.56 2.41 1.2 3.54 1.93A16.08 16.08 0 0 1 48.25 0H56c-4.58 0-8.65 2.2-11.2 5.6 1.07.8 2.09 1.68 3.03 2.63A9.99 9.99 0 0 1 56 4v2a8 8 0 0 0-6.77 3.74c1.03 1.2 1.97 2.5 2.79 3.86A4 4 0 0 1 56 10v2a2 2 0 0 0-2 2.07 28.4 28.4 0 0 1 2-.07v2c-9.2 0-17.3 4.78-21.91 12H30zM7.75 28H0v-2c2.81 0 5.46.73 7.75 2zM56 20v2c-5.6 0-10.65 2.3-14.28 6h-2.7c4.04-4.89 10.15-8 16.98-8zm-39.03 8h-2.69C10.65 24.3 5.6 22 0 22v-2c6.83 0 12.94 3.11 16.97 8zm15.01-.4a28.09 28.09 0 0 1 2.8-3.86 8 8 0 0 0-13.55 0c1.03 1.2 1.97 2.5 2.79 3.86a4 4 0 0 1 7.96 0zm14.29-11.86c1.3-.48 2.63-.87 4-1.15a25.99 25.99 0 0 0-44.55 0c1.38.28 2.72.67 4.01 1.15a21.98 21.98 0 0 1 36.54 0zm-5.43 2.71c1.13-.72 2.3-1.37 3.54-1.93a19.98 19.98 0 0 0-32.76 0c1.23.56 2.41 1.2 3.54 1.93a15.98 15.98 0 0 1 25.68 0zm-4.67 3.78c.94-.95 1.96-1.83 3.03-2.63a13.98 13.98 0 0 0-22.4 0c1.07.8 2.09 1.68 3.03 2.63a9.99 9.99 0 0 1 16.34 0z'%3E%3C/path%3E%3C/svg%3E");
        overflow-x: hidden;
    }

</style>

<body >
    <main class="row">
        <article style="height: 100vh" class="hero d-flex flex-column align-items-center justify-content-center  p-5 rounded-3">
            <h1 class="display-4 fw-bold text-warning">Wisuda UT School Batch 33</h1>
            <div class="countdown my-4 d-flex justify-content-center align-items-center">
                <div class="countdown-item d-flex flex-column align-items-center me-3">
                    <div class="countdown-number display-4 fw-bold">00</div>
                    <div class="countdown-label fs-5">Hari</div>
                </div>
                <div class="countdown-item d-flex flex-column align-items-center me-3">
                    <div class="countdown-number display-4 fw-bold">00</div>
                    <div class="countdown-label fs-5">Jam</div>
                </div>
                <div class="countdown-item d-flex flex-column align-items-center me-3">
                    <div class="countdown-number display-4 fw-bold">00</div>
                    <div class="countdown-label fs-5">Menit</div>
                </div>
                <div class="countdown-item d-flex flex-column align-items-center">
                    <div class="countdown-number display-4 fw-bold">00</div>
                    <div class="countdown-label fs-5">Detik</div>
                </div>
            </div>
            <div class="details fs-5 mb-3 d-flex align-items-center gap-2">
                <i class="bi bi-calendar-check-fill text-warning" style="font-size: 20px"></i>
                <p class="mb-1">Tanggal: 06 Agustus 2024</p>
            </div>
            <div class="details fs-5 mb-3 d-flex align-items-center gap-2">
                <i class="bi bi-geo-alt-fill text-warning" style="font-size: 20px"></i>
                <p class="mb-1">Lokasi: {{ config('app.event_location') }}</p>
            </div>

            <div class="footer mt-4">
                <p class="fs-5">Untuk informasi lebih lanjut, hubungi kami di: info@utschool.ac.id</p>
            </div>

            <div class="mt-5">
                <a href="#form-rsvp" class="btn btn-warning text-white">Konfirmasi Kehadiran</a>
            </div>
        </article>
        <article id="form-rsvp" class="hero d-flex flex-column align-items-center justify-content-center bg-light p-5 rounded-3 ">
            <article class="col-10 col-md-8 d-flex align-items-center justify-content-center">
                <form action="{{route("kehadiran.store")}}" method="post" class="w-100">
                    @csrf
                    <div class="d-flex flex-column mt-3">
                        <label for="name" class="form-label fs-4">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <label for="name" class="form-label fs-4">Jabatan</label>
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}">
                        @error('position')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <label for="name" class="form-label fs-4">Asal Perusahaan</label>
                        <input type="text" name="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" value="{{ old('perusahaan') }}">
                        @error('perusahaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <label for="name" class="form-label fs-4">Jumlah yang akan hadir</label>
                        <input type="number" name="number_present" class="form-control @error('number_present') is-invalid @enderror" value="{{ old('number_present') }}">
                        @error('number_present')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex flex-column mt-5">
                        <button class="btn btn-warning" type="submit">Konfirmasi kehadiran</button>
                    </div>
                </form>
            </article>
        </article>
    </main>
    <script  src="{{asset('assets/vendors/core/core.js')}}"></script>
    <script src="{{asset('assets/js/countdown.js')}}"></script>
    <script>
        function confirmRSVP(){
            document.getElementById('form-rsvp').classList.remove('d-none');
            document.getElementById('btn-rsvp').classList.add('d-none');
        }
    </script>
</body>
</html>
