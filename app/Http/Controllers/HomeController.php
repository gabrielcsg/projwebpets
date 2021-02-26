<?php

namespace App\Http\Controllers;

use App\Models\Ong;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $pets = \App\Models\Pet::all();
        $ongs_all = Ong::all();
        $estados = array();
        $cidades = array();
            
        foreach($ongs_all as $ong) { # todos os estados diferentes
            $estado = $ong->endereco->estado;
            $cidade = $ong->endereco->cidade;
            if (!in_array($estado, $estados)) 
                array_push($estados, $estado);
            
            if (!in_array($cidade, $cidades)) 
                array_push($cidades, $cidade);
        }
        sort($estados); #ordenados em ordem alfabetica  
        sort($cidades);      
        
        if ($request->method() == 'GET') {
            return view('home', ['pets' => $pets, 'estados' => $estados, 'cidades' => $cidades]);
        } elseif ($request->method() == 'POST') {
            $estado = $request['select_estado'];
            $cidade = $request['select_cidade'];
            $ongs_id = array();
            $pets_filtrados = array();
            
            foreach($ongs_all as $ong) {
                #if ($estado == $ong->endereco->estado and $cidade == $ong->endereco->cidade) {
                if (($estado == $ong->endereco->estado and $cidade == $ong->endereco->cidade) or ($estado == $ong->endereco->estado and $cidade == 'null') or ($estado == 'null' and $cidade == $ong->endereco->cidade)) {
                    array_push($ongs_id, $ong->id);
                } 
            }
            
            foreach ($pets as $pet) {
                if (in_array($pet->ong->id, $ongs_id)) {
                    array_push($pets_filtrados, $pet);
                }
            }
            
            return view('home', ['pets' => $pets_filtrados, 'estados' => $estados, 'cidades' => $cidades]);
        }
    }
}
