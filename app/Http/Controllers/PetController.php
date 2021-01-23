<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function listAll()
    {
        $pets = Pet::all();

        return view('listPets', ['pets' => $pets]);
    }

    public function insert(Request $request)
    {
        if ($request->method() == 'GET') {
            $ongs = \App\Models\Ong::all();
            return view('formPet', ['ongs' => $ongs]);
        }
        $dados = $request->all();

        Pet::create([
            "nome" => $dados['nome'],
            "descricao" => $dados['descricao'],
            "ong_id" => $dados['ong_id'],
            "limite_de_candidatos" => $dados['limite_de_candidatos'],
            "disponivel" => true,
        ]);

        return redirect('/pets');
    }

    public function remove($id)
    {
        $pet = Pet::find($id);
        $pet->delete();
        return redirect('/pets');
    }
}
