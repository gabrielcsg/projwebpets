<?php

namespace App\Http\Controllers;

use App\Models\Ong;
use Illuminate\Http\Request;

class OngController extends Controller
{
    public function listAll() {
        $ongs = Ong::all();

        return view('listOngs', ['ongs' => $ongs]);
    }

    public function insert(Request $request) {
        if ($request->method() == 'GET') {
            return view('formOng');
        }

        Ong::create($request->all());
        return redirect('/ongs');
    }

    public function remove($id) {
        $ong = Ong::find($id);
        $ong->delete();
        return redirect('/ongs');
    }
}
