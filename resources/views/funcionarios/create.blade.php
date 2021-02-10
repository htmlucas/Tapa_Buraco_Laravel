@extends('layout.app')
@section('content')

    <div class="container">
        <h1>Criar novo Funcionario</h1>
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Nome</label>
                    <input type="text" name="employee[name]" class="form-control" value="{{ old('employee.name','') }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="employee[role]" class="form-control" id="">
                            <option value="tapa-buraco">Tapa Buraco</option>
                            <option value="varre-rua">Varre Rua</option>
                        </select>       
                    </div>
                    <button class="btn btn-success" type="submit" >Enviar</button>
                </div>
            </div>
        </form>
    </div>
@endsection