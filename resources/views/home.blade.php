<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Kiki's Delivery Service</title>
</head>
<body class="bg-gray-50">
    <header>
        <nav class="flex flex-col text-center content-center table flex-row text-left justify-between py-6 px-4 bg-white shadow sm:items-baseline w-full bg-yellow-300">
            <ul>
                <img class="w-12 ml-5 float-left" src="{{ asset('docs/images/kiki.png') }}">
                <a href="/" class="px-4">Home</a>
                <a href="/about" class="px-4">Over de club</a>
                <a href="/sponsors" class="px-4">Sponsors</a>
                <a href="/contact" class="px-4">Contact</a>
                <a href="/news" class="px-4">Nieuws</a>
                <a href="/products" class="px-4 font-bold">Verkoopactie</a>
                @guest
                    <a class="px-1 py-1 border rounded float-right bg-yellow-50 mr-2 border-transparent hover:bg-yellow-400" href=" {{ route('login') }} ">log in</a>
                    <a class="px-1 py-1 border rounded float-right bg-yellow-50 mr-2 border-transparent hover:bg-yellow-400" href=" {{ route('register') }} ">registreer</a>
                @endguest
                @auth
                    <a class="px-1 py-1 border rounded float-right bg-yellow-50 border-transparent hover:bg-yellow-400 " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form " action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </ul>
        </nav>
    </header>

    <div></div>

    <div>
        @yield('content')
    </div>

    <form class="text-center rounded border-2 p-2 bg-yellow-200 bottom-0 w-full mt-80" action="{{ route('newsletter') }}" method="post">
        <div class="form-group">
            <p class="p-5">Meld je aan bij onze nieuwsbrief en ontvang wekelijkse updates over Kiki's delivery en haar promoties! </p>
            <label for="exampleInputEmail"></label>
            <input class="w-6/12" type="email" name="user_email" id="exampleInputEmail" class="form-control" placeholder="Jouw e-mailadres">
        </div>
        {{ csrf_field() }}
        <button class="p-2 m-1 border rounded bg-yellow-50 w-1/5 border-transparent hover:bg-yellow-400" type="submit" class="btn btn-primary">Meld je aan</button><br>
        <a class="text-xs underline " href="/privacy">Bekijk onze privacy policy</a>
    </form>
</body>
</html>
