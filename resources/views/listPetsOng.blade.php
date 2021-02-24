@extends('layouts.app')

<head>
    <style>
        li {
            list-style: none;
        }

        .card-dogs {
            height: 200px;
            width: 300px;
            max-width: 300px;
            max-height: 200px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>


@section('content')
<div class="container">
    <div class="row justify-content-between">
        <h2>Pets Cadastrados</h2>
        <a class="btn btn-outline-primary" href="/pets/cadastro">Cadastrar novo PET</a>
    </div>
</div>
<div class="album py-5 bg-light">
    <div class="container">
        <ul>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($pets as $pet)
                <li>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body card-dogs">
                                <p class="card-title font-weight-bold">{{ $pet->nome }}</p>
                                <p class="card-text">{{ $pet->descricao }}</p>
                                <div class="d-flex justify-content-between">
                                    <small class="text-muted">
                                        Disponivel: {{$pet->disponivel ? 'SIM' : 'NÃO'}}
                                    </small>
                                    <small class="text-muted">
                                        <a href="/pets/disponibilidade/{{$pet->id}}">
                                            Trocar Disponibilidade
                                        </a>
                                    </small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/pets/editar/{{$pet->id}}" class="btn btn-sm btn-outline-secondary">
                                            Editar
                                        </a>

                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Candidatos
                                        </button>
                                    </div>

                                    <small class="text-muted">
                                        <a href="/pets/remove/{{ $pet->id }}">Remover</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </div>
        </ul>
    </div>
    @endsection