<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ong extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_fantasia',
        'user_id',
        'endereco_id'
    ];

    public static $rules = ['nome_fantasia' => 'required|min:2|max:100'];

    public static $messages = ['nome_fantasia.*' => 'O campo nome_fantasia é obrigatório e deve ter entre 2 à 100 caracteres'];

    public function pets()
    {
        return $this->hasMany("\App\Models\Pet");
    }

    public function donations()
    {
        return $this->hasMany("\App\Models\Donation");
    }

    public function endereco()
    {
        return $this->belongsTo("\App\Models\Endereco");
    }

    public function user() {
        return $this->belongsTo('\App\Models\User');
    }
}
