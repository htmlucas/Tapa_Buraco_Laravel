@extends('layout.login')
@section('content')      
<form action="{{ route('login.login')}}" method="POST">
    
        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="E-MAIL">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="SENHA">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Login</button>
        </div>
    
    </form>


@endsection