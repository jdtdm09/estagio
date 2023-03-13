<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrador') }}
        </h2>
    </x-slot>
    <div class="py-2 mt-4">
        <div class="mx-auto">
            <div class="flex justify-center items-center">
                <div class="flex flex-col w-3/4">
                    <div class="">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                            <div class="px-6 py-4">
                                <h3 class="text-gray-900 dark:text-gray-100 font-semibold mb-2">{{ __('Utilizadores') }}</h3>
                                <a href="{{ route('users') }}" class="text-gray-600 dark:text-gray-400">{{ __('Gerenciar usuários') }}</a>
                              </div>
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                                <div class="px-6 py-4">
                                    <h3 class="text-gray-900 dark:text-gray-100 font-semibold mb-2">{{ __('Eventos') }}</h3>
                                    <p class="text-gray-600 dark:text-gray-400">{{ __('Gerenciar eventos') }}</p>
                                </div>
                            </div>
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                                <div class="px-6 py-4">
                                    <h3 class="text-gray-900 dark:text-gray-100 font-semibold mb-2">{{ __('Notificações') }}</h3>
                                    <p class="text-gray-600 dark:text-gray-400">{{ __('Gerenciar notificações') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
