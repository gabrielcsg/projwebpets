<?php

namespace App\Policies;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PetPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function __construct()
    {
        //
    }

    public function updatePet(User $user, Pet $pet)
    {
        return $user->tipo == 'ong' && $user->ong->id == $pet->ong_id;
    }

    public function removePet(User $user, Pet $pet)
    {
        return $user->tipo == 'ong' && $user->ong->id == $pet->ong_id;
    }

    public function trocarDisponibilidade(User $user, Pet $pet)
    {
        return $user->tipo == 'ong' && $user->ong->id == $pet->ong_id;
    }

}
