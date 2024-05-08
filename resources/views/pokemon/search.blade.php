<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Pokemons (name or ID)') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="row justify-content-center">
                <div class="col-4 mb-3">
                    <div class="card text-center">
                        <form action="/search-result" method="GET">
                            <label for="pokemon">Digite o nome ou ID do Pokémon:</label><br>
                            <input type="text" id="pokemon" name="pokemon" value="{{ old('pokemon') }}">
                            <button class="bg-green-500 hover:bg-green-700 font-bold py-2 px-4 rounded"
                                type="submit">Buscar</button>
                        </form>

                        @if (!empty($error))
                            <div class="error-message">{{ $error }}</div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
