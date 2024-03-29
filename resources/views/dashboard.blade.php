
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
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Eventos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            @if(Auth::check() && Auth::user()->cargo == 1)
            <div class="sidebar-heading">
                Gestão
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Administrador</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gerir:</h6>
                        <a class="collapse-item" href="{{ route('events') }}">Eventos</a>
                        <a class="collapse-item" href="{{ route('users') }}">Utilizadores</a>
                        <a class="collapse-item" href="{{ route('paymentstable') }}">Pagamentos</a>
                        <a class="collapse-item" href="{{ route('notifications') }}">Notificações</a>
                    </div>
                </div>
            </li>
        
            <!-- Divider -->
            <hr class="sidebar-divider">
            @endif

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

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
                            <input id="search-input" type="text" class="form-control bg-light border-0 small" placeholder="Procurar..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <script>
                        // Armazena todos os eventos em uma variável para restaurá-los posteriormente
                        var allEvents = Array.from(document.querySelectorAll(".card"));
                    
                        document.getElementById("search-input").addEventListener("input", function() {
                            var searchTerm = this.value.toLowerCase();
                            var eventContainer = document.getElementById("event-container");
                            var eventCards = eventContainer.querySelectorAll(".card");
                    
                            for (var i = 0; i < eventCards.length; i++) {
                                var eventName = eventCards[i].querySelector("h5").textContent.toLowerCase();
                    
                                if (eventName.includes(searchTerm)) {
                                    eventCards[i].style.display = "block"; // Exibe o evento correspondente
                                } else {
                                    eventCards[i].style.display = "none"; // Oculta o evento que não corresponde
                                }
                            }
                            if (searchTerm === "") {
                                // Se a pesquisa estiver vazia, exibe todos os eventos novamente
                                allEvents.forEach(function(event) {
                                    event.style.display = "block";
                                });
                            }
                        });
                    </script>
                    
                    
                                       

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

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">{{ $count }}</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notificações
                                </h6>
                                @foreach($notifications as $notification)
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">{{ $notification->data }}</div>
                                        <span class="font-weight-bold">{{ $notification->titulo }}</span>
                                        <br />
                                        <span class="small text-black-1000">{{ $notification->assunto }}</span>
                                    </div>
                                </a>
                                @endforeach
                                {{-- <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas as Notificações</a> --}}
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    @auth
                                        {{ Auth::user()->name }}
                                    @endauth
                                </span>
                                <img class="img-profile rounded-circle" src="{{ Auth::user()->avatar ? '/storage/'.Auth::user()->avatar : '/img/undraw_profile.svg' }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="{{ route('paymentsregister')}}">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Pagamentos
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <style>
                        .img-fluid {
                            transform: scale(1);
                            transition: transform 0.2s ease-in-out;
                        }
                        .img-fluid:hover {
                            transform: scale(1.1);
                        }
                    </style>
                    
                    <div id="event-container" class="row">
                        @foreach ($events as $event)
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">
                                            <a href="{{ url('/eventshow/' . $event->id) }}">{{ $event->nome }}</a>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ url('/eventshow/' . $event->id) }}">
                                            <img class="img-fluid mb-2" src="{{ asset($event->imagem) }}" alt="Evento">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
           
                     
                </div>  
            </div> 
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Eventos 2023</span>
                            </div>
                        </div>
                    </footer>
                
                </div>
                <!-- /.container-fluid -->
                
                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Selecione "Sair" se estiver pronto para terminar a sua sessão atual.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <div style="align-self:center">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">{{ __('Sair') }}</button>
                                </form>
                            </div>
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