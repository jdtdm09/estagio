<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Eventos') }}
        </h2>
    </x-slot>

    <div class="eventos-container">
        @foreach ($events as $event)
            <div class="evento">
                <h1 class="text-center my-4" style="font-size: 24px; margin-top: 20px;">{{ $event->nome }}</h1>
                <div class="evento-info">
                    <div class="evento-localizacao">
                        <strong>Localização:</strong> {{ $event->localizacao }}
                    </div>
                    <div class="evento-data">
                        <strong>Data e Hora:</strong> {{ $event->data_hora }}
                    </div>
                    <div class="evento-vagas">
                        <strong>Número de Vagas:</strong> {{ $event->numero_vagas }}
                    </div>
                    <div class="evento-disponiveis">
                        <strong>Vagas Disponíveis:</strong> {{ $event->vagas_disponiveis }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>

<style>
.eventos-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.evento {
    background-color: #f8f8f8;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    margin: 20px;
    padding: 20px;
    max-width: 600px;
    flex: 1;
    flex-basis: calc(50% - 20px);
}
.evento h1 {
    font-size: 24px;
    margin-bottom: 10px;
}
.evento-info {
    margin-top: 20px;
}
.evento-info div {
    margin-bottom: 10px;
}
.evento-info strong {
    display: inline-block;
    min-width: 150px;
    font-weight: bold;
}
</style>
