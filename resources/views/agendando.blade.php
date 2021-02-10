@extends('layout.app')
@section('content')
<div class="container">
    <main>
        <div class="conteudo">
            <h1>Página inicial de atualizar agendamentos !</h1>  
            <form action="{{ route ('reclamacoes.update',$reclamacoes->id)}}" method="POST">
                @csrf
                @method('PUT')
                <table class="table table-hover table-striped table-dark mt-2"> 
                    <tr>
                        <th>DATA</th>
                        <td>{{ $reclamacoes->created_at }}</td>
                    </tr>
                    <tr>
                        <th>RESPONSÁVEL PELO CHAMADO</th>
                        <td>{{ $reclamacoes->nome }}</td>
                    </tr>
                    <tr>
                        <th>CEP</th>
                        <td>{{ $reclamacoes->cep }}</td>
                    </tr>
                    <tr>
                        <th>RUA</th>
                        <td>{{ $reclamacoes->rua }}</td>
                    </tr>
                    <tr>
                        <th>BAIRRO</th>
                        <td>{{ $reclamacoes->bairro }}</td>
                    </tr>
                    <tr>
                        <th>OBSERVAÇÃO</th>
                        <td>{{ $reclamacoes->observacao }}</td>
                    </tr>
                    <tr>
                        <th>STATUS</th>
                        <td><input type="text" name="status" value="{{ $reclamacoes->status }}"></td>
                    </tr>    
                    <tr>
                        <th>AGENDAMENTO</th>
                        <td><input type="date" name="agendado"></td>
                    </tr>    
                    <tr>
                        <th colspan="2">
                            <button class="btn btn-success btn-block" type="submit">Atualizar</button>
                        </th>
                    </tr>
                </table>    
            </form>
        </div>
    </main>
</div>        
@endsection