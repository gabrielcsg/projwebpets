<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Endereco;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Endereco::factory(10)->has(\App\Models\Interessado::factory())->create();
    }
}
