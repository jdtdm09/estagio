<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eventos - Registo</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .box {
        font-size: 0.8rem; 
        border-radius: 10rem;
      }
      </style>

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
                                        <h1 class="h4 text-gray-900">Criar conta!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}" class="user">
                                        @csrf

                                        <div class="form-group">
                                            <x-input-label for="name" />
                                            <x-text-input id="name" class="form-control form-control-user"
                                                type="text" name="name" :value="old('name')" required autofocus
                                                autocomplete="name" placeholder="Nome" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>

                                        <div class="form-group">
                                            <x-input-label for="email" />
                                            <x-text-input id="email" class="form-control form-control-user"
                                                type="email" name="email" :value="old('email')" required autofocus
                                                autocomplete="email" placeholder="Email"/>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <x-input-label for="nTelemovel" />
                                                <x-text-input id="nTelemovel" class="form-control form-control-user"
                                                    type="text" name="nTelemovel" :value="old('nTelemovel')" required autofocus
                                                    autocomplete="phone" placeholder="Nº Telemóvel" />
                                                <x-input-error :messages="$errors->get('nTelemovel')" class="mt-2" />
                                            </div>

                                            <div class="col-sm-6">
                                                <x-input-label for="dataNascimento" />
                                                <x-date-input id="dataNascimento" class="form-control form-control-user"
                                                    name="dataNascimento" :value="old('dataNascimento')" required autofocus
                                                    placeholder="Data de Nascimento" />
                                                <x-input-error :messages="$errors->get('dataNascimento')" class="mt-2" />  
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <x-input-label for="genero" />
                                            <select id="genero" name="genero" class="form-control box" required autofocus>
                                                <option value="" selected disabled>Selecione uma opção</option>
                                                <option value="Masculino" >Masculino</option>
                                                <option value="Feminino" >Feminino</option>
                                                <option value="Outro">Outro</option>
                                            </select>                                            
                                            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
                                        </div>
                                        

                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <x-input-label for="password" />
                                                <x-password-input id="password" class="form-control form-control-user"
                                                    type="password" name="password" required
                                                    autocomplete="new-password" placeholder="Password"/>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <div class="col-sm-6">
                                                <x-input-label for="password_confirmation" />
                                                <x-password-input id="password_confirmation" class="form-control form-control-user"
                                                    type="password" name="password_confirmation" required autocomplete="new-password"
                                                    placeholder="Confirmar Password"/>
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>
                                        </div>

                                            <br />

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
