<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="my-4">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" style="border-color:#d1d5db" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-4 form-input">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" style="border-color:#d1d5db" class="block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex mb-4">
            <!-- Número de Telemóvel -->
            <div class="w-half mr-4">
              <x-input-label for="nTelemovel" :value="__('Nº Telemóvel')" />
              <x-text-input id="nTelemovel" style="border-color:#d1d5db" class="block" type="text" name="nTelemovel" :value="old('nTelemovel')" required autofocus autocomplete="nTelemovel" />
              <x-input-error :messages="$errors->get('nTelemovel')" class="mt-2" />
            </div>
            
            <!-- Data de Nascimento -->
            <div class="w-half ml-4">
              <x-input-label for="dataNascimento" :value="__('Data de Nascimento')" />
              <input id="dataNascimento" style="border-color:#d1d5db" class="block rounded-md" type="date" name="dataNascimento" :value="old('dataNascimento')" required autofocus autocomplete="off" />
              <x-input-error :messages="$errors->get('dataNascimento')" class="mt-2" />
            </div>
        </div>
          
        <!-- Género -->
        <div class="mb-4">
            <x-input-label for="genero" :value="__('Género')" />
            <select id="genero" name="genero" class="block w-full rounded-md border-gray-300 shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Selecione uma opção</option>
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
                <option value="Outro">Outro</option>
            </select>
            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
        </div>




        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" style="border-color:#d1d5db" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Repetir Password')" />

            <x-text-input id="password_confirmation" style="border-color:#d1d5db" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Já tens conta?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registar') }}
            </x-primary-button>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>
</x-guest-layout>
