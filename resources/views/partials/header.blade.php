<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil F1</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>
<header>
    <div class="menu">☰</div>

    <div class="logo">
        <a href="{{ route('home') }}">Speed Tribe</a>
    </div>

    <nav class="user-options">
        <ul style="display: flex; list-style: none;">
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Sign in</a></li>
            @else
                <li><a href="{{ route('profile.edit') }}">Compte</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>

                </li>
            @endguest
        </ul>
    </nav>
</header>
</body>
</html>
