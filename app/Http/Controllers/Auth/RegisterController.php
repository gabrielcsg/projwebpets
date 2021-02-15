<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Endereco;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Validator\InteressadoValidator;
use App\Validator\OngValidator;
use App\Models\Interessado;
use App\Models\Ong;
use App\Validator\EnderecoValidator;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipo' => ['required'],
        ]);
    }


    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tipo' => $data['tipo']
        ]);

        $data_endereco = [
            'cep'=> $data['cep'],
            'logradouro'=> $data['logradouro'],
            'numero'=> $data['numero'],
            'bairro'=> $data['bairro'],
            'cidade'=> $data['cidade'],
            'estado'=> $data['estado'],
        ];

        EnderecoValidator::validate($data_endereco);
        $endereco = Endereco::create($data_endereco);

        if ($user->tipo == 'interessado') {
            $data_interessado = [
                'nome' => $data['nome'],
                'data_nascimento' => $data['data_nascimento'],
                'telefone' => $data['telefone'],
                'user_id' => $user->id,
                'endereco_id' => $endereco->id
            ];
            InteressadoValidator::validate($data_interessado);
            Interessado::create($data_interessado);
        } else if ($user->tipo == 'ong') {
            $data_ong = [
                'nome_fantasia' => $data['nome_fantasia'],
                'user_id' => $user->id,
                'endereco_id' => $endereco->id,
            ];
            OngValidator::validate($data_ong);
            Ong::create($data_ong);
        }

        return $user;
    }
}
