<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $cargos = Cargo::all();
        $funcionarios = Funcionario::all();
        $funcionarios_count = Funcionario::count();
        return view('site.index', compact('funcionarios', 'cargos', 'funcionarios_count'));
    }
}
