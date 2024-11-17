<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'doLogin']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'doRegister']);

Route::resource('pokemons', PokemonController::class);

Route::resource('teams', TeamController::class)->middleware('auth');
Route::get('/teams/add-pokemon/{pokemonToAdd}/', [TeamController::class, 'addPokemonForm'])->name('teams.add-pokemon')->middleware('auth');
Route::post('/teams/add-pokemon/{pokemon}/{team}', [TeamController::class, 'addPokemon'])->name('teams.add-pokemon-to')->middleware('auth');
