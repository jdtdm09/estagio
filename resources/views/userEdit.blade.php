<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Utilizador') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form method="POST" action="{{ route('userUpdate', $user->id) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
                </div>

                <!-- Phone Number -->
                <div class="mt-4">
                    <x-label for="nTelemovel" :value="__('Phone Number')" />

                    <x-input id="nTelemovel" class="block mt-1 w-full" type="text" name="nTelemovel" :value="$user->nTelemovel" required />
                </div>

                <!-- Date of Birth -->
                <div class="mt-4">
                    <x-label for="dataNascimento" :value="__('Date of Birth')" />

                    <x-input id="dataNascimento" class="block mt-1 w-full" type="date" name="dataNascimento" :value="$user->dataNascimento" required />
                </div>

                <!-- Gender -->
                <div class="mt-4">
                    <x-label for="genero" :value="__('Gender')" />

                    <select id="genero" name="genero" class="block mt-1 w-full rounded-md">
                        <option value="Masculino" @if($user->genero == 'Masculino') selected @endif>Masculino</option>
                        <option value="Feminino" @if($user->genero == 'Feminino') selected @endif>Feminino</option>
                        <option value="Outro" @if($user->genero == 'Outro') selected @endif>Outro</option>
                    </select>
                </div>

                <!-- Role -->
                <div class="mt-4">
                    <x-label for="cargo" :value="__('Role')" />

                    <select id="cargo" name="cargo" class="block mt-1 w-full rounded-md">
                        <option value="1" @if($user->cargo) selected @endif>Administrador</option>
                        <option value="0" @if(!$user->cargo) selected @endif>Utilizador</option>
                    </select>
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
