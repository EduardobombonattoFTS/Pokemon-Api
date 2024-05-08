<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller {

    public function showPokemonsFirstGeneration() {
        $pokemons = $this->pokeApiService->getPokemonFirstGeneration();
        return view('pokemon.index')->with([
            'pokemons' => $pokemons,
        ]);
    }

    public function showPokemon($idOrName) {
        $pokemon = $this->pokeApiService->getPokemon($idOrName);
        $evolution = $this->getEvolutions($pokemon);

        return view('pokemon.show')->with([
            'pokemon' => $pokemon,
            'evolution' => $evolution,
        ]);
    }

    public function searchPokemon() {
        return view('pokemon.search');
    }

    public function resultPokemon(Request $request) {
        $pokemon = $request->input('pokemon');

        if (empty($pokemon)) {
            return view('pokemon.search')->with([
                'error' => 'Por favor, insira o nome ou ID do Pokémon.',
            ]);
        }
        return redirect()->route('pokemon.show', ['idOrName' => $pokemon]);
    }


    public function getEvolutions($pokemon) {
        $evolution = $this->getPokemonSpecies($pokemon->id);
        $evolution_chain = Http::get($evolution->evolution_chain->url)->getBody()->getContents();
        $evolution_chain = json_decode($evolution_chain);
        return $evolution_chain;
    }

    public function getPokemonSpecies($idOrName) {
        $pokemon_specie = $this->pokeApiService->getSpecie($idOrName);
        return $pokemon_specie;
    }
}
