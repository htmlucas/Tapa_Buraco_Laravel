<?php

namespace App\Http\Controllers;

use App\Reclamacao;
use Illuminate\Http\Request;
use App\Http\Requests\ReclamacaoRequest;
use App\Usuario;

class ReclamacoesController extends Controller
{
    public function index(){
        $reclamacoes = Reclamacao::with('usuario')->get();

        return view('index',compact('reclamacoes'));
    }

    public function agendamento(){
        $reclamacoes = Reclamacao::all();

        return view('agendamento',compact('reclamacoes'));

    }

    public function create(){
        return view('create');
    }
    public function edit($id){
        $funcionarios = Usuario::where('tipo_usuario','funcionario')->get();
        $reclamacoes = Reclamacao::find($id);
        return view('agendando',compact('reclamacoes','funcionarios'));
    }
    public function store(ReclamacaoRequest $request){     
        try{
            $reclamacao = new Reclamacao;

            $reclamacao->nome = $request->nome;
            $reclamacao->email = $request->email;
            $reclamacao->cep = $request->cep;
            $reclamacao->rua = $request->rua;
            $reclamacao->bairro = $request->bairro;
            $reclamacao->obs = $request->observacao;
            $reclamacao->status = "Aberto";
            $reclamacao->agendado = "Em andamento...";
            $reclamacao->id_usuario;

            $reclamacao->save();
            // outro método mais facil ->  $reclamacao::create($request->all());

         } catch(\Exception $e){

            return redirect()->route('reclamacoes.index')->with('msg_error','Reclamação não foi enviada!');
        }
        return redirect()->route('reclamacoes.index')->with('msg_success','Reclamacao enviada com sucesso!');

    }

    
    public function update(Request $request, $id){
        
        $reclamacao = Reclamacao::find($id);
        
    

        $reclamacao->status = $request->status;
        $reclamacao->agendado =$request->agendado;
        $reclamacao->id_usuario = $request->id_funcionario;
        
        $reclamacao->save();

        return redirect()->route('reclamacoes.index');
    }

    public function confirm($id)
    {

        $reclamacao = Reclamacao::findOrFail($id);
        $reclamacao->delete();

        return redirect()->route('reclamacoes.index');


    }

    public function ordens($id){
        
        $reclamacoes = Reclamacao::where('id_usuario',$id)->get();

        return view('funcionario.ordens',compact('reclamacoes'));
    }

    public function concerto($id){
        $reclamacoes = Reclamacao::find($id);
        $usuario = Usuario::where('id',$reclamacoes->id_usuario)->get();
        
        return view('funcionario.concerto',compact('reclamacoes','usuario'));
    }
    public function updateconcerto(Request $request, $id)
    {
        $reclamacao = Reclamacao::find($id);

        $reclamacao->status = $request->status;
        
        $reclamacao->save();

        return redirect()->route('reclamacoes.index');
    }
}
