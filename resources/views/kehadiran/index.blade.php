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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<style>

    *{
        font-family: 'Montserrat', sans-serif;
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

    main{
        background-color: #ffffff;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 56 28' width='56' height='28'%3E%3Cpath fill='%23fdd508' fill-opacity='0.22' d='M56 26v2h-7.75c2.3-1.27 4.94-2 7.75-2zm-26 2a2 2 0 1 0-4 0h-4.09A25.98 25.98 0 0 0 0 16v-2c.67 0 1.34.02 2 .07V14a2 2 0 0 0-2-2v-2a4 4 0 0 1 3.98 3.6 28.09 28.09 0 0 1 2.8-3.86A8 8 0 0 0 0 6V4a9.99 9.99 0 0 1 8.17 4.23c.94-.95 1.96-1.83 3.03-2.63A13.98 13.98 0 0 0 0 0h7.75c2 1.1 3.73 2.63 5.1 4.45 1.12-.72 2.3-1.37 3.53-1.93A20.1 20.1 0 0 0 14.28 0h2.7c.45.56.88 1.14 1.29 1.74 1.3-.48 2.63-.87 4-1.15-.11-.2-.23-.4-.36-.59H26v.07a28.4 28.4 0 0 1 4 0V0h4.09l-.37.59c1.38.28 2.72.67 4.01 1.15.4-.6.84-1.18 1.3-1.74h2.69a20.1 20.1 0 0 0-2.1 2.52c1.23.56 2.41 1.2 3.54 1.93A16.08 16.08 0 0 1 48.25 0H56c-4.58 0-8.65 2.2-11.2 5.6 1.07.8 2.09 1.68 3.03 2.63A9.99 9.99 0 0 1 56 4v2a8 8 0 0 0-6.77 3.74c1.03 1.2 1.97 2.5 2.79 3.86A4 4 0 0 1 56 10v2a2 2 0 0 0-2 2.07 28.4 28.4 0 0 1 2-.07v2c-9.2 0-17.3 4.78-21.91 12H30zM7.75 28H0v-2c2.81 0 5.46.73 7.75 2zM56 20v2c-5.6 0-10.65 2.3-14.28 6h-2.7c4.04-4.89 10.15-8 16.98-8zm-39.03 8h-2.69C10.65 24.3 5.6 22 0 22v-2c6.83 0 12.94 3.11 16.97 8zm15.01-.4a28.09 28.09 0 0 1 2.8-3.86 8 8 0 0 0-13.55 0c1.03 1.2 1.97 2.5 2.79 3.86a4 4 0 0 1 7.96 0zm14.29-11.86c1.3-.48 2.63-.87 4-1.15a25.99 25.99 0 0 0-44.55 0c1.38.28 2.72.67 4.01 1.15a21.98 21.98 0 0 1 36.54 0zm-5.43 2.71c1.13-.72 2.3-1.37 3.54-1.93a19.98 19.98 0 0 0-32.76 0c1.23.56 2.41 1.2 3.54 1.93a15.98 15.98 0 0 1 25.68 0zm-4.67 3.78c.94-.95 1.96-1.83 3.03-2.63a13.98 13.98 0 0 0-22.4 0c1.07.8 2.09 1.68 3.03 2.63a9.99 9.99 0 0 1 16.34 0z'%3E%3C/path%3E%3C/svg%3E");
        overflow-x: hidden;
    }


    .countdown{
        gap: 50px;
    }

.countdown-item {
    background: linear-gradient(to bottom, #ffe500, #ffb800);
    border-radius: 10px;
    padding: 20px;
    width: 200px;
    height: 250px;
    text-align: center;
    font-size: 3.5em;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white;
    font-weight: bolder;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

}

.rsvp-button {
    display: block;
    margin: 100px auto;
    padding: 15px 40px;
    font-weight: bolder;
    background: linear-gradient(to bottom, #ffe500, #ffb800);
    border: none;
    border-radius: 30px;
    color: white;
    font-size: 1.5em;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.rsvp-button:hover {
    background: linear-gradient(to bottom, #ffb800, #ffe500);
    color: #ffffff;
    transition: 2.5s;
}

.btn-submit-srvp{
    display: block;
    padding: 15px 40px;
    font-weight: bolder;
    background: linear-gradient(to bottom, #ffe500, #ffb800);
    border: none;
    border-radius: 30px;
    color: white;
    font-size: 1.5em;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

#keterangan span{
        font-size: 70px;
        gap: 2px;
}
#pt{
    font-size: 50px
}

#pt ~ p{
    font-size: 27px
}

#map{
    height: 500px;
    width:75%;
}

.syukur{
    margin-top: -40px;
    font-size: 25px;
    margin-bottom: 10px
}

#selasa{
    margin-top: -30px;
    font-size: 30px !important;
}

.title-keterangan-waktu{
    font-size: 20px;
    margin-top: 15px;
    margin-bottom: 5px
}

.ket-event{
    font-size: 50px !important;
}

#ballroom{
    font-size: 45px;
    margin-top: 20px
}

.logo-hero{
    width: 80%;
}

@media (min-width: 320px) and (max-width: 425px) {
    .logo-hero{
        width: 100%;
    }
    .rsvp-button{
        margin: 0px;
        margin-top: 20px;
        padding: 5px 15px;
        font-size: 15px
    }
    #keterangan span{
        font-size: 16px
    }

    #ballroom{
    font-size: 20px;
    /* margin-top: 20px */
    }

    .ket-event{
    font-size: 15px !important;
    }

    #selasa{
        font-size: 10px !important;
        margin: 0px ;
    }

    .title-keterangan-waktu{
        font-size: 8px;
        margin-top: 8px;
    }

    .syukur{
        font-size: 8px;
        margin-top: -10px;
    }

    #pt{
        font-size: 20px
    }

    #pt ~ p{
        font-size: 10px
    }

    #map{
        width:100%;
    }

    .countdown-item {
        padding: 20px;
        width: 50px;
        height: 100px;
        font-size: 1em;
    }

    .countdown{
        gap: 15px;
    }

    .form-label{
        font-size: 10px
    }

}
@media (min-width: 426px) and (max-width: 768px) {
    #keterangan span{
            font-size: 40px
    }

    #selasa{
        font-size: 15px !important;
        margin: -10px ;
    }

    .ket-event{
    font-size: 20px !important;
    }

    #map{
        width:100%;
    }

    .countdown-item {
        padding: 20px;
        width: 100px;
        height: 150px;
        font-size: 1em;
    }

    .countdown{
        gap: 15px;
    }

    .form-label{
        font-size: 10px
    }
}

