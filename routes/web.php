<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'Mon projet Laravel est bien configuré !';
});


Route::get('/home', function () {
    return view('home');
});
