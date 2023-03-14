<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Eventos') }}
        </h2>
    </x-slot>
    <head>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
        <h1 class="text-center my-4" style="font-size: 24px; margin-top: 20px;">Lista de Eventos </h1>
        <br />
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
                    <td>{{ $event->localizacao }}</td>
                    <td>{{ $event->data_hora }}</td>
                    <td>{{ $event->numero_vagas }}</td>
                    <td>{{ $event->vagas_disponiveis }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    </x-app-layout>
