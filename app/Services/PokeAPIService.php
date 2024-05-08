<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;
use App\Traits\InteractWithPokeResponse;

class PokeAPIService {
    use ConsumeExternalServices, InteractWithPokeResponse;
    /**
     * URL that send the request
     */
    protected $baseUri;

    public function __construct() {
        $this->baseUri = config('services.poke.base_uri');
    }

    /**
     * Obtain the list of Pokemons
     * @return stdClass
     */
    public function getPokemonFirstGeneration() {
        return $this->makeRequest('GET', 'pokemon', [
            'limit' => 151,
            'offset' => 0,
        ]);
    }

    /**
     * Obtain the details of a pokemon
     * @return stdClass
     */
    public function getPokemon($idOrName) {
        return $this->makeRequest('GET', "pokemon/{$idOrName}");
    }

    /**
     * Forms the basis for at least one Pokémon.
     * @return stdClass
     */
    public function getSpecie($idOrName) {
        return $this->makeRequest('GET', "pokemon-species/{$idOrName}");
    }

    /**
     * Forms the basis for at least one Pokémon.
     * @return stdClass
     */
    public function getEvolutionChain($id) {
        return $this->makeRequest('GET', "evolution-chain/{$id}");
    }
}
