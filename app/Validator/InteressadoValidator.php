<?php

namespace App\Validator;

use \App\Models\Interessado;

class InteressadoValidator
{
    public static function validate($data)
    {
        $validator = \Validator::make($data, Interessado::$rules, Interessado::$messages);

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação de Interessado");
        }
        return $validator;
    }
}
