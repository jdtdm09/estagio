<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrador') }}
        </h2>
    </x-slot>
    
    

    <h1 class="text-center my-4" style="font-size: 24px; margin-top: 20px;">Lista de Eventos</h1>
    <br />
    <div class="text-left my-4 textbonito">
        <a class="underline-on-hover inlinediv" href="{{ route('eventCreate') }}">Criar Evento</a>
    </div>
    <table style="margin: 20px auto 0;">
    <thead>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 10px;
                text-align: center;
            }
        </style>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Localização</th>
            <th>Data e Hora</th>
            <th>Número de Vagas</th>
            <th>Vagas Disponíveis</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)    
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->nome }}</td>
                <td>{{ $event->descricao }}</td>
                <td>{{ $event->localizacao }}</td>
                <td>{{ $event->data_hora }}</td>
                <td>{{ $event->numero_vagas }}</td>
                <td>{{ $event->vagas_disponiveis }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</x-app-layout>
