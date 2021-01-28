<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interessado;

class InteressadoController extends Controller
{
    public function listAll() {
        $interessados = Interessado::all();

        return view('listInteressados', ['interessados' => $interessados]);
    }
    
    public function insert() {
    	return view('formInteressado');
    }
    
    public function create(Request $request) {
    	Interessado::create($request->all());
    	return redirect('/interessados');
    }
}
