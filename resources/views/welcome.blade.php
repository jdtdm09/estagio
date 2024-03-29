
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://kit.fontawesome.com/bdbff2d269.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>

    <title>Eventos</title>
    
    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    @if(session('message'))
    <div class="alert alert-danger" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
        {{ session('message') }}
    </div>

    <script>
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 3500); // 3500 milliseconds = 3.5 seconds
    </script>
    @endif

    @if(session('mensagem'))
    <div class="success-message" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #dff0d8; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); z-index: 9999;">
        <p>{{ session('mensagem') }}</p>
    </div>

    <script>
        setTimeout(function() {
            document.querySelector('.success-message').remove();
        }, 3500); // 3500 milliseconds = 3,5 seconds
    </script>
    @endif

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-level-up"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="text-transform: capitalize;">EventWorld</div>
            </a>    

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link">
                    <span></span></a>
            </li>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img
                class="sidebar-card-illustration mb-2"
                src="img/register.png"
                alt="..."
                />
                <p class="text-center mb-2">
                <strong>Eventos</strong> - Cria a tua conta para teres acesso a todas as Atualizações e Notificações sobre os Eventos disponíveis!
                </p>
                <a class="btn btn-success btn-sm" href="{{ route('register') }}">Criar Conta!</a>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form id="search-form" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input id="search-input" type="text" class="form-control bg-light border-0 small" placeholder="Procurar..." aria-label="Search" aria-describedby="basic-addon2" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Eventos</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registo</a>
                            @endif
                        @endauth
                        @endif
                    </ul>
                </nav>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                    
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div id="event-container" class="row">
                        @if ($events)
                            @foreach ($events as $event)
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">
                                                {{ $event->nome }}
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <img class="img-fluid mb-2" src="{{ asset($event->imagem) }}" alt="Evento">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Nenhum evento encontrado</p>
                        @endif
                    </div>
                </div>  
            </div>
        </div>              
                

    <!-- Bootstrap core JavaScript-->
    <script src="..\..\vendor\jquery\jquery.min.js"></script>
    <script src="vendor\bootstrap\js\bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor\jquery-easing\jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>