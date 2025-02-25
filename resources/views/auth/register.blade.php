<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
<header>
    <a href="{{ route('home') }}" class="home-link">
        <h1>Speed Tribe</h1>
    </a>
    <img src="{{ asset('images/f1header.png') }}" alt="F1 Car" class="f1-car">
</header>

<main>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <h2>Register</h2>

        <!-- Name -->
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror

        <!-- Email Address -->
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror

        <!-- Password -->
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror

        <!-- Confirm Password -->
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
        @error('password_confirmation')
        <p class="error">{{ $message }}</p>
        @enderror

        <div class="flex">
            <a href="{{ route('login') }}">Already registered?</a>
            <button type="submit">Register</button>
        </div>
    </form>
</main>
</body>
</html>
