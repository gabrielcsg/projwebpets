<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pets')->insert([
            'nome' => 'Amarelao',
            'descricao' => 'viralata tamanho P',
            'ong_id' => 6,
            'disponivel' => true,
            'limite_de_candidatos' => 5,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('pets')->insert([
            'nome' => 'Azulao',
            'descricao' => 'viralata tamanho P',
            'ong_id' => 5,
            'disponivel' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
