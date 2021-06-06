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
        <label for="category_id">Category</label>
        <select name="category_id">
            @foreach($categories as $category)
                @if($category->id == $productDetail->category_id)
                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
            @endforeach
        </select>
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
        <img src="products/image/{{ $productDetail->id }}" width="75" />
    <input type="file" name="image">


    <button type="submit">Update product</button>
</form>
@endsection
