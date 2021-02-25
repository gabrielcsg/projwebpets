
@extends('layouts.app')

@section('content')
    <body>
        <h1 align="center">Ongs Cadastradas</h1>
        <a href="/ongs/cadastro">Cadastrar nova ONG</a>
        <ul align="center">
            @foreach ($ongs as $ong)
            <li>{{ $ong->nome_fantasia }}
            </li>
            @endforeach
        </ul>
    </body>

    </html>
@endsection
