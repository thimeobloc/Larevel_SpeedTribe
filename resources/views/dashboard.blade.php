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
<!-- Header -->
@include('partials.header')

<!-- Main content -->
<main class="home-container">
    <!-- F1 background image under the header -->
    <img src="{{ asset('images/f1_background.jpg') }}" alt="F1 Race" class="home-image">

    <!-- First row: Image on the left, button on the right -->
    <section class="row">
        <!-- Alpine Podium Image -->
        <div class="image-container">
            <img src="{{ asset('images/podium_alpine.jpg') }}" alt="Alpine Podium" class="podium-image">
            <p>Alpine takes the podium — a glorious moment in F1 history!</p>
        </div>

        <!-- Favorite Team Car -->
        <div class="team-section">
            @if($user->team)
                <div class="team-image-container">
                    <img src="{{ asset('images/f1/' . str_replace(' ', '_', $user->team->name) . '.png') }}"
                         alt="{{ $user->team->name }} car"
                         class="team-car-image">
                    <p>Your favorite team: {{ $user->team->name }}</p>
                </div>
            @else
                <p>You haven't selected a team yet.</p>
            @endif
        </div>

        <!-- Profile setup button -->
        <div class="button-container">
            <a href="{{ route('profile.setup') }}" class="btn btn-primary">Set up your profile</a>
        </div>
    </section>
</main>
</body>
</html>
