@extends('home')

@section('content')

    @if($overviewData->isNotEmpty())
        <table>
            <tr>
                <th>Voornaam</th>
                <th>Achernaam</th>
                <th>Hoeveelheid</th>
                <th>Datum</th>
            </tr>
            @foreach( $overviewData as $data )
                <tr>
                    <td>{{ $data->order->fname }}</td>
                    <td>{{ $data->order->lname }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>{{ $data->updated_at }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Geen overview beschikbaar.</p>
    @endisset

    <a href="/products">Ga terug</a>

@endsection

