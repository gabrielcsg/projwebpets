<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ong extends Model
{
    use HasFactory;

    public function pets() {
        return $this->hasMany("\App\Models\Pet");
    }

    public function donations() {
        return $this->hasMany("\App\Models\Donation");
    }
}
