<?php

namespace App\Validator;

use \App\Models\Ong;

class OngValidator
{
    public static function validate($data)
    {
        $validator = \Validator::make($data, Ong::$rules, Ong::$messages);

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação de Ong");
        }
        return $validator;
    }
}
