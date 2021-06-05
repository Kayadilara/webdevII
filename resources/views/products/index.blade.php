@extends('home')

@section('content')


    @foreach ($products as $productitem)
        <div class="inline-grid m-12 gap-5 p-20 rounded border-2 bg-white">
            <p class="font-bold pb-4">{{ $productitem->name }} </p>
            <p class="text-xs" >{{ $productitem->type }} </p>
            <p>{{ str_replace('.',',',($productitem->price / 100)) }} euro</p>
            <p class="text-sm">{{ $productitem->quantity }} stuk(s) over</p>

            <a class="rounded border-2 mt-5 p-2 bg-yellow-400 text-white text-center border-transparent w-40" href="{{ route('products.show', $productitem->id) }}">Bekijk product</a>
            @auth
                <a href="{{ route('products.edit', $productitem->id)}}">Edit</a>
                {{ Form::open(array('url' => 'products/' . $productitem->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete') }}
                {{ Form::close() }}
            @endauth
        </div>
    @endforeach

    {{ $products->links() }}
@endsection
