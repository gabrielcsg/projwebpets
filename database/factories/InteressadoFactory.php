<?php

namespace Database\Factories;

use App\Models\Interessado;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Endereco;
use App\Models\User;

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
        $user = User::create([
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'tipo' => 'interessado'
            ]);
            
        return [
		    'nome' => $this->faker->name,
		    'data_nascimento' => $this->faker->date,
		    'telefone' => $this->faker->phoneNumber,
		    'user_id' => $user->id,
		    'endereco_id' => Endereco::factory(1)->create()->first->id
        ];
    }
}
