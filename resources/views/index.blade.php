<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Caraguatatuba</title>
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
                @if(auth()->user()->tipo_usuario == 'admin')
                    <a href="{{ route('usuarios.index')}}" class="nav-item nav-link">Usuarios</a>
                @endif
            </div>
        </div>
        <div class="d-flex allign-items-center">
            <span class="nav-item nav-link">{{ auth()->user()->nome }} </span>
            <div class="">|</div>
            <a href="{{ route('login.logout') }}" class="nav-item nav-link">Sair</a>
        </div>
    </nav>
    
    <div class="container">
        
        @if(session()->has('msg_success'))
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    {{ session()->get('msg_success') }}
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>DATA</th>
                            <th>RESPONSÁVEL PELO CHAMADO</th>
                            <th>ENDEREÇO</th>
                            <th>OBSERVAÇÃO</th>
                            <th>STATUS</th>
                            <th>AGENDAMENTO</th>
                            <th>Ao clicar em Confirmar os dados serão excluidos, você confirma o concerto?</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reclamacoes as $reclamacao)
                            <tr>
                                <td>{{ $reclamacao->created_at }}</td>
                                <td>{{ $reclamacao->nome }}</td>
                                <td>{{ $reclamacao->endereco }}</td>
                                <td>{{ $reclamacao->observacao }}</td>
                                <td>{{ $reclamacao->status }}</td>
                                <td>{{ $reclamacao->agendado }}</td>
                                <td>
                                        <form action="{{ route('reclamacoes.confirm', $reclamacao->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Confirmar</button>
                                        </form>    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                <a class="btn btn-warning" href="{{route('reclamacoes.create')}}">Criar uma reclamação!</a>
                <a class="btn btn-danger" href="{{route('reclamacoes.agendamento')}}">Atualizar reclamacoes(pagina da prefeitura)</a>
            </div>
        </div>
        
    </div>
            
                       
           
       
  

<script src="{{asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{asset('js/boostrap.bundle.min.js') }}"></script>
</body>
</html>