@extends('layout.app')
@section('content')

    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header">
                Dashboard
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Reclamacoes cadastradas
                            </div>
                            <div class="card-body">
                                {{$counts['reclamacoes']}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Usuarios cadastrados 
                            </div>
                            <div class="card-body">
                                {{$counts['usuarios']}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Funcionarios cadastrados
                            </div>
                            <div class="card-body">
                            {{$counts['funcionarios']}}
                            </div>
                        </div>                        
                    </div>

                    <!-- IMPORTAR ARQUIVO -->
                    <div class="col-12 col-sm-6">

                    <form action="{{ route('reclamacoes.import')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                                                        <!-- -->
                        <div class="card">
                            <!--HEADER -->
                            <div class="card-header">
                                Importar Arquivo CSV
                            </div>
                            <!--BODY -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                             <!-- input -->
                                            <input type="file" name="file" class="custom-file-input" id="file-input">
                                            <label class="custom-file-label" for="file-input" data-browse="Procurar">Procurar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!-- SUBMIT -->
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success">Importar</button>
                            </div>                            
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
            <div class="row mt-4">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Relatorios
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            Funcionario
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('reports.employees')}}" method="GET">
                                                <div class="row align-items-end">
                                                    <div class="col-12 col-sm-4">
                                                        <label for="">Data Inicial</label>
                                                        <input type="text" name="date_start" class="form-control">
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <label for="">Data Final</label>
                                                        <input type="text" name="date_end" class="form-control">
                                                    </div>
                                                    <div class="col-12 col-sm-4">
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
            </div>
        </div>    
@endsection