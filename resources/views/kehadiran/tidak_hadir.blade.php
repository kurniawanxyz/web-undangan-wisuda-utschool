<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Terimakasih</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .content{
            width: 100vh;
            height: max-content;
        }
        img {
            width: 100vw;
        }

        @media (max-width: 800px) {
            body {
                height: 100vh;
                display: flex;
                align-items: center
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <img src="{{ asset('assets/images/undangan/terimakasih.png') }}" alt="Terimaksih telah melakukan konfirmasi">
    </div>
</body>

</html>
