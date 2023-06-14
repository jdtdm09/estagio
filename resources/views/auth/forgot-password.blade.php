<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eventos - Esqueceu a Password?</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Esqueceu a Password?</h1>
                                    </div>
                                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 text-center">
                                        {{ __('Esqueceu-se da sua Password? Diz-nos o teu email e enviaremos um link de redefinição de password que permitirá escolher uma nova.') }}
                                    </div>                                    
                                    
                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />
                                    
                                        <form method="POST" action="{{ route('sendEmail') }}" class="user">
                                            @csrf
                                    
                                            <!-- Email Address -->
                                            <div class="form-group">
                                                <x-input-label for="email" />
                                                <x-text-input id="email" class="form-control form-control-user"
                                                    type="email" name="email" :value="old('email')" required autofocus
                                                     placeholder="Email"
                                                />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            
                                            <div class="flex items-center justify-end mt-4">
                                                <button class="btn btn-primary btn-user btn-block">
                                                    {{ __('Link de redifinição de Password') }}
                                                </button>
                                            </div>
                                        </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="register">Crie uma Conta!</a>
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
