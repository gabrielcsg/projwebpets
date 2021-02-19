<?php

namespace Database\Factories;

use App\Models\Pet;
use App\Models\Ong;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    public function definition()
    {
        return [
            'nome' => $this->faker->firstName,
            'descricao' => $this->faker->text($maxNbChars=50),
            'ong_id' => Ong::factory(1)->create()->first->id,
            'limite_de_candidatos' => $this->faker->randomDigitNot(0),
            'disponivel' => true
        ];
    }
}
