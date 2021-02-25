<?php

namespace Database\Factories;

use App\Models\Ong;
use App\Models\User;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class OngFactory extends Factory
{
    public function definition()
    {
        $user = User::create([
            'email' => $this->faker->companyEmail,
            'password' => $this->faker->password,
            'tipo' => 'ong'
            ]);
            
        return [
            'nome_fantasia' => $this->faker->company,
            'user_id' => $user->id,
            'endereco_id' => Endereco::factory(1)->create()->first->id
        ];
    }
}
