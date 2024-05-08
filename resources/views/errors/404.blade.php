<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ERROR, pokemon não encontrado ou não existe') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="row justify-content-center">
                <div class="col-4 mb-3">
                    <div class="card text-center">
                        <a href="{{ URL::previous() }}"
                            class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Voltar a página
                            anterior</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
