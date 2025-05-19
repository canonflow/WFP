<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>HOME {{ $name ?? "Guest" }}</h1>

    @if ($angka > 10)
        <p>Angka lebih besar dari 10</p>
    @elseif ($angka > 5)
        <p>Angka agak besar</p>
    @else
        <p>Angka kecil</p>
    @endif
</body>
</html>