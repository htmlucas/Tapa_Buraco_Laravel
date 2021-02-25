@extends('layout.app')
@section('content')
<div class="container">
    <main>
        <div class="conteudo">
            <h1>Página inicial de atualizar agendamentos !</h1>  
            <form action="{{ route ('reclamacoes.update',$reclamacoes->id)}}" method="POST">
                @csrf
                @method('PUT')
                <table class="table table-hover table-bordered  mt-2"> 
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
                        <th class="table-active">NUMERO</th>
                        <td>{{$reclamacoes->numero}}</td>
                    </tr>
                    <tr>
                        <th class="table-active">OBSERVAÇÃO</th>
                        <td>{{ $reclamacoes->obs }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">STATUS</th>
                        <td>{{ $reclamacoes->status }}</td>
                    </tr>    
                    <tr>
                        <th class="table-active">AGENDAMENTO</th>
                        <td><input type="date" name="agendado"></td>
                    </tr>
                    <tr>
                        <th class="table-active">FUNCIONARIO RESPONSÁVEL</th>
                        <td>
                            <select name="id_funcionario" class="form-select" id="">
                                <option value="" selected>Abra para selecionar o funcionario</option>
                                @foreach($funcionarios as $funcionario )
                                      <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                                @endforeach

                            </select>
                        </td>
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