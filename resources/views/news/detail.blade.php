@extends('home')
@section('content')

<div class="flex flex-col items-center h-auto flex-wrap mx-auto my-32 w-2/4 rounded border-2 bg-white p-12">

    @isset($newsDetail)
        <h1 class="text-5xl p-5">{{ $newsDetail->title }}</h1>
        <p class="text-sm text-yellow-500">Geschreven door {{ $newsDetail->author }}</p>
        <p class="text-sm text-yellow-500">Category: {{ $newsDetail->category }}</p>
        <p class="break-all p-5">{{ $newsDetail->content }}</p>
        <p class="p-5 text-xs">Geschreven op {{ $newsDetail->created_at }}</p>

    @else
        <p>Dit artikel bestaat niet.</p>
    @endisset

    <a class="rounded border-2 mt-5 p-2 bg-yellow-400 text-white text-center border-transparent w-40" href="/news">Ga terug</a>
</div>

@endsection
