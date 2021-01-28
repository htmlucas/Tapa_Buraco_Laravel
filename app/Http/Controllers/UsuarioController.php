<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
{
   
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuarios.index', compact('usuarios'));
    }

   
    public function create()
    {
        return view('usuarios.criar');
    }

   
    public function store(UsuarioRequest $request)
    {
        Usuario::create($request->all());

        return redirect()->route('usuarios.index');
    }

}
