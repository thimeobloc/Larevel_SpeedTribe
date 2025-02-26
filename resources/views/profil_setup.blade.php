@extends('layouts.simple')

@section('content')
    <header>
        <a href="{{ auth()->check() ? route('dashboard') : route('home') }}" class="home-link">
            <h1>Speed Tribe</h1>
        </a>

        <img src="{{ asset('images/f1header.png') }}" alt="F1 Car" class="f1-car">
        <link rel="stylesheet" href="{{ asset('css/profil_setup.css') }}">
    </header>

    <h1>Set your preferences</h1>

    <!-- Message de confirmation -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Affichage des erreurs -->
    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('profile.updatePreferences') }}">
        @csrf
        @method('PATCH')

        <!-- Sélection de l'équipe favorite -->
        <label for="favorite_team">Favorite team:</label>
        <select id="favorite_team" name="favorite_team">
            <option value="">Select a team</option>
            @foreach($teams as $team)
                <option value="{{ $team->id }}" {{ $team->id == auth()->user()->favorite_team ? 'selected' : '' }}>
                    {{ $team->name }}
                </option>
            @endforeach
        </select>

        <!-- Sélection du pilote préféré -->
        <label for="favorite_driver">Favorite driver:</label>
        <select id="favorite_driver" name="favorite_driver">
            <option value="">Select a driver</option>
            @foreach($pilots as $pilot)
                <option value="{{ $pilot->id }}" {{ old('favorite_driver', auth()->user()->favorite_driver) == $pilot->id ? 'selected' : '' }}>
                    {{ $pilot->name }}
                </option>
            @endforeach
        </select>


        <button type="submit">Save preferences</button>
    </form>
@endsection
