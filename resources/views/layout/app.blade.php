<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Slap Hole </title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Slape Hole </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" data-toggle="tooltip" data-placement="bottom" title="Ocultar/Mostrar barra lateral" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                @if(auth()->user())
                    <div class="sb-sidenav-footer text-white">
                        <div class="nav-item">{{ auth()->user()->nome }}</div>
                    </div>                          
                @endif 
            </div>
           
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('login.index') }}">Logar</a>
                        <a class="dropdown-item" href="{{ route('login.logout') }}">Sair</a>
                    </div>
                </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Inicio</div>
                            <a class="nav-link" href="{{ route('dashboard.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <!-- AUTENTICAÇÃO PARA MOSTRAR ÁREA DE FUNCIONARIO -->
                            @if(auth()->user())
                                @if(auth()->user()->tipo_usuario == 'funcionario')
                                
                                <div class="sb-sidenav-menu-heading"><div class="sb-nav-link-icon"><i class="fas fa-hammer mr-2"></i> Interface do Funcionário</div></div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseagenda" aria-expanded="false" aria-controls="collapseagenda">
                                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt mr-2"></i></div>
                                    Agenda 
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseagenda" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <form action="{{route('reclamacoes.ordens',auth()->user()->id)}}" method="POST">
                                            @csrf
                                                <button class="btn btn-link nav-link" type="submit">Trabalhos</button>                                          
                                        </form>
                                    </nav>
                                </div>

                                @endif
                            @endif

                            <div class="sb-sidenav-menu-heading">Interface do Usuário</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsereclamacao" aria-expanded="false" aria-controls="collapsereclamacao">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Reclamações
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsereclamacao" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('reclamacoes.create')}}">Criar uma reclamação</a>
                                    <a class="nav-link" href="{{ route('reclamacoes.index')}}">Reclamações em Aberto</a>
                                    <a class="nav-link" href="{{ route('reclamacoes.encerradas')}}">Reclamações Concluidas</a>
                                </nav>
                            </div>

                            <!-- AUTENTICAÇÃO PARA MOSTRAR ÁREA DE ADMINISTRADOR -->
                            @if(auth()->user())
                                @if(auth()->user()->tipo_usuario == 'admin')

                                <div class="sb-sidenav-menu-heading">Interface do Administrador</div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseadmin" aria-expanded="false" aria-controls="collapseadmin">
                                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                        Administrador
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                <div class="collapse" id="collapseadmin" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{route('reclamacoes.agendamento')}}">Agendar uma reclamação</a>
                                        <a class="nav-link" href="{{ route('usuarios.index')}}">Lista de usuarios no sistema</a>
                                    </nav>
                                </div>
                                @endif                               
                            @endif    
                        </div>
                    </div>
                            @if(auth()->user())
                                <div class="sb-sidenav-footer text-white">
                                    <div class="small">Logado como : {{ auth()->user()->nome }}</div>
                                    <div class="">Tipo de usuário : {{auth()->user()->tipo_usuario}}</div>
                                    @if(auth()->user()->tipo_usuario == 'admin')<i class="fas fa-user-shield"></i>@endif
                                </div>                            
                            @endif 
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                        <!-- ERRORS -->
                        @if($errors->any())
                            <div class="row mt-3 mb-3">
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->all() as $error)
                                            <div class="">{{ $error }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(session()->has('msg_success'))
                        <div class="row mt-3 mb-3">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get('msg_success') }}
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(session()->has('msg_error'))
                        <div class="row mt-3 mb-3">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    {{ session()->get('msg_error') }}
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- FIM DOS ERRORS --> 
                    @yield('content')

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Slape Hole 2020</div>
                            <div>
                                <a href="#">Política de Privacidade</a>
                                &middot;
                                <a href="#">Termos &amp; Condições</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       
        
        
        
        
        <script src="{{asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{asset('js/scripts.js') }}"></script>
        <script>
            $(()=>{
                
              $('[data-toggle="tooltip"]').tooltip();
                 
              
                
            });
            
            </script>    

        @yield('js')
    </body>
</html>
