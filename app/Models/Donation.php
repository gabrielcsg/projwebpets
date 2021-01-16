<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'valor', 'ong_id'];

    public function ong() {
        return $this->belongsTo("\App\Models\Ong");
    }
}
