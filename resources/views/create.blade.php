@extends('layout.app')
@section('content')
 
<div class="container-fluid">
    <main>
            <h1>Reclame Aqui!</h1>       
            <form method="POST" action="{{ route('reclamacoes.store') }}">
                @csrf
                <div class="form-row">
                    <div class="col form-group">
                        <label for="name">Nome</label>
                        <input type="text" id="name" class="form-control" name="nome" placeholder="Informe seu nome completo">
                    </div>
                    <div class="col form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Informe seu email">
                    </div>
                </div>   
                
                <div class="form-row">
                    <div class="col form-group">
                        <label for="endereco">CEP</label>
                        <input type="text" id="cep" size="10" onkeypress="mascara(this, '#####-###')" maxlength="9" name="cep" class="form-control" name="endereco" placeholder="Informe o CEP da rua">
                    </div>
                    <div class="col form-group">
                        <label for="rua">Logradouro</label>
                        <input type="text"  name="rua" class="form-control" id="rua" placeholder="Nome da rua">
                    </div>
                    <div class="col form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Informe o Bairro">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Informe a Cidade">
                    </div>
                    <div class="col form-group">
                        <label for="numero">Numero da Casa</label>
                        <input type="number" class="form-control" name="numero" id="numero" min="1" placeholder="Informe o Numero da Casa">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Coloque o número da casa de refêrencia ao buraco!
                          </small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <label for="obs">Observações</label>
                        <textarea name="observacao" id="obs" class="form-control" cols="30" rows="10" placeholder="Digite mais informação sobre o problema"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <input class="btn btn-success btn-block" type="submit" name="Enviar">       
                </div>
            </form>
    </main>
</div>    
@endsection

@section('js')
    <script>
        function mascara(t, mask){
            var i = t.value.length;
            var saida = mask.substring(1,0);
            var texto = mask.substring(i)
            if (texto.substring(0,1) != saida){
            t.value += texto.substring(0,1);
            }
        }

    $(document).on('blur','#cep',function(){
        let cep = $(this).val();

        $.ajax({
            url:'https://viacep.com.br/ws/'+cep+'/json/',
            method:'GET',
            dataType:'json',
            success: function(data){
               $('#rua').val(data.logradouro);
               $('#bairro').val(data.bairro);
               $('#cidade').val(data.localidade);
            }
        });
    });
    </script>
@endsection