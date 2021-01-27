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
        try {
            \App\Validator\OngValidator::validate($request->all());

            $data = $request->all();
            Ong::create($data);

            return redirect('/ongs');
        } catch (\App\Validator\ValidationException $exception) {
            return redirect('/ongs/cadastro')->withErrors($exception->getValidator())->withInput();
        }
    }

    public function remove($id) {
        $ong = Ong::find($id);
        $ong->delete();
        return redirect('/ongs');
    }
}
