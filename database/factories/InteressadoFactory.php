<?php

namespace Database\Factories;

use App\Models\Interessado;
use Illuminate\Database\Eloquent\Factories\Factory;

class InteressadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Interessado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
		    'nome' => $this->faker->name,
		    'data_nascimento' => $this->faker->date,
		    'telefone' => $this->faker->phoneNumber
        ];
    }
}
