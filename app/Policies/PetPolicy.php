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

    public function removerInteresse(User $user, Pet $pet)
    {
        if (!($user->tipo == 'interessado')) return false;

        $success = false;
        $pets = $user->interessado->interesses;
        foreach ($pets as $p) {
            if ($p->id == $pet->id) {
                $success = true;
                break;
            }
        }

        return $success;
    }

    public function listarInteressados(User $user, Pet $pet)
    {
        return $user->tipo == 'ong' && $user->ong->id == $pet->ong_id;
    }
}
