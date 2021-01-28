<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Nome</label>
                    <input type="text" name="employee[name]" class="form-control" value="{{ old('employee.name','') }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="employee[role]" class="form-control" id="">
                            <option value="tapa-buraco">Tapa Buraco</option>
                            <option value="varre-rua">Varre Rua</option>
                        </select>
                        
                    </div>
                    <button class="btn btn-success" type="submit" >Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="{{asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{asset('js/boostrap.bundle.min.js') }}"></script> 
</body>
</html>