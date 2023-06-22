
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


    <title>Eventos - Perfil</title>
    
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
                        <a class="collapse-item" href="{{ route('paymentstable')}}">Pagamentos</a>
                        <a class="collapse-item" href="{{ route('notifications')}}">Notificações</a>
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
                                <img class="img-profile rounded-circle" src="{{ $user->avatar ? '/storage/'.$user->avatar : '/img/undraw_profile.svg' }}">
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
                        <div class="container py-5">
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img id="profile-image" class="rounded-circle img-fluid" src="{{ $user->avatar ? '/storage/'.$user->avatar : '/img/undraw_profile.svg' }}" alt="avatar" style="width: 150px; height: 150px; object-fit: cover;">
                                    <h3 class="my-3">
                                      @auth
                                      {{ Auth::user()->name }}
                                      @endauth
                                    </h3>
                                    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
                                      @method('patch')
                                      @csrf
                                  
                                      <label for="avatar">
                                        <i class="fa fa-2x fa-camera"></i>
                                        <input id="avatar" name="avatar" type="file" :value="old('avatar', $user->avatar)" autofocus autocomplete="avatar" style="display: none;"  />
                                        <br/><span style="font-size: 90%" >(Selecione uma imagem)</span>
                                        <br/>
                                        <span id="imageName" style="color:green;"></span>
                                      </label>

                                      <script>
                                        let input = document.getElementById("avatar");
                                        let imageName = document.getElementById("imageName")
                                
                                        input.addEventListener("change", ()=>{
                                            let inputImage = document.querySelector("input[type=file]").files[0];
                                
                                            imageName.innerText = inputImage.name;
                                        })
                                      </script>
                                      
                                  
                                        <div class="flex items-center justify-center gap-4 mt-4">
                                            <x-danger-button class="btn btn-primary">{{ __('Atualizar') }}</x-primary-button>
                                        </div>                                                                               
                                    </form>                                    
                                  </div>                                  
                                </div>
                            </div>
                            <div class="col-lg-8">
                              <div class="card mb-4">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Nome:</p>
                                    </div>
                                    <div class="col-sm-9" style="display: flex; align-items: center;">
                                        <p class="text-muted mb-0" style="flex-grow: 1;">
                                          @auth
                                          {{ Auth::user()->name }}
                                          @endauth
                                        </p>
                                        <i class="fa-solid fa-pen" style="color: #6080eb; cursor: pointer;" data-toggle="modal" data-target="#mudarNome"></i>
                                      </div>                                      
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Email:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                          @auth
                                          {{ Auth::user()->email }}
                                          @endauth</p>
                                      </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Gênero:</p>
                                    </div>
                                    <div class="col-sm-9" style="display: flex; align-items: center;">
                                        <p class="text-muted mb-0" style="flex-grow: 1;">
                                          @auth
                                          {{ Auth::user()->genero }}
                                          @endauth
                                        </p>
                                        <i class="fa-solid fa-pen" style="color: #6080eb; cursor: pointer;" data-toggle="modal" data-target="#mudarGenero"></i>
                                      </div>                                      
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Nº Telemóvel:</p>
                                    </div>
                                    <div class="col-sm-9" style="display: flex; align-items: center;">
                                        <p class="text-muted mb-0" style="flex-grow: 1;">
                                          @auth
                                          {{ Auth::user()->nTelemovel }}
                                          @endauth
                                        </p>
                                        <i class="fa-solid fa-pen" style="color: #6080eb; cursor: pointer;" data-toggle="modal" data-target="#mudarTelemovel"></i>
                                      </div>                                          
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Data de Nascimento:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                          @auth
                                          {{ Auth::user()->dataNascimento }}
                                          @endauth</p>
                                      </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Redefinir Password:</p>
                                    </div>
                                    <div class="col-sm-9" >
                                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                            @csrf
                                            @method('put')
                                    
                                            <div class="d-flex align-items-center">
                                                <x-input-label for="current_password" :value="__('Password Atual:')" class="mr-2 mt-2" />
                                                <x-text-input id="current_password" name="current_password" type="password" style="width: 180px;" class="mt-1 form-control" autocomplete="current-password" />
                                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" /> 
                                            </div>                                                                                                                                  
                                                                                                                                 
                                            <div class="d-flex">
                                                <x-input-label for="password" :value="__('Nova Password:')" class="mr-2 mt-2" />
                                                <x-text-input id="password" name="password" type="password" style="width: 180px;" class="mt-1 form-control" autocomplete="new-password" />
                                                <x-input-error :messages="$errors->updatePassword->get('password')" />
                                            </div>
                                    
                                            <div class="d-flex">
                                                <x-input-label for="password_confirmation" :value="__('Confirmar Password:')" class="mt-2 mr-2" />
                                                <x-text-input id="password_confirmation" name="password_confirmation" type="password" style="width: 180px;" class="mt-1 form-control" autocomplete="new-password" />
                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
                                            </div>
                                    
                                            <div class="flex items-center gap-4">
                                                <x-danger-button class="ml-4 btn btn-primary">{{ __('Guardar') }}</x-primary-button>
                                    
                                                @if (session('status') === 'password-updated')
                                                    <p
                                                        x-data="{ show: true }"
                                                        x-show="show"
                                                        x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-sm text-gray-600 dark:text-gray-400"
                                                    >{{ __('Atualizada.') }}</p>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                  </div>   
                                  <hr>
                                  <div class="row" style="height: 30px; position: relative;">
                                    <x-danger-button style="width: 18%; position: absolute; top: 50%; left: 88%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-danger" data-toggle="modal" data-target="#apagarConta">
                                        {{ __('Apagar Conta') }}
                                    </x-danger-button>
                                  </div>                               
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <?
            /**
            * ! Modals para editar as informações do perfil
            */
            ?>
                <?
                /**
                 * ? Nome
                 */
                ?>
                <div class="modal fade" id="mudarNome" tabindex="-1" role="dialog" aria-labelledby="mudarNomeLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="mudarNomeLabel">Alteração do Nome:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <p>Insira o Nome para o qual pretende atualizar.</p>
                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')

                                <div class="d-flex">
                                    <x-input-label for="name" :value="__('Nome:')" class="mr-1 mt-2" />
                                    <x-text-input id="name" name="name" type="text" style="width: 250px;" class="mt-1 form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <br/>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>

                <?
                /**
                 * ? Gênero
                 */
                ?>
                <div class="modal fade" id="mudarGenero" tabindex="-1" role="dialog" aria-labelledby="mudarGeneroLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="mudarGeneroLabel">Alteração do Gênero:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <p>Insira o Gênero para o qual pretenda atualizar.</p>
                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')

                                <div>
                                    <x-input-label for="genero" />
                                    <select id="genero" name="genero" class="form-control form-control-user" required autofocus>
                                        <option value="" selected disabled>Selecione uma opção</option>
                                        <option value="Masculino" <?php echo $user->genero === 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                                        <option value="Feminino" <?php echo $user->genero === 'Feminino' ? 'selected' : ''; ?>>Feminino</option>
                                        <option value="Outro" <?php echo $user->genero === 'Outro' ? 'selected' : ''; ?>>Outro</option>
                                    </select>                                    
                                    <x-input-error :messages="$errors->get('genero')" class="mt-2" />
                                </div>
                                <br/>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>

                <?
                /**
                 * ? Número Telemóvel
                 */
                ?>
                <div class="modal fade" id="mudarTelemovel" tabindex="-1" role="dialog" aria-labelledby="mudarTelemovelLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="mudarTelemovelLabel">Alteração do Nº Telemóvel:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <p>Insira o Nº Telemóvel para o qual pretende atualizar.</p>
                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')

                                <div class="d-flex" >
                                    <x-input-label for="nTelemovel" :value="__('Nº Telemóvel:')" class="mr-1 mt-2" />
                                    <x-text-input id="nTelemovel" name="nTelemovel" type="text" style="width: 250px;" class="mt-1 form-control" :value="old('nTelemovel', $user->nTelemovel)" required autofocus autocomplete="nTelemovel" />
                                    <x-input-error class="mt-2" :messages="$errors->get('nTelemovel')" />
                                </div>
                                <br/>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>

                <?
                /**
                 * ? Apagar conta
                 */
                ?>
                <div class="modal fade" id="apagarConta" tabindex="-1" role="dialog" aria-labelledby="apagarContaLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="apagarContaLabel">Apagar Conta:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')
                    
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Tem a certeza que deseja apagar a sua conta?') }}
                                </h2>
                    
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Depois de a sua conta ser eliminada, todos os seus pagamentos e acesso a eventos serão eliminados permanentemente. Antes de eliminar a sua conta, faça o download de todos os dados ou informações que deseja reter.') }}
                                </p>
                    
                                <div class="d-flex align-items-center">
                                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                    
                                    <x-text-input style="width: 300px;"
                                        id="password"
                                        name="password"
                                        type="password"
                                        class="mt-1 form-control"
                                        placeholder="{{ __('Password') }}"
                                    />
                    
                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                </div>
                                <br />
                                <div>
                                    <x-danger-button class="btn btn-sm btn-danger">
                                        {{ __('Apagar Conta') }}
                                    </x-danger-button>
                                </div>                                                                                               
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Eventos 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>