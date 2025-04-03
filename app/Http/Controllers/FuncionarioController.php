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

    public function edit(int $id){
        $cargos = Cargo::all();
        $funcionario = Funcionario::where('id', $id)->first();
        if(!empty($funcionario)){
            return view('funcionario.edit', compact('funcionario', 'cargos'));
        }else{
            return redirect()->route('home');
        }
    }

    public function update(Request $request, int $id){
        $data = [
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'idade' => $request->idade,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'id_cargo' => $request->id_cargo
        ];
        Funcionario::where('id', $id)->update($data);
        return redirect()->route('home');
    }

    public function destroy(int $id){
        $funcionario = Funcionario::find($id);
        if(!$funcionario){
            return redirect()->back()->with('error', 'Jogo não encontrado!');
        }
        $funcionario->delete();
        return redirect()->route('home')->with('success', 'Jogo apagado com sucesso!');
    }
}
