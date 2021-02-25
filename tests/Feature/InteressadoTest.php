<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Interessado;
use App\Models\Pet;

class InteressadoTest extends TestCase
{
    public function inicializaInteressado() {
        $interessado = Interessado::factory()->create();
        return $interessado;
    }

    public function testInteressadoLogadoAcessaListaPets () {
        $interessado = $this->inicializaInteressado();
        $user = $interessado->user;
        $response = $this
            ->actingAs($user)
            ->get('/')
            ->assertStatus(200);
    }

    public function testInteressadoLogadoCandidaturaPet () {
        $pet = Pet::factory()->create();
        $user = $this->inicializaInteressado()->user;
        $response = $this
            ->actingAs($user)
            ->get('/pets/candidatar/' . strval($pet->id))
            ->assertStatus(302);
    }
}
