<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EnderecoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Endereco::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cep' => $this->faker->postcode,
            'logradouro' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
            'bairro' => $this->faker->streetName,
            'cidade' => $this->faker->city,
            'estado' => $this->faker->state
        ];
    }
}
