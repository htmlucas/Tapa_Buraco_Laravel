@extends('layout.app')
@section('content')
<div class="container">
    <main>
        <div class="conteudo">
            <h1>Página inicial de Agendamentos da Prefeitura !</h1>
            
            <table class="table table-hover table-striped table-dark">
                <thead>
                    <tr>
                        <th>DATA</th>
                        <th>RESPONSÁVEL PELO CHAMADO</th>
                        <th>CEP</th>
                        <th>RUA</th>
                        <th>Bairro</th>
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
                            <td>{{ $reclamacao->cep }}</td>
                            <td>{{ $reclamacao->rua }}</td>
                            <td>{{ $reclamacao->bairro }}</td>
                            <td>{{ $reclamacao->observacao }}</td>
                            <td>{{ $reclamacao->status }}</td>
                        <td><a class="btn btn-info ml-4" href="{{ route('reclamacoes.edit', $reclamacao->id)}}">Editar</a></td>        
                        </tr>
                    @endforeach
                </tbody>
               
            </table>
                       
           
        </div>
    </main>
</div>        
@endsection