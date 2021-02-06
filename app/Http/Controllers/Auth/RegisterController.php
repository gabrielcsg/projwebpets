<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Ong;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Interessado;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipo' => ['required'],
        ]);
    }


    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tipo' => $data['tipo']
        ]);

        if ($user->tipo == 'interessado') {
            $data_interessado = [
                'nome' => $data['nome'],
                'data_nascimento' => $data['data_nascimento'],
                'telefone' => $data['telefone'],
                'endereco_id' => $data['endereco_id'],
                'user_id' => $user->id
            ];
            \App\Validator\InteressadoValidator::validate($data_interessado);
            Interessado::create($data_interessado);
        } else if ($user->tipo == 'ong') {
            $data_ong = [
                'nome_fantasia' => $data['nome_fantasia'],
                'endereco_id' => $data['endereco_id'],
                'user_id' => $user->id,
            ];
            \App\Validator\OngValidator::validate($data_ong);
            Ong::create($data_ong);
        }

        return $user;

    }
}
