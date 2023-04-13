<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Criar conta!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}" class="user">
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
                                        <div class="col-md-6">
                                            <x-input-label for="dataNascimento" :value="__('Data de Nascimento')" />
                                            <x-date-input id="dataNascimento" class="form-control form-control-user" name="dataNascimento" :value="old('dataNascimento')" required />
                                            <x-input-error :messages="$errors->get('dataNascimento')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Género -->
                                    <div class="mb-4">
                                        <x-input-label for="genero" :value="__('Género')" />
                                        <select id="genero" name="genero" class="block w-full rounded-md border-gray-300 shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Feminino">Masculino</option>
                                            <option value="Masculino">Feminino</option>
                                            <option value="Outro">Outro</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('genero')" class="mt-2" />
                                    </div>

                                    <div class="form-group">
                                        <!-- Password -->
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-password-input id="password" class="form-control form-control-user" type="password" name="password" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="form-group">
                                        <!-- Confirm Password -->
                                        <x-input-label for="password_confirmation" :value="__('Confirmar Password')" />
                                        <x-password-input id="password_confirmation" class="form-control form-control-user" type="password" name="password_confirmation" required autocomplete="new-password" />
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Criar Conta') }}</button>

                                </form>

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">{{ __('Já tem conta? Inicie Sessão') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>
</html>
