<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page F1</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
@include('partials.header')

<main>
    <img src="{{ asset('images/f1_background.jpg') }}" alt="F1 Race" class="home-image">
    <h1>TEST</h1>
    <a href="{{ route('profile.setup') }}" class="btn btn-primary">Set up your profile</a>
</main>
</body>
</html>
