@component('mail::message')
# Contact Formulier

We hebben uw contactformulier goed ontvangen.
U zal zo snel mogelijk een antwoord terug krijgen van ons.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Tot binnenkort,<br>
{{ config('app.name') }}
@endcomponent
