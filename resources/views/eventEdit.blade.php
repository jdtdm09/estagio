<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Evento') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form method="POST" action="{{ route('eventUpdate', $event->id) }}">
                @csrf
                @method('PUT')

                <!-- Nome -->
                <div>
                    <x-label for="nome" :value="__('Nome')" />

                    <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="$event->nome" required autofocus />
                </div>

                <!-- Descrição -->
                <div class="mt-4">
                    <x-label for="descricao" :value="__('Descrição')" />

                    <x-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" :value="$event->descricao" required />
                </div>

                <!-- Localização -->
                <div class="mt-4">
                    <x-label for="localizacao" :value="__('Localização')" />

                    <x-input id="localizacao" class="block mt-1 w-full" type="text" name="localizacao" :value="$event->localizacao" required />
                </div>

                <!-- Data e Hora -->
                <div class="mt-4">
                    <x-label for="data_hora" :value="__('Data e Hora')" />

                    <x-input id="data_hora" class="block mt-1 w-full" type="datetime-local" name="data_hora" :value="$event->data_hora" required />
                </div>

                <!-- Nímero de Vagas -->
                <div class="mt-4">
                    <x-label for="numero_vagas" :value="__('Número de Vagas')" />

                    <x-input id="numero_vagas" class="block mt-1 w-full" type="number" name="numero_vagas" :value="$event->numero_vagas" required />
                </div>

                <!-- Vagas Disponíveis-->
                <div class="mt-4">
                    <x-label for="vagas_disponiveis" :value="__('Vagas Disponíveis')" />

                    <x-input id="vagas_disponiveis" class="block mt-1 w-full" type="number" name="vagas_disponiveis" :value="$event->vagas_disponiveis" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Atualizar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
