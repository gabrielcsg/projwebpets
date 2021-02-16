<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Interessado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function listAll()
    {
        $pets = Pet::all();
        
        // buscando o interessado associado ao usuario
        $interessado = Interessado::where('user_id', '=', \Auth::user()->id)->get()[0];

        // lista dos pets que se tem interesse
        $petsIds = DB::select("select distinct pet_id from interessados_pets where interessado_id=".strval($interessado->id).";");  
        $petsInteressados = array();
        foreach ($pets as $pet){
            foreach ($petsIds as $petId) {
                if ($pet->id == intval($petId->pet_id)) {
                    array_push($petsInteressados, $pet);
                }
            }
        }
        
        return view('listPets', ['pets' => $pets, 'petsInteressados' => $petsInteressados]);
    }

    public function insert(Request $request)
    {
        if ($request->method() == 'GET') {
            $ongs = \App\Models\Ong::all();
            return view('formPet', ['ongs' => $ongs]);
        }

        try {
            \App\Validator\PetValidator::validate($request->all());
            $dados = $request->all();//home

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
        $user = \Auth::user();
        // somente se for tipo interessado
        if ($user->tipo == 'interessado')
        {
            // buscando o interessado associado ao usuario
            $interessado = Interessado::where('user_id', '=', \Auth::user()->id)->get()[0]; 
            
            // salvando na  tabela a relacao de interesse
            DB::table('interessados_pets')->insert([
                'interessado_id' => $interessado->id,
                'pet_id' => $pet_id
            ]);
        }
        
        return redirect('/pets');
    }
    
    public function retirarInteresse($pet_id) 
    {
        $interessado = Interessado::where('user_id', '=', \Auth::user()->id)->get()[0];
        DB::statement("delete from interessados_pets where pet_id=".strval($pet_id)." and  interessado_id=".strval($interessado->id));
        
        return redirect('/pets');
    }
}
