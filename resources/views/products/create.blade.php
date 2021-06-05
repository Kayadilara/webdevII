@extends('home')
@section('content')

<form action="{{ route('products.store') }}" method="post" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form">
        <label for="name">Name</label>
        <input type="text" name="name">
    </div>
    <div class="form">
        <label for="category_id">Category</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
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
