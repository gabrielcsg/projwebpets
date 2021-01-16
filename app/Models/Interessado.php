<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interessado extends Model
{
    use HasFactory;
    
    public function endereco(){
    	return $this->belongsTo("\App\Models\Endereco");
    }
}
