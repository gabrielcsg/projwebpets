<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Validator\PetValidator;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function listByInteressado()
    {

        $pets = Pet::all();
        // buscando o interessado associado ao usuario
        $interessado = Auth::user()->interessado;

        // lista dos pets que se tem interesse
        $petsIds = DB::select("select distinct pet_id from interessados_pets where interessado_id=" . strval($interessado->id) . ";");
        
        $petsInteressados = array();
        foreach ($pets as $pet) {
            foreach ($petsIds as $petId) {
                if ($pet->id == intval($petId->pet_id)) {
                    array_push($petsInteressados, $pet);
                }
            }
        }

        return view('listPetsInteressado', ['pets' => $petsInteressados]);
    }

    public function listByOng() {
        $ong = Auth::user()->ong;
        $pets = Pet::where('ong_id', '=', $ong->id)->get();
        return view('listPetsOng', ['pets' => $pets]);
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

    public function candidatar($pet_id)
    {
        // somente se for tipo interessado
        if (Auth::user()->tipo == 'interessado') {
            // buscando o interessado associado ao usuario
            $interessado = Auth::user()->interessado;

            // salvando na  tabela a relacao de interesse
            DB::table('interessados_pets')->insert([
                'interessado_id' => $interessado->id,
                'pet_id' => $pet_id
            ]);
        }

        return redirect('/interesses');
    }

    public function retirarInteresse($pet_id)
    {
        $interessado = Auth::user()->interessado;

        DB::statement("delete from interessados_pets where pet_id=" . strval($pet_id) . " and  interessado_id=" . strval($interessado->id));

        return redirect('/interesses');
    }

    public function update(Request $request, $id)
    {
        try {

            if ($request->method() == 'GET') {
                $pet = Pet::find($id);
                return view('pets/formEditPet', ['pet' => $pet]);
            }

            PetValidator::validate($request->all());
            $petAtualizado = Pet::find($id);
            $petAtualizado->nome = $request['nome'];
            $petAtualizado->descricao = $request['descricao'];
            $petAtualizado->limite_de_candidatos = $request['limite_de_candidatos'];

            $petAtualizado->update();

            return redirect('/pets');
        } catch (\App\Validator\ValidationException $exception) {
            return redirect('/pets/editar/' . $id)->withErrors($exception->getValidator())->withInput();
        }
    }

    public function trocarDisponibilidade($id)
    {
        $pet = Pet::find($id);
        $pet->disponivel = !$pet->disponivel;
        $pet->update();

        return redirect('/pets');
    }
}
