@extends('layout.app')
@section('content')
    
    <div class="container-fluid">
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
                    <h1 class="h1 d-flex justify-content-center">Lista de Reclamações</h1>
                    <table class="table table-bordered table-hover mt-2">
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
                                @if(auth()->user())
                                    @if(auth()->user()->tipo_usuario == 'admin')
                                        <th colspan="2">Confirmar concerto?</th>
                                    @endif
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reclamacoes as $reclamacao)
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
                                    <td>{{ $reclamacao->agendado }}</td>
                                   
                                     <!-- Verificar se a reclamacao ja tem um funcionario vinculado, caso não, ele não mostrará  -->
                                    @if($reclamacao->id_usuario != '')
                                        <td>{{ $reclamacao->usuario->nome }}</td>
                                    @else 
                                        <td>Nenhum Funcionário</td>
                                    @endif
                                        <!-- Verificar se o usuario logado é adminitrador, caso sim mostrará botão para confirmar o concerto (excluir)  -->
                                    @if(auth()->user())
                                        @if(auth()->user()->tipo_usuario == 'admin')
                                            <td >
                                                    <form action="{{ route('reclamacoes.confirm', $reclamacao->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Confirmar</button>
                                                    </form>    
                                            </td>
                                        @endif
                                    @endif
                                </tr>

                            @endforeach

                        </tbody>
                    
                    </table>
                </div>
            </div>
        </div>            
    </div>
@endsection            
                       
