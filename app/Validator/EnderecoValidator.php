<?php

namespace App\Validator;

use \App\Models\Endereco;

class EnderecoValidator
{
    public static function validate($data)
    {
        $validator = \Validator::make($data, Endereco::$rules, Endereco::$messages);

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação de Endereço");
        }
        return $validator;
    }
}
