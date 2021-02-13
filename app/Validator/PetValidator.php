<?php

namespace App\Validator;

use \App\Models\Pet;
use Illuminate\Support\Facades\Validator;

class PetValidator
{
    public static function validate($data)
    {
        $rules = Pet::$rules;
        $messages = Pet::$messages;
        if ($data['limite_de_candidatos']) {
            if ($data['limite_de_candidatos'] < 1) {
                $rules['limite_de_candidatos'] = 'integer|min:1';
                $messages['limite_de_candidatos.*'] = 'Deve ser um número inteiro maior que 0';
            }
        }
        $validator = Validator::make($data, $rules, $messages);

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação de Pet");
        }
        return $validator;
    }
}
