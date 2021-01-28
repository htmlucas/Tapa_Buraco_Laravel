<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
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
                <a href="{{ route('usuarios.index')}}" class="nav-item nav-link">Usuarios</a>
            </div>
        </div>
        <div class="d-flex allign-items-center">
            <span class="nav-item nav-link"> </span>
            <div class=""></div>
            <a href="#" class="nav-item nav-link">Sair</a>
        </div>
    </nav>

    <header>
        <div class="conteudo">
            <h1>Página inicial de Agendamentos para Prefeitura !</h1>
            
            <table border="2">
                <thead>
                    <tr>
                        <th>DATA</th>
                        <th>RESPONSÁVEL PELO CHAMADO</th>
                        <th>ENDEREÇO</th>
                        <th>OBSERVAÇÃO</th>
                        <th>STATUS</th>
                        <th colspan="3">AGENDAMENTO</th>
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
                        <td><a href="{{ route('reclamacoes.edit', $reclamacao->id)}}">Editar</a></td>        
                        </tr>
                    @endforeach
                </tbody>
               
            </table>
                       
           
        </div>
    </header>
</body>
</html>