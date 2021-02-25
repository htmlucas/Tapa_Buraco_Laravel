@extends('layout.app')
@section('content')
<div class="container">
    <main>
        <div class="conteudo">
            <h1>Confirmar Concerto!</h1>  
            <form action="{{ route ('reclamacoes.updateconcerto',$reclamacoes->id)}}" method="POST">
                @csrf
                @method('PUT')
                <table class="table table-hover mt-2"> 
                    <tr>
                        <th class="table-active">DATA</th>
                        <td>{{ $reclamacoes->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">RESPONSÁVEL PELO CHAMADO</th>
                        <td>{{ $reclamacoes->nome }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">CEP</th>
                        <td>{{ $reclamacoes->cep }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">RUA</th>
                        <td>{{ $reclamacoes->rua }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">BAIRRO</th>
                        <td>{{ $reclamacoes->bairro }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">CIDADE</th>
                        <td>{{$reclamacoes->cidade}}</td>
                    </tr>
                    <tr>
                        <th class="table-active">NUMERO DA CASA</th>
                        <td>{{$reclamacoes->numero}}</td>
                    </tr>
                    <tr>
                        <th class="table-active">OBSERVAÇÃO</th>
                        <td>{{ $reclamacoes->obs }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">STATUS</th>
                        <td>
                            <select name="status" id="">
                                <option value="0" Selected>Abra para mudar o status</option>
                                <option value="Aberto">Aberto</option>
                                <option value="Concluido">Concluido</option>
                            </select>
                        </td>
                    </tr>    
                    <tr>
                        <th class="table-active">AGENDAMENTO</th>
                        <td>{{ $reclamacoes->agendado }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">FUNCIONARIO RESPONSÁVEL</th>
                        <td>{{ $reclamacoes->usuario->nome }}   </td>
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