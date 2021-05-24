<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
</head>
<body>
    @foreach ($news as $newsitem)
        <div style="padding: 2%">
            <p> id = {{ $newsitem->id }} </p>
            <p> title = {{ $newsitem->title }} </p>
            <p> author = {{ $newsitem->author }} </p>
            <p> category {{ $newsitem->category }} </p>
        </div>
    @endforeach
</body>
</html>