<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrador') }}
        </h2>
    </x-slot>
    

    <h1 class="text-center my-4" style="font-size: 24px; margin-top: 20px;">Lista de Utilizadores</h1>
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
            <th>Email</th>
            <th>Número de telefone</th>
            <th>Data de nascimento</th>
            <th>Gênero</th>
            <th>Cargo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nTelemovel }}</td>
                <td>{{ $user->dataNascimento }}</td>
                <td>{{ $user->genero }}</td>
                <td>{{ $user->cargo ? 'Sim' : 'Não' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</x-app-layout>
