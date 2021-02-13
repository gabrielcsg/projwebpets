<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Validator\PetValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('formPet');
        }

        try {
            $ong = Auth::user()->ong;

            $dados = $request->all();
            $dados['ong_id'] = $ong->id;

            PetValidator::validate($dados);

            Pet::create([
                "nome" => $dados['nome'],
                "descricao" => $dados['descricao'],
                "ong_id" => $dados['ong_id'],
                "limite_de_candidatos" => $dados['limite_de_candidatos'],
                "disponivel" => true,
            ]);

            return redirect('/pets');
        } catch (\App\Validator\ValidationException $exception) {
            return redirect('/pets/cadastro')->withErrors($exception->getValidator())->withInput();
        }
    }

    public function remove($id)
    {
        $pet = Pet::find($id);
        $pet->delete();
        return redirect('/pets');
    }
}
