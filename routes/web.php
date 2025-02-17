<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LikeController;

Route::get('/eventos', function () {
    return view('eventos');
   });


Route::get('signup',[LoginController::class, 'signupFrom'])->name('signupFrom');
Route::post('signup',[LoginController::class, 'signup'])->name('signup');
Route::get('login',[LoginController::class, 'loginFrom'])->name('loginFrom');
Route::post('login',[LoginController::class, 'login'])->name('login');
Route::post('logout',[LoginController::class, 'logout'])->name('logout');

Route::post('likes', [LikeController::class, 'store'])->name('likes.store');
Route::delete('likes/{id}', [LikeController::class, 'destroy'])->name('likes.destroy');

Route::get('account', function(){
    return view('users.account');
})->name('users.account')->middleware('auth');

Route::get('signup', function () {
    return view('auth.signup');
})->name('signup');

Route::get('locate', function () {
    return view('partials.locate');
})->name('locate');

Route::get('terms', function () {
    return view('partials.terms');
})->name('terms');

Route::get('privacy', function () {
    return view('partials.privacy');
})->name('privacy');

Route::get('/', function () {
    return view('partials.index');
})->name('index');

Route::get('estilos', function () {
    return view('estilos');
})->name('estilos');

Route::resource('events', EventController::class);
Route::resource('messages', MessageController::class);
Route::resource('players', PlayerController::class);
Route::resource('users', UserController::class);
Route::resource('auth', LoginController::class);
