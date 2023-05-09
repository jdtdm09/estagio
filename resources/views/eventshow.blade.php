
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">

    <title>Evento - {{$event->nome}}</title>
    
    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Eventos</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            @if(Auth::check() && Auth::user()->cargo == 1)
            <div class="sidebar-heading">
                Interface
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
                        <a class="collapse-item">Pagamentos</a>
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
                    {{-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Procurar..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

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
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notificações
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Abril 12, 2023</div>
                                        <span class="font-weight-bold">Um novo Evento foi adicionado!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Abril 4, 2023</div>
                                        Foram adicionados 13€ á sua Conta!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Março 22, 2023</div>
                                        Alerta: Está com uma quantidade monetária baixa na sua Conta.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas as Notificações</a>
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
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Definições
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Registo de Atividade
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
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-primary display-4">{{ $event->nome }}</h1>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                <img src="{{ asset($event->imagem) }}" alt="{{ $event->nome }}" class="img-fluid">
                            </div>
                    
                            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                                <p class="lead">{{ $event->descricao }}</p>
                                <p><b>Vagas Disponíveis:</b> {{ $event->vagas_disponiveis }}</p>
                                <p><b>Localização:</b> {{ $event->localizacao }}</p>
                                <a href="#" class="btn btn-primary mt-3" data-toggle="modal" data-target="#participarModal">Participar do Evento</a>
                            </div>
                        </div>
                    </div>
                    
                      
                      <!-- Modal -->
                      <div class="modal fade" id="participarModal" tabindex="-1" role="dialog" aria-labelledby="participarModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="participarModalLabel">Participar do Evento</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <p>O Preço para participar deste Evento é de 23€.</p>
                                <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*Opções de Pagamento</strong></p>
                                <select name="opcoes_pagamento" id="opcoes_pagamento" class="custom-dropdown adjust-z-index">
                                  <option value="" selected disabled>Métodos de Pagamento</option>
                                  <option value="cartao_credito">Cartão de Crédito</option>
                                  <option value="mbway">Mbway</option>
                                  <option value="paypal">PayPal</option>
                                </select>
                                <div id="cartao_credito_fields" style="display: none;">
                                    <div class="form-group">
                                        <label for="credit_card_number">Número do cartão de crédito</label>
                                        <input type="text" class="form-control" id="credit_card_number" name="credit_card_number">
                                      </div>
                                      <div class="form-group">
                                        <label for="credit_card_expiration">Data de validade</label>
                                        <input type="text" class="form-control" id="credit_card_expiration" name="credit_card_expiration">
                                      </div>
                                      <div class="form-group">
                                        <label for="credit_card_security_code">Código de segurança</label>
                                        <input type="text" class="form-control" id="credit_card_security_code" name="credit_card_security_code">
                                      </div>
                                </div>
                                <div id="mbway_fields" style="display: none;">
                                    <div class="form-group">
                                        <label for="mbway_phone_number">Número de telefone</label>
                                        <input type="tel" class="form-control" id="mbway_phone_number" name="mbway_phone_number">
                                    </div>
                                </div>
                                <div id="paypal_fields" style="display: none;">
                                    <div class="form-group">
                                        <label for="email_paypal">Email do PayPal:</label>
                                        <input type="text" class="form-control" id="email_paypal" name="email_paypal">
                                    </div>
                                </div>
                              </div> 
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              <button type="button" class="btn btn-primary">Efetuar Pagamento</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script>
                        $(document).ready(function() {
                          $("#opcoes_pagamento").change(function() {
                            var selectedOption = $(this).val();
                            $("#cartao_credito_fields").toggle(selectedOption == "cartao_credito");
                            $("#mbway_fields").toggle(selectedOption == "mbway");
                            $("#paypal_fields").toggle(selectedOption == "paypal");
                          });
                        });
                      </script>
                      
                      <style>
                      .custom-dropdown {
                        background: #f2f2f2;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        box-shadow: none;
                        color: #333;
                        height: 34px;
                        line-height: 34px;
                        padding: 0 30px 0 10px;
                        width: auto !important;
                        -webkit-appearance: none;
                        -moz-appearance: none;
                        appearance: none;
                        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath d='M2.295 3.705a1 1 0 0 1 1.414 0L6 6.293l2.291-2.292a1 1 0 0 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z' fill='%23333'/%3E%3C/svg%3E");
                        background-repeat: no-repeat;
                        background-position: right 10px center;
                      }
                      
                      .custom-dropdown:hover, .custom-dropdown:focus {
                        border: 1px solid #66afe9;
                        box-shadow: none;
                        outline: none;
                      }
                      
                      .custom-dropdown option {
                        background-color: #f2f2f2;
                        color: #333;
                      }
                      </style>
                      
                      
                                           
                    <!-- /.row -->
                
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