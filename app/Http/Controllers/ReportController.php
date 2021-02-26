<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function generateEmployeesReport(Request $request)
    {
        $funcionarios = new Usuario();
       

            if($request->date_start != ''){
                $dateStart = Carbon::parse($request->date_start)->startOfDay();
                $funcionarios = $funcionarios->where("created_at",">=",$dateStart);
            }
            if($request->date_end != ''){
                $dateEnd = Carbon::parse($request->date_end)->EndOfDay();
                $funcionarios = $funcionarios->where("created_at","<=",$dateEnd);
            }

            $funcionarios = $funcionarios->get();

            return view('reports.employees',compact('funcionarios'));
       
    }
}
