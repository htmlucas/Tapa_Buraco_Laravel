@extends('layout.app')
@section('content')
    
    <div class="container-fluid">
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
                                    <td>{{ $reclamacao->created_at->format('d/m/Y') }}</td>
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

                    {{-- <div class="row m-2">
                        <div class="col-12">
                            <a href="{{ route('reclamacoes.export')}}" class="btn btn-success">Exportar para csv</a>
                        </div>
                    </div> --}}

                    <div class="row m-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    Exportação
                                </div>
                                <div class="card-body">
                                    <form action="{{route('reclamacoes.export')}}" method="POST">
                                        @csrf 
                                        <div class="row align-items-end justify-content-center">
                                            <div class="col-12 col-sm-3">
                                                <label for="">Data Inicial</label>
                                                <input type="text" name="date_start" class="form-control">
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <label for="">Data Final</label>
                                                <input type="text" name="date_end" class="form-control">
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <label for="">Tipo de Arquivo de Exportação</label>
                                                <select class="form-control" name="export_file_type" id="">
                                                    <option value="csv">CSV</option>
                                                    <option value="xls">XLS</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <button type="submit" class="btn btn-success">Exportar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>            
    </div>
@endsection            
                       
