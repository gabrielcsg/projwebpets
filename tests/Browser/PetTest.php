<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Ong;
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
    
    
    public function testAdotarPet()
    {
        $this->browse(function ($browser) {
            $interessado = User::where('tipo','=','interessado')->first();
            $ong = Ong::where('id','=','1')->first()->user;
            $pet = Pet::where('ong_id','=','1')->first();            
            
            $browser->loginAs($interessado)
                ->visit('/')->assertPathIs('/')
                ->pause(1000)
                ->press('#adotar' . strval($pet->id))
                ->pause(2000);
                
            $browser->loginAs($ong)
                ->visit('/pets')->assertPathIs('/pets')
                ->pause('2000')
                ->press('#candidatos' . strval($pet->id))
                ->pause('2000')
                ->press('#aceitar' . strval($interessado->id))
                ->pause('2000');
        });
    }
}
