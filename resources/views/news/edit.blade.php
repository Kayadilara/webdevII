@extends('home')

@section('content')
<form action="{{ route('news.update', $newsDetail->id) }}" method="POST">
    @csrf
    {{ method_field('PATCH') }}
    <div class="form">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $newsDetail->title }}">
    </div>
    <div class="form">
        <label for="author">Author</label>
        <input type="text" name="author" value="{{ $newsDetail->author }}">
    </div>
    <div class="form">
        <label for="category">Category</label>
        <input type="text" name="category" value="{{ $newsDetail->category }}">
    </div>
    <div class="form">
        <label for="content">Content</label>
        <input type="text" name="content" value="{{ $newsDetail->content }}">
    </div>

    <button type="submit">Update artikel</button>
</form>
@endsection
