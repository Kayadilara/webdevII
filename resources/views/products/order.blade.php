@extends('home')

@section('content')
    <h1>Aankoop #{{ $order->id}}</h1>

    @if ($order->status == 'paid')
        <h2>Aankoop voltooid</h2>
    @else
        <h2>Aankoop is {{ $order->status }}</h2>
    @endif
@endsection
