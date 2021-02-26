<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Pet;

class PetTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCadastrarPet()
    {
        $this->browse(function ($browser) {
            $ong = User::where('tipo','=','ong')->first();
            $browser->loginAs($ong)
                ->visit('/pets')
                ->pause(3000)
                ->visit('/pets/cadastro')->assertPathIs('/pets/cadastro')
                ->type('nome', "Cãozinho")
                ->type('descricao', "Um cão pequeno")
                ->type('limite_de_candidatos', "4")
                ->press('confirmar')   
                ->pause(2000);     
        }); 
    }
}
