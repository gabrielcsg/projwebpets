<?php

namespace App\Validator;

use \App\Models\Pet;

class PetValidator
{
    public static function validate($data)
    {
        $validator = \Validator::make($data, Pet::$rules, Pet::$messages);

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação de Pet");
        }
        return $validator;
    }
}
