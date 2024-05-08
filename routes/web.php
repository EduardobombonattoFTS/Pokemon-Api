<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

Route::get('/pokemonList', [PokemonController::class, 'showPokemonsFirstGeneration'])->name('pokemon.index');

Route::get('/pokemon/{idOrName}', [PokemonController::class, 'showPokemon'])->name('pokemon.show');

Route::get('/pokemonSearch', [PokemonController::class, 'searchPokemon'])->name('pokemon.search');

Route::get('/search-result', [PokemonController::class, 'resultPokemon'])->name('pokemon.result');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
