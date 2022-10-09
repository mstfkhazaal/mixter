<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/Login1', function () {
    return Inertia::render('Auth/Login1');
});
Route::get('/error401', function () {
    return Inertia::render('Error/Error401');
});
Route::get('/error403', function () {
    return Inertia::render('Error/Error403');
});
Route::get('/error404', function () {
    return Inertia::render('Error/Error404');
});
Route::get('/error429', function () {
    return Inertia::render('Error/Error429');
});
Route::get('/error500', function () {
    return Inertia::render('Error/Error500');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
