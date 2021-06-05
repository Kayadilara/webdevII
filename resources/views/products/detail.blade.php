@extends('home')
@section('content')


@isset($cart)
    @if($cart->hasItems())
        <div>
            <div>
                <h2 >Winkelwagen</h2>
                <table>
                    <tr>
                        <th>Hoeveelheid</th>
                        <th>Naam</th>
                        <th>Prijs</th>
                        <th>Totaal</th>
                    </tr>
                    @foreach($cart->items as $item)
                        <tr>
                            <td>{{ $item->quantity }}x</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price / 100 }}euro</td>
                            <td>{{ $item->getTotal() / 100 }}euro</td>
                        </tr>
                    @endforeach
                    <tr >
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            {{ str_replace('.', ',', $cart->getTotal() / 100) }} euro
                        </td>
                        

                    </tr>
                </table>

                <form method="post" action="{{ route('products.checkout') }}">
                    @csrf
                    <button type="submit">Afrekenen</button>
                </form>
            </div>
        </div>
    @endif
@endisset


@isset($productDetail)
    <p>{{ $productDetail->name }} </p>
    <p>{{ $productDetail->type }} </p>
    <p>{{ $productDetail->price }} euro</p>
    <p>{{ $productDetail->quantity }} stuk(s) over</p>
    <img src="image/{{ $productDetail->id }}" />
    <form method="post" action="{{ route('products.cart')}}">
        @csrf
        <input type="hidden" value="{{ $productDetail->id }}" name="product_id">
        <button type="submit">Koop product</button>
    </form>
@else
    <p>Dit product bestaat niet.</p>
@endisset

<a href="/products">Ga terug</a>

@endsection
