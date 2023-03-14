<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Utilizador') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form method="POST" action="{{ route('userStore') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Nome')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" placeholder="Nome" name="name" required autofocus />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" placeholder="Email" name="email" required />
                </div>

                <!-- Phone Number -->
                <div class="mt-4">
                    <x-label for="nTelemovel" :value="__('Nº Telemóvel')" />

                    <x-input id="nTelemovel" class="block mt-1 w-full" type="tel" placeholder="Nº Telemóvel" name="nTelemovel" required />
                </div>

                <!-- Date of Birth -->
                <div class="mt-4">
                    <x-label for="dataNascimento" :value="__('Data de Nascimento')" />

                    <x-input id="dataNascimento" class="block mt-1 w-full" type="date" name="dataNascimento" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required />
                </div>

                <!-- Gender -->
                <div class="mt-4">
                    <x-label for="genero" :value="__('Género')" />

                    <select id="genero" name="genero" class="block mt-1 w-full rounded-md">
                        <option disabled selected>Género</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

                <!-- Role -->
                <div class="mt-4">
                    <x-label for="cargo" :value="__('Cargo')" />

                    <select id="cargo" name="cargo" class="block mt-1 w-full rounded-md">
                        <option disabled selected>Cargo</option>
                        <option value="1">Administrador</option>
                        <option value="0">Utilizador</option>
                    </select>
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
