<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eventos - Nova Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
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
                                    <h1 class="h4 text-gray-900 mb-2">Nova Password</h1>
                                    <p class="mb-4">Insira a nova Password!</p>
                                </div>
                                    <?php 
                                    $url = $_SERVER['REQUEST_URI']; 
                                    $parts = parse_url($url);
                                    $path = trim($parts['path'], '/');
                                    $pathSegments = explode('/', $path);
                                    $userId = end($pathSegments);
                                    ?>
                                    <form method="POST" action="{{ route('updatePassword', ['id' => $userId]) }}" class="user">
                                        @csrf
                                        <!-- Password -->
                                        <div class="form-group">
                                            <x-input-label for="password" />
                                            <x-text-input id="password" class="form-control form-control-user"
                                                type="password" name="password" required placeholder="Password"
                                            />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <!-- Confirm Password -->
                                        <div class="form-group">
                                            <x-input-label for="password" />
                                            <x-text-input id="password_confirmation" class="form-control form-control-user"
                                                type="password" name="password_confirmation" required
                                                 placeholder="Repetir Password"
                                            />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <br />
                                        <hr>
                                        <div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Nova Password') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
</body>

</html>
