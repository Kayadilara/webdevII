@extends('home')

@section('content')

    @isset($cart)
        @if($cart->hasItems())
            <div>
                <div>
                    <h2 >Winkelwagen</h2>
                        @foreach($cart->items as $item)
                            <tr>
                                <td>{{ $item->quantity }}x</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price / 100 }}euro</td>
                                <td>{{ $item->getTotal() / 100 }}euro</td>
                            </tr>
                        @endforeach
                        <tr >
                            <td>
                                Total
                            </td>
                            <td>
                                {{ str_replace('.', ',', $cart->getTotal() / 100) }} euro
                            </td>
                        </tr>
                </div>
            </div>
        @endif
    @endisset

    <form action="{{ route('products.order.create') }}" method="post">
        @csrf
        <div class="form">
            <label for="fname">Voornaam</label>
            <input type="text" name="fname" placeholder="Voornaam" required>
        </div>
        <div class="form">
            <label for="lname">Achternaam</label>
            <input type="text" name="lname" placeholder="Achternaam" required>
        </div>
        <div class="form">
            <label for="street">Straat</label>
            <input type="text" name="street" placeholder="Straat" required>
        </div>
        <div class="form">
            <label for="housenumber">Huisnummer</label>
            <input type="number" name="housenumber" placeholder="1" required>
        </div>
        <div class="form">
            <label for="city">Stad</label>
            <input type="text" name="city" placeholder="Stad" required>
        </div>

        <button type="submit">Afrekenen</button>
    </form>
@endsection
