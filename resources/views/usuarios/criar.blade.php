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
<div class="container">
    @if($errors->any())
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <div role="alert" class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div class="">{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif   

        <div class="card">
            <div class="card-header">
                Cadastrar usuario
            </div>
            <div class="card-body">
                <form action="{{route('usuarios.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" name="nome" class="form-control" value="{{ old('nome','') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email','') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="password" name="password" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="">Confirmar Senha</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Nível</label>
                        <select name="tipo_usuario" class="form-control">
                            <option {{ old('role','') == 'admin' ? 'selected' : ''}} value="admin">Administrador</option>
                            <option {{ old('role','') == 'usuario' ? 'selected' : ''}} value="usuario" value="">Usuario</option>
                            <option {{ old('role','') == 'usuario' ? 'selected' : ''}} value="funcionario" value="">Funcionario</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
</div>    
    <script src="{{asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{asset('js/boostrap.bundle.min.js') }}"></script>    
</body>
</html>