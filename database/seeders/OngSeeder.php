<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OngSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ongs')->insert([
            'nome_fantasia' => 'Pata Amada Garanhuns',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('ongs')->insert([
            'nome_fantasia' => 'Amigos 4 Patas ST',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