</style>

<body style="overflow-x: hidden">
    <main class="row">
        <article style="height: 100vh;" class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('assets/images/logo/light/4.png') }}" class="logo-hero" lazy>
        </article>
        <article style="min-height: 100vh;background: #ffffff;" class="d-flex flex-column justify-content-center align-items-center p-5">
            {{-- <img class="w-50" src="{{asset('assets/images/invitation.png')}}" alt=""> --}}
            {{-- <p class="fw-semibold text-center syukur">Dengan penuh rasa syukur dan suka cita, <br> Kami mengundang Bapak/Ibu dalam acara wisuda nasional</p> --}}
            {{-- <p class="fs-3 fw-semibold text-center">Kami mengundang Bapak/Ibu dalam acara wisuda nasional</p> --}}
            <span class=" title-keterangan-waktu">Pelaksanaan :</span>
            <div id="keterangan" class="row w-75 w-md-75 d-flex" style="">
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <span class="fw-bolder ket-event">Agustus</span>
                </div>
                <div style="border-right: 4px solid black;border-left: 4px solid black" class="col-4 d-flex justify-content-center flex-column align-items-center">
                    <span class="text-warning fw-bolder">06</span>
                    {{-- <span id="selasa">Selasa</span> --}}
                </div>
                <div class=" col-4 d-flex justify-content-center align-items-center">
                    <span class="fw-bolder ket-event">Selasa</span>
                </div>
            </div>
            <span id="ballroom" class=" text-primary fw-bolder">Grand Ballroom</span>
            <h1 id="pt" class=" fw-bolder text-center">PT. United Tractors Tbk.</h1>

            <article style="height: 100vh" class="d-flex flex-column justify-content-center align-items-center">
                <div class="countdown d-flex">
                    <div class="countdown-item">
                        <span id="days">00</span>
                        <div>Hari</div>
                    </div>
                    <div class="countdown-item">
                        <span id="hours">00</span>
                        <div>Jam</div>
                    </div>
                    <div class="countdown-item">
                        <span id="minutes">00</span>
                        <div>Menit</div>
                    </div>
                    <div class="countdown-item">
                        <span id="seconds">00</span>
                        <div>Detik</div>
                    </div>
                </div>
                <a href="#form-rsvp" class="rsvp-button">R.S.V.P</a>
            </article>

            <p class="my-4 text-center" >Anda dapat menuju lokasi acara dengan bantuan peta dibawah ini</p>
            <article id="map" style="box-shadow: 4px 4px 20px 0px black" class=" rounded-3">
                <script>
                    var myMap = L.map('map').setView(['-6.183769611741541', '106.93128819349285'], 20);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(myMap);

                    L.marker(['-6.183769611741541', '106.93128819349285']).addTo(myMap)
                        .bindPopup('PT. United Tractors')
                        .openPopup();
                </script>
            </article>

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
                        <label for="name" class="form-label fs-4">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <label for="name" class="form-label fs-4">Nomor Telepon</label>
                        <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}">
                        @error('no_telp')
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
                        <label for="name" class="form-label fs-4">Instansi/Perusahaan</label>
                        <input type="text" name="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" value="{{ old('perusahaan') }}">
                        @error('perusahaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


<div class="d-flex flex-column mt-3">
                        <label for="name" class="form-label fs-4 mt-4">Konfirmasi Kehadiran</label>
                        <span class="d-flex gap-3 justify-content-start">
                            <input style="width: 30px " type="radio" id="hadir" name="kehadiran" value="hadir" class="">
                            <label for="hadir" class="form-label fs-4">Hadir</label>
                        </span>
                        <span class="d-flex gap-3 justify-content-start">
                            <input style="width: 30px " type="radio" id="tidak_hadir" name="kehadiran" value="tidak_hadir" class="">
                            <label for="tidak_hadir" class="form-label fs-4">Tidak Hadir</label>
                        </span>
                        @error('kehadiran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-end mt-5">
                        <button class="btn-submit-srvp" type="submit">Konfirmasi</button>
                    </div>
                </form>
            </article>
        </article>
    </main>
    <script  src="{{asset('assets/vendors/core/core.js')}}"></script>
    <script>

                // Set the date we're counting down to
        var countDownDate = new Date("Aug 6, 2024 08:00:00").getTime();

        // Update the count down every 1 second
        var countdownfunction = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="days", "hours", "minutes", "seconds"
        document.getElementById("days").innerHTML = days;
        document.getElementById("hours").innerHTML = hours;
        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("seconds").innerHTML = seconds;

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(countdownfunction);
            document.getElementById("days").innerHTML = "0";
            document.getElementById("hours").innerHTML = "0";
            document.getElementById("minutes").innerHTML = "0";
            document.getElementById("seconds").innerHTML = "0";
        }
        }, 1000);

        function confirmRSVP(){
            document.getElementById('form-rsvp').classList.remove('d-none');
            document.getElementById('btn-rsvp').classList.add('d-none');
        }
    </script>
</body>
</html>
