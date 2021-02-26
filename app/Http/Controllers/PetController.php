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
        $this->authorize('isInteressado');
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

        return view('pets/listPetsInteressado', ['pets' => $petsInteressados]);
    }

    public function listByOng()
    {
        $this->authorize('isOng');
        $ong = Auth::user()->ong;
        $pets = Pet::where('ong_id', '=', $ong->id)->get();
        return view('pets/listPetsOng', ['pets' => $pets]);
    }

    public function insert(Request $request)
    {
        $this->authorize('isOng');
        if ($request->method() == 'GET') {
            return view('pets/formPet');
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
        $this->authorize('removePet', $pet);

        $pet->delete();
        return redirect('/pets');
    }

    public function candidatar($pet_id)
    {
        // somente se for tipo interessado
        $this->authorize('isInteressado');
        // buscando o interessado associado ao usuario
        $interessado = Auth::user()->interessado;

        // salvando na  tabela a relacao de interesse
        DB::table('interessados_pets')->insert([
            'interessado_id' => $interessado->id,
            'pet_id' => $pet_id
        ]);

        return redirect('/interesses');
    }

    public function retirarInteresse($pet_id)
    {
        $interessado = Auth::user()->interessado;

        $pet = Pet::find($pet_id);
        $this->authorize('removerInteresse', $pet);

        DB::statement("delete from interessados_pets where pet_id=" . strval($pet_id) . " and  interessado_id=" . strval($interessado->id));

        return redirect('/interesses');
    }

    public function update(Request $request, $id)
    {
        try {
            $pet = Pet::find($id);
            $this->authorize('updatePet', $pet);

            if ($request->method() == 'GET') {
                return view('pets/formEditPet', ['pet' => $pet]);
            }

            PetValidator::validate($request->all());
            $pet = Pet::find($id);
            $pet->nome = $request['nome'];
            $pet->descricao = $request['descricao'];
            $pet->limite_de_candidatos = $request['limite_de_candidatos'];

            $pet->update();

            return redirect('/pets');
        } catch (\App\Validator\ValidationException $exception) {
            return redirect('/pets/editar/' . $id)->withErrors($exception->getValidator())->withInput();
        }
    }

    public function trocarDisponibilidade($id)
    {
        $pet = Pet::find($id);
        $this->authorize('trocarDisponibilidade', $pet);

        $pet->disponivel = !$pet->disponivel;
        $pet->update();

        return redirect('/pets');
    }

    public function listInteressados($pet_id)
    {
        $pet = Pet::find($pet_id);
        $this->authorize('listarInteressados', $pet);
        $interessados = $pet->interessados;

        return view('interessados/listInteressadosPet', [
            'pet' => $pet,
            'interessados' => $interessados
        ]);
    }

    public function aceitarSolicitacao($pet_id, $interessado_id)
    {
        $pet = Pet::find($pet_id);
        $this->authorize('aceitarSolicitacao', $pet);

        $pet->disponivel = false;
        $pet->dono_id = $interessado_id;

        $pet->update();

        return redirect('/pets');
    }
}
