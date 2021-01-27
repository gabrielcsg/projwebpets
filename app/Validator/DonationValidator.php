<?php

namespace App\Validator;

use \App\Models\Donation;

class DonationValidator
{
    public static function validate($data)
    {
        $validator = \Validator::make($data, Donation::$rules, Donation::$messages);

        if (!$validator->errors()->isEmpty()) {
            throw new ValidationException($validator, "Erro na validação de Doação");
        }
        return $validator;
    }
}
