<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function create()
    {
        $cargos = Cargo::all();
        return view('funcionario.create', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        Funcionario::create($request->all());
        return redirect()->route('home')->with('Sucess', 'Funcionario salvo com sucesso!');
    }
}
