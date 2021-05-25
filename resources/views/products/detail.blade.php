<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
    @isset($productDetail)
        <p>{{ $productDetail->name }} </p>
        <p>{{ $productDetail->type }} </p>
        <p>{{ $productDetail->price }} euro</p>
        <p>{{ $productDetail->quantity }} stuk(s) over</p>
        <img src="image/{{ $productDetail->id }}" />
    @else
        <p>Dit product bestaat niet.</p>
    @endisset

    <a href="/products">Ga terug</a>
