<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(" $pokemon->name ") }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="row justify-content-center">
                <div class="col-4 mb-3">
                    <div class="card text-center">
                        <a href="{{ URL::previous() }}"
                            class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Voltar a página
                            anterior</a><br><br>
                        <h5 class="card-title">NOME: {{ $pokemon->name }}</h5>
                    </div>
                </div>

                <div class="col-4 mb-3">
                    <div class="card text-center">
                        <br>
                        <h5 class="card-title">MOVES: </h5>
                        @foreach ($pokemon->moves as $moves)
                            <p>{{ $moves->move->name }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="col-4 mb-3">
                    <div class="card text-center">
                        <br>
                        <h5 class="card-title">BASE STATS: </h5>
                        @foreach ($pokemon->stats as $stats)
                            <p>{{ $stats->stat->name }}: {{ $stats->base_stat }} </p>
                        @endforeach
                    </div>
                </div>

                <div class="col-4 mb-3">
                    <div class="card text-center">
                        <br>
                        <h5 class="card-title">EVOLUTION:</h5>
                        <p>{{ $evolution->chain->species->name }}</p>
                        @foreach ($evolution->chain->evolves_to as $evolves_to)
                            @if (!empty($evolves_to->species))
                                <p>{{ $evolves_to->species->name }} </p>
                                @if (!empty($evolves_to->evolves_to))
                                    @foreach ($evolves_to->evolves_to as $sub_evolves_to)
                                        @if (!empty($sub_evolves_to->species))
                                            <p> {{ $sub_evolves_to->species->name }}</p>
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
