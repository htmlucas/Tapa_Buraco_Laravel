<?php

namespace App\Http\Controllers;

use App\Reclamacao;
use Illuminate\Http\Request;
use App\Http\Requests\ReclamacaoRequest;
use App\Usuario;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\UpdateConcertoRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ReclamacaoImport;
use App\Exports\ReclamacaoExport;
use Carbon\Carbon; 

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
            $reclamacao->cidade = $request->cidade;
            $reclamacao->numero = $request->numero;
            $reclamacao->obs = $request->observacao;
            $reclamacao->status = "Aberto";
            $reclamacao->agendado = "Em andamento";
            $reclamacao->id_usuario;

            $reclamacao->save();
            // outro método mais facil ->  $reclamacao::create($request->all());

         } catch(\Exception $e){

            return redirect()->route('reclamacoes.index')->with('msg_error','Reclamação não foi enviada!');
        }
        return redirect()->route('reclamacoes.index')->with('msg_success','Reclamacao enviada com sucesso!');

    }

    
    public function update(UpdateRequest $request, $id){
        
        $reclamacao = Reclamacao::find($id);
        
    

        $reclamacao->status = 'Agendado';
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
    public function updateconcerto(UpdateConcertoRequest $request, $id)
    {
        $reclamacao = Reclamacao::find($id);

        $reclamacao->status = $request->status;
        
        $reclamacao->save();

        return redirect()->route('reclamacoes.index');
    }

    public function import(Request $request)
{                               //nome do arquivo
        $file = $request->files->get('file');

        try {
            Excel::import(new ReclamacaoImport,$file);
        } catch (\Exception $ex) {
            return back()->with('msg_error','Importação cancelada, sem cabeçalho na hora de identificar os dados!');
        }

        return back()->with('msg_success','Reclamacao Importado com sucesso!');

    }

    /* public function export()
    {

        return Excel::download(new ReclamacaoExport,'reclamacoes.xls');


    } */

    public function export(Request $request)
    {
        $dateStart = Carbon::parse($request->date_start)->startOfDay();
        $dateEnd = Carbon::parse($request->date_end)->endOfDay();
        $exportFileType = $request->export_file_type;
 

        return Excel::download(new ReclamacaoExport($dateStart,$dateEnd),'reclamacoes.'.$exportFileType);

    }
}
