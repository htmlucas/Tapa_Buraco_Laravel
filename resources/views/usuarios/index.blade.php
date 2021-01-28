<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="#" class="navbar-brand">ProjetoBuraco</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="{{ route('dashboard.index')}}" class="nav-item nav-link">Dashboard</a>
                <a href="{{ route('reclamacoes.index')}}" class="nav-item nav-link">Reclamacoes</a>
                <a href="{{ route('usuarios.index')}}" class="nav-item nav-link">Usuarios</a>
            </div>
        </div>
        <div class="d-flex allign-items-center">
            <span class="nav-item nav-link">{{ auth()->user()->nome }} </span>
            <div class="">|</div>
            <a href="{{ route('login.logout') }}" class="nav-item nav-link">Sair</a>
        </div>
    </nav>

<div class="container">
    <div class="card">
        <div class="card-header">
            Usuarios
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('usuarios.create') }}" class="btn btn-success">Novo usuario</a>
                </div>
                <div class="col-12 mt-4">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Nível</th>
                                <th>Data de cadastro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                            <tr>
                            <td>{{ $usuario->nome}}</td>
                            <td>{{ $usuario->email}}</td>
                            <td>{{ $usuario->tipo_usuario}}</td>
                            <td>{{ $usuario->created_at->format('d/m/Y')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{asset('js/boostrap.bundle.min.js') }}"></script>    
</body>
</html>