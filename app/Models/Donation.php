<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'valor', 'ong_id'];

    public static $rules = [
        'descricao' => 'required|min:5|max:100',
        'valor' => 'required|double|min:0',
        'ong_id' => 'required'
    ];

    public static $messages = [
        'descricao.*' => 'A descrição é obrigatória e deve ter entre 5 à 100 caracteres',
        'valor.*' => 'O valor é obrigatório e deve ser maior que 0',
        'ong_id.required' => 'A ong é obrigatória'
    ];

    public function ong() {
        return $this->belongsTo("\App\Models\Ong");
    }
}
