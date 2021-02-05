<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interessado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'data_nascimento', 
        'telefone',
        'user_id'
    ];

    public static $rules = [
        'nome' => 'required|min:3|max:100',
        'data_nascimento' => 'required',
        'telefone' => 'required',
    ];

    public static $messages = [
        'nome.*' => 'O nome é obrigatório e deve ter entre 3 à 100 caracteres',
        'data_nascimento.required' => 'A data de nascimento é obrigatória',
        'telefone.required' => 'O telefone é obrigatório',
    ];

    public function endereco(){
    	return $this->belongsTo("\App\Models\Endereco");
    }
    
    public function user() {
        return $this->belongsTo('\App\Models\User');
    }
}
