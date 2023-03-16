<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Evento') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form method="POST" action="{{ route('eventStore') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="nome" :value="__('Nome')" />

                    <x-input id="nome" class="block mt-1 w-full" type="text" placeholder="Nome" name="nome" required autofocus />
                </div>

                <!-- Descrição -->
                <div class="mt-4">
                    <x-label for="descricao" :value="__('Descrição')" />

                    <x-input id="descricao" class="block mt-1 w-full" type="text" placeholder="Descrição" name="descricao" required />
                </div>

                <!-- Localização -->
                <div class="mt-4">
                    <x-label for="localizacao" :value="__('Localização')" />

                    <x-input id="localizacao" class="block mt-1 w-full" type="text" placeholder="Localização" name="localizacao" required />
                </div>

                <!-- Data e Hora -->
                <div class="mt-4">
                    <x-label for="data_hora" :value="__('Data e Hora')" />

                    <x-input id="data_hora" class="block mt-1 w-full" type="datetime-local" name="data_hora" required />
                </div>

                <!-- Número de Vagas -->
                <div class="mt-4">
                    <x-label for="numero_vagas" :value="__('Número de Vagas')" />

                    <x-input id="numero_vagas" class="block mt-1 w-full" type="number" name="numero_vagas" placeholder="Número Vagas" required />
                </div>

                <!-- Vagas Disponíveis -->
                <div class="mt-4">
                  <x-label for="vagas_disponiveis" :value="__('Vagas Disponíveis')" />
                  <x-input id="vagas_disponiveis" class="block mt-1 w-full" type="number" name="vagas_disponiveis" placeholder="Vagas Disponíveis" required />
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Criar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
