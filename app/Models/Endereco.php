<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    public static $rules = [
        'cep' => 'required',
        'logradouro' => 'required',
        'numero' => 'required',
        'bairro' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
    ];

    public static $messages = [
        'cep' => 'O cep é obrigatório',
        'logradouro' => 'O logradouro é obrigatório',
        'numero' => 'O numero é obrigatório',
        'bairro' => 'O bairro é obrigatório',
        'cidade' => 'A cidade é obrigatório',
        'estado' => 'O estado é obrigatório',
    ];

	public function interessado(){
    	return $this->hasOne("\App\Models\Interessado");
    }
}
