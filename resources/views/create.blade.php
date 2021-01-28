<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/indexform.css')}}">
    <title>Caraguatatuba</title>
</head>
<body>
    
    @if($errors)
        @foreach($errors->all() as $error)
            <div class="">{{ $error}}</div>
        @endforeach
    @endif

    <header>
        <div class="conteudo">
            <h1>Reclame Aqui!</h1>
            
        <form method="POST" action="{{ route('reclamacoes.store') }}">
            @csrf
                    <label for="name">Nome<input type="text" id="name" name="nome" placeholder="Informe seu nome completo"></label>
                    <label for="email">E-Mail<input type="email" id="email" name="email" placeholder="Informe seu email"></label>
                    <label for="endereco">Endereço da Rua<input type="text" id="endereco" name="endereco" placeholder="Informe o endereço da rua"></label>
                    <label for="obs">Observação<textarea name="observacao" rows="10" cols="40">Observações adicionais sobre o buraco...</textarea></label>
                    <input class="enviar" type="submit" name="Enviar">       
               </form>
                       
           
        </div>
    </header>
</body>
</html>