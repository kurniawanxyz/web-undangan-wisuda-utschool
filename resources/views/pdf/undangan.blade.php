<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Undangan Wisuda Nasional Batch 33 UT School</title>
</head>
<style>
    @page {
        size: A4 landscape;
        margin: 0;
    }

    body {
        margin: 0;
        padding: 0;
    }

    h1 {
        width: 50%;
        position: absolute;
        bottom: 43.5%;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        font-family: 'Poppins', sans-serif;
    }

    div {
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }
</style>

<body>
    @php
        $normalLength = 20;
        $maxSize = 40;
        $minSize = 20;
        $textLength = strlen($name);
        $fontSize = $maxSize;
        $bottomPosition = 43.5;

        if ($textLength > $normalLength) {
            $fontSize = max($minSize, $maxSize - ($textLength - $normalLength));
            $bottomPosition += ($maxSize - $fontSize) * 0.15;
        }
    @endphp
    <div style='background-image: url("{{ public_path('assets/images/undangan/undangan_pdf.png') }}")'>
        <h1 style="color: black !important;font-size: {{ $fontSize }}px;bottom: {{ $bottomPosition }}%;">
            {{ $name }}</h1>
    </div>


</body>

</html>
