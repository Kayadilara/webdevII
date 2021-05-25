@extends('home')
@section('content')

<form action="{{ route('products.store') }}" method="post" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form">
        <label for="name">Name</label>
        <input type="text" name="name">
    </div>
    <div class="form">
        <label for="type">Type</label>
        <input type="text" name="type">
    </div>
    <div class="form">
        <label for="price">Price</label>
        <input type="number" name="price">
    </div>
    <div class="form">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity">
    </div>

    <label for="image">Image</label>
    <input type="file" name="image" accept="image/*">

    <button type="submit">Voeg product toe</button>
</form>

@endsection
