@extends('home')
@section('content')

<form action="{{ route('news.store') }}" method="post">
    @csrf
    <div class="form">
        <label for="title">Title</label>
        <input type="text" name="title">
    </div>
    <div class="form">
        <label for="author">Author</label>
        <input type="text" name="author">
    </div>
    <div class="form">
        <label for="category">Category</label>
        <input type="text" name="category">
    </div>
    <div class="form">
        <label for="content">Content</label>
        <input type="text" name="content">
    </div>

    <button type="submit">Voeg artikel toe</button>
</form>

@endsection
