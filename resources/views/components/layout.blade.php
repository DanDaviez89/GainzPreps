<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gainz Preps</title>
    <script src="{{asset('resources/JS/main.js')}}" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="{{asset("resources/css/styleshee.css")}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kite+One&display=swap" rel="stylesheet">
</head>
<body>
    <x-flash-message/>

    <nav>
        <a href="/cart">
            <div class="nav-item">
                <img src="{{asset("resources\Images\basket.svg")}}" alt="Shopping Basket">
            </div>
        </a>

        <a href="/user/account">
            <div class="nav-item">
                <img src="{{asset("resources\Images\account.svg")}}" alt="Account">
            </div>
        </a>
    </nav>

    <main>
        {{$slot}}
    </main>
</body>
</html>