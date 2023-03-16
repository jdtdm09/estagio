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
    max-width: 450px;
    flex: 1;
    flex-basis: calc(25%);
    width: 100px;
    height: auto;
}


.evento:hover {
    background-color: #f1f1f1;
    transition: background-color 0.3s ease-in-out;
}

.evento h1 {
    font-size: 24px;
    margin-bottom: 10px;
    text-align: center;
}

.evento-info {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.evento-info div {
    margin-bottom: 10px;
}

.evento-info strong {
    display: inline-block;
    min-width: 150px;
    font-weight: bold;
}

.evento-localizacao,
.evento-data,
.evento-vagas,
.evento-disponiveis {
    display: flex;
    align-items: center;
}

.evento-localizacao strong,
.evento-data strong,
.evento-vagas strong,
.evento-disponiveis strong {
    margin-right: 10px;
}

.evento-localizacao svg,
.evento-data svg,
.evento-vagas svg,
.evento-disponiveis svg {
    margin-right: 5px;
    fill: #9ca3af;
}

.evento-localizacao svg,
.evento-disponiveis svg {
    height: 1.2em;
    width: 1.2em;
}

.evento-data svg,
.evento-vagas svg {
    height: 1.4em;
    width: 1.4em;
}

.evento-localizacao {
    font-size: 18px;
}

.evento-data {
    font-size: 20px;
}

.evento-vagas,
.evento-disponiveis {
    font-size: 16px;
}

.evento-vagas strong {
    color: #4b5563;
}

.evento-disponiveis strong {
    color: #059669;
}
</style>
