<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'ong_id',
        'limite_de_candidatos',
        'disponivel',
        'data_adocao',
        'dono_id',
    ];

    public static $rules = [
        'nome' => 'required|min:3|max:100',
        'descricao' => 'required|min:3|max:255',
        'ong_id' => 'required',
    ];

    public static $messages = [
        'nome.*' => 'O nome é obrigatório e deve ter entre 3 à 100 caracteres',
        'descricao.*' => 'A descricao é obrigatória e deve ter entre 3 à 255 caracteres',
        'ong_id.required' => 'A ong é obrigatória',
    ];

    public function ong()
    {
        return $this->belongsTo("\App\Models\Ong");
    }

    public function interessados()
    {
        return $this->belongsToMany('\App\Models\Interessado', 'interessados_pets');
    }

    public function dono()
    {
        return $this->belongsTo("\App\Models\Interessado", "dono_id");
    }
}
