@extends('layout.app')
@section('content')
    
    <div class="container">
        <div class="row">
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
            <div class="row">
                <div class="col-12">
                    <h1 class="h1 d-flex justify-content-center">Lista de trabalhos: {{ auth()->user()->nome }}</h1>
                    <table class="table table-hover table-striped table-dark mt-2">
                        <thead class="">
                            <tr>
                                <th>DATA</th>
                                <th>RESPONSÁVEL PELO CHAMADO</th>
                                <th>CEP</th>
                                <th>RUA</th>
                                <th>BAIRRO</th>
                                <th>OBSERVAÇÃO</th>
                                <th>STATUS</th>
                                <th>AGENDAMENTO</th>
                                <th>Funcionario Responsavel</th>
                                <th>Confirmar concerto?</th>
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
                                    <td>{{ $reclamacao->obs }}</td>
                                    <td>{{ $reclamacao->status }}</td>
                                    <td>{{ $reclamacao->agendado }}</td>
                                    <td>{{ $reclamacao->usuario->nome}}</td>
                                    <td><a class="btn btn-info" href="{{ route('reclamacoes.concerto', $reclamacao->id)}}">Editar</a>
                                                
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
            </div>
        </div>            
    </div>
@endsection            
                       
