@extends('home')

@section('content')

<h3>Contact</h3>

<p>Heb je nog opmerkingen of vragen? Aarzel dan niet om het ons te laten weten!</p>

<div class="container">
  <form method="POST" action="{{ route('contact.form') }}">
    @csrf
    <div class="form">
        <label for="name">Naam</label>
        <input type="text" name="name" placeholder="Voornaam Achternaam">
    </div>
    <div class="form">
        <label for="type">Email</label>
        <input type="text" name="email" placeholder="E-mailadres">
    </div>
    <div>
    <label for="subject">Bericht</label>
    <textarea name="subject" placeholder="Schrijf hier je bericht" style="height:200px"></textarea>
    </div>
    <input type="submit" value="Submit">
  </form>
</div>

@endsection
