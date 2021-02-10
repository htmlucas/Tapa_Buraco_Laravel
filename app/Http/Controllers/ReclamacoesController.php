<?php

namespace App\Http\Controllers;

use App\Reclamacao;
use Illuminate\Http\Request;
use App\Http\Requests\ReclamacaoRequest;
use App\Composicao;

class ReclamacoesController extends Controller
{
    public function index(){
        $reclamacoes = Reclamacao::all();

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

        $reclamacoes = Reclamacao::find($id);
        return view('agendando',compact('reclamacoes'));
    }
    public function store(ReclamacaoRequest $request){     
        try{
            $reclamacao = new Reclamacao;

            $reclamacao->nome = $request->nome;
            $reclamacao->email = $request->email;
            $reclamacao->cep = $request->cep;
            $reclamacao->rua = $request->rua;
            $reclamacao->bairro = $request->bairro;
            $reclamacao->observacao = $request->observacao;
            $reclamacao->status = "Aberto";
            $reclamacao->agendado = "Em andamento...";

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
        
        $reclamacao->save();

        return redirect()->route('reclamacoes.index');
    }

    public function confirm($id)
    {

        $reclamacao = Reclamacao::findOrFail($id);
        $reclamacao->delete();

        return redirect()->route('reclamacoes.index');


    }
}
