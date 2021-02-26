<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead class="table-active">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nível</th>
                        <th>Data de cadastro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($funcionarios as $funcionario)
                    <tr>
                    <td>{{ $funcionario->nome}}</td>
                    <td>{{ $funcionario->email}}</td>
                    <td>{{ $funcionario->tipo_usuario}}</td>
                    <td>{{ $funcionario->created_at->format('d/m/Y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   <script>
       window.print();
   </script>
</body>
</html>