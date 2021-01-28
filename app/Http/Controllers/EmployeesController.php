<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;

class EmployeesController extends Controller
{
    public function index()
    {
        return view ('funcionarios.index');
    }
    public function create() 
    {
        
        return view('funcionarios.create');
    }

    public function store(Request $request)
    {
       Funcionario::create($request['employee']);
      

       return redirect()->route('employees.index')->with('msg_success','Funcionario cadastrado com sucesso!');
    }

}
