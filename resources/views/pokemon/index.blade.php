<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pokemon first generation') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="row justify-content-center">
                @foreach ($pokemons->results as $pokemon)
                    <div class="col-4 mb-3">
                        <div class="card text-center">
                            <a href="{{ route('pokemon.show', $pokemon->name) }}" class="card-title">NOME:
                                {{ $pokemon->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
