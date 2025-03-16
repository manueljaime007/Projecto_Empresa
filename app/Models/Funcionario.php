<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    protected $fillable = [
        'nome',
        'sobrenome',
        'idade',
        'telefone',
        'email',
        'id_cargo'
    ];

    public function cargo(){
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }
}
