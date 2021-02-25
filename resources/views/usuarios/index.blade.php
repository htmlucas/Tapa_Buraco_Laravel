@extends('layout.app')
@section('content')
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
                    <table class="table table-bordered table-hover">
                        <thead class="table-active">
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
@endsection