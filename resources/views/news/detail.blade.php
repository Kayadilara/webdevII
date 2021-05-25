<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @isset($newsDetail)
        <h1>{{ $newsDetail->title }}</h1>
        <p>Geschreven door {{ $newsDetail->author }}</p>
        <p>{{ $newsDetail->category }}</p>
        <p>{{ $newsDetail->content }}</p>
        <p>Geschreven op {{ $newsDetail->created_at }}</p>

    @else
        <p>Dit artikel bestaat niet.</p>
    @endisset

    <a href="/news">Ga terug</a>
</body>
</html>
