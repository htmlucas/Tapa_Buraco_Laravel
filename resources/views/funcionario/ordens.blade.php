@extends('layout.app')
@section('content')
    
    <div class="container">
        <div class=" row d-flex justify-content-center align-items-center ">

            <!-- Mensagens de erros -->
            @if(session()->has('msg_success'))
            <div class="row mt-3 mb-3">
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('msg_success') }}
                    </div>
                </div>
            </div>
            @endif
            @if(session()->has('msg_error'))
            <div class="row mt-3 mb-3">
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('msg_error') }}
                    </div>
                </div>
            </div>
            @endif
            <!-- Fim das Mensagens de erros -->

            <!-- Começo do conteudo -->
                <div class="col-12">
                    @if($msg == 'Não há registros de trabalhos no nosso sistema!')                 
                        <div class=" mt-2 alert alert-danger d-flex justify-content-center" role="alert">
                        {{ $msg}}
                        </div>                
                    @else
                            <h1 class="h1 d-flex justify-content-center">{{$msg}} : {{ auth()->user()->nome }}</h1>
                            <table class="table table-hover table-bordered mt-2">
                                @foreach($reclamacoes as $reclamacao)
                                <thead class="table-active">
                                    <tr>
                                        <th>DATA</th>
                                        <th>RESPONSÁVEL PELO CHAMADO</th>
                                        <th>CEP</th>
                                        <th>RUA</th>
                                        <th>BAIRRO</th>
                                        <th>CIDADE</th>
                                        <th>NUMERO</th>
                                        <th>OBSERVAÇÃO</th>
                                        <th>STATUS</th>
                                        <th>AGENDAMENTO</th>
                                        <th>Funcionario Responsavel</th>
                                        <th>Confirmar concerto?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                        <!-- Verificar se o status da reclamacao ja foi fechado pelo funcionario -->
                                        @if($reclamacao->status == 'Fechado')
                                        @else
                                            <tr>
                                                <td>{{ $reclamacao->created_at->format('d/m/Y H:i:s') }}</td>
                                                <td>{{ $reclamacao->nome }}</td>
                                                <td>{{ $reclamacao->cep }}</td>
                                                <td>{{ $reclamacao->rua }}</td>
                                                <td>{{ $reclamacao->bairro }}</td>
                                                <td>{{ $reclamacao->cidade }}</td>
                                                <td>{{ $reclamacao->numero }}</td>
                                                <td>{{ $reclamacao->obs }}</td>
                                                <td>{{ $reclamacao->status }}</td>
                                                <td>{{ str_replace('-','/',$reclamacao->agendado) }}</td>
                                                <td>{{ $reclamacao->usuario->nome}}</td>
                                                <td><a class="btn btn-info" href="{{ route('reclamacoes.concerto', $reclamacao->id)}}">Editar</a>
                                                            
                                                </td>
                                            </tr>
                                        @endif 
                                    @endforeach
                                </tbody>
                            
                            </table>
                    @endif
                </div>
        </div>            
    </div>
@endsection            
                     