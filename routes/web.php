<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard (protected by auth and email verification)
Route::get('/dashboard', function () {
    $user = Auth::user(); // Récupère l'utilisateur connecté
    return view('dashboard', ['user' => $user]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Profile routes (protected by auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include auth routes (Laravel Breeze / Jetstream)
require __DIR__.'/auth.php';
