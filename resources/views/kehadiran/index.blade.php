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
</style>

<body style="overflow-x: hidden">
    <main class="row" style="height: 100dvh">
        <article class="col-md-6 bg-warning">
            <img src="{{asset('assets/images/logo/dark/1.png')}}" class="mx-auto d-block" width="350"  alt="LOGO UTSCHOOL">
            <div style="margin: -50px">
                <h1 class="text-white text-center" style="font-weight: 700">Undangan Wisuda</h1>
            </div>
        </article>
        <article class="col-md-6 p-5 d-flex align-items-center justify-content-center">
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
                    <label for="name" class="form-label fs-4">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex flex-column mt-3">
                    <label for="name" class="form-label fs-4">NRP</label>
                    <input type="number" name="nrp" class="form-control @error('nrp') is-invalid @enderror" value="{{ old('nrp') }}">
                    @error('nrp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex flex-column mt-5">
                    <button class="btn btn-warning" type="submit">Konfirmasi</button>
                </div>
            </form>
        </article>
    </main>
    <script src="{{asset('assets/vendors/core/core.js')}}"></script>
</body>
</html>
