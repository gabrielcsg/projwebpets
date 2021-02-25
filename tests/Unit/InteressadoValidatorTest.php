<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Interessado;
use App\Validator\InteressadoValidator;
use App\Validator\ValidationException;

class InteressadoValidatorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    
    public function testInteressadoSemTelefone() {
        $this->expectException(ValidationException::class);
        $interessado = Interessado::factory()->make(['telefone' => '']);
        InteressadoValidator::validate($interessado->toArray());
    }
    
    public function testInteressadoNomeIncorreto() {
        $this->expectException(ValidationException::class);
        $interessado = Interessado::factory()->make(['nome' => '']);
        InteressadoValidator::validate($interessado->toArray());
    }
    
    public function testInteressadoSemDataNascimento() {
        $this->expectException(ValidationException::class);
        $interessado = Interessado::factory()->make(['data_nascimento' => '']);
        InteressadoValidator::validate($interessado->toArray());
    }
    
    public function testInteressadoCorreto() {
        $interessado = Interessado::factory()->make();
        $dados = $interessado->toArray();
        $validator = InteressadoValidator::validate($dados);
        $this->assertTrue(true);
    }
}
