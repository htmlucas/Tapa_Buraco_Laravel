<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Reclamacao, Usuario};
class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'reclamacoes' => Reclamacao::count(),
            'usuarios' => Usuario::count(),
            'funcionarios' => Usuario::where("tipo_usuario","=","funcionario")->count(),                
        ];
        return view('dashboard',compact('counts'));
    }
}
