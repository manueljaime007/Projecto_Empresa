<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    /** @use HasFactory<\Database\Factories\CargoFactory> */
    use HasFactory;

    protected $table = 'cargos';

    protected $fillable = ['cargo'];

    public function funcionario(){
        return $this->hasMany(Funcionario::class, 'id_cargo');
    }
}
