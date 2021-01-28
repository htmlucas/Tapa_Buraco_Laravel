<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>Caraguatatuba</title>
</head>
<body>    
    <header>
        <div class="conteudo">
            <h1>Página inicial de atualizar agendamentos !</h1>
            
        <form action="{{ route ('reclamacoes.update',$reclamacoes->id)}}" method="POST">
        @csrf
        @method('PUT')
        
        <table border="2">
            
                <tr>
                    <th>DATA</th>
                    <td>{{ $reclamacoes->created_at }}</td>
                </tr>
                <tr>
                    <th>RESPONSÁVEL PELO CHAMADO</th>
                    <td>{{ $reclamacoes->nome }}</td>
                </tr>
                <tr>
                    <th>ENDEREÇO</th>
                    <td>{{ $reclamacoes->endereco }}</td>
                </tr>
                <tr>
                    <th>OBSERVAÇÃO</th>
                    <td>{{ $reclamacoes->observacao }}</td>
                </tr>
                <tr>
                    <th>STATUS</th>
                    <td><input type="text" name="status" value="{{ $reclamacoes->status }}"></td>
                </tr>    
                <tr>
                    <th>AGENDAMENTO</th>
                    <td><input type="date" name="agendado"></td>
                </tr>    
                    
                    
                   
                
                        
                    <tr>
                        
                        
                        
                        
                        
                        
                        <th><button type="submit">Atualizar</button></th>
                    </tr>
              
            
           
        </table>    
        </form>
                       
           
        </div>
    </header>
</body>
</html>