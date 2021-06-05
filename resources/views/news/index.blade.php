@extends('home')

@section('content')
    @foreach ($news as $newsitem)
        <div class="inline-grid m-12 gap-5 p-20 rounded border-2 bg-white">
            <p class="font-bold pb-4">{{ $newsitem->title }} </p>
            <p class="text-xs">geschreven door {{ $newsitem->author }} </p>
            <p class="text-sm">{{ $newsitem->category }} </p>
            <a class="rounded border-2 mt-5 p-2 bg-yellow-400 text-white text-center border-transparent" href="{{ route('news.show', $newsitem->id) }}">Lees artikel</a>
            @auth
                <a class="rounded border-2 p-2 bg-yellow-300 text-white text-center border-transparent" href="{{ route('news.edit', $newsitem->id)}}">Edit</a>
                {{  Form::open(array('url' => 'news/' . $newsitem->id)) }}
                    {{  Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete') }}
                {{ Form::close() }}
            @endauth

        </div>
    @endforeach

    {{ $news->links() }}
@endsection
