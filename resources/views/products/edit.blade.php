@extends('home')

@section('content')
<form action="{{ route('products.update', $productDetail->id) }}" method="POST">
    @csrf
    {{ method_field('PATCH') }}
    <div class="form">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $productDetail->name }}">
    </div>
    <div class="form">
        <label for="type">Type</label>
        <input type="text" name="type" value="{{ $productDetail->type }}">
    </div>
    <div class="form">
        <label for="price">Price</label>
        <input type="number" name="price" value="{{ $productDetail->price }}">
    </div>
    <div class="form">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" value="{{ $productDetail->quantity }}">
    </div>

    <label for="image">Image</label>
    <img src="store_image/fetch_image/{{ $productitem->id }}" width="75" />
    <input type="text" name="image">


    <button type="submit">Update product</button>
</form>
@endsection
