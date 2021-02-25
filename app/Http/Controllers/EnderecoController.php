<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Validator\EnderecoValidator;

class EnderecoController extends Controller
{
	public function listAll() {
		$enderecos = Endereco::all();
		return view('enderecos/listEnderecos', ['enderecos' => $enderecos]);
	}

    public function insert() {
    	return view('enderecos/formEndereco');
    }

    public function create(Request $request) {
    	try {
			EnderecoValidator::validate($request->all());
			Endereco::create($request->all());
			return redirect('/enderecos');
		} catch (\App\Validator\ValidationException $exception) {
			return redirect('formEndereco')
				->withErrors($exception->getValidator())
				->withInput();
		}
    }
}
