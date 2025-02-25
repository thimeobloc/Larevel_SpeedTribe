<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard F1</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
@include('partials.header')

<main>
    <div class="dashboard-container">
        <img src="{{ asset('images/f1_background.jpg') }}" alt="F1 Race" class="dashboard-image">
        <div class="dashboard-overlay">
            <h1>Hello, {{ Auth::user()->name }} !</h1>
        </div>
    </div>
</main>

</body>
</html>
