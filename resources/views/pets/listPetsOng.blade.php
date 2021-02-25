@extends('layouts.app')

<head>
    <style>
        li {
            list-style: none;
        }

        .album .card {
            width: 300px;
        }

        .card-dogs {
            height: 400px;
            width: 300px;
            max-width: 300px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-dogs .img-dogs {
            height: 150px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-dogs .img-dogs img {
            height: 150px;
            width: 150px;
        }

        .card-dogs .actions-dogs {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .disponibilidade {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
                        <div class="card shadow-md">
                            <div class="card-body card-dogs">
                                <div class="img-dogs">
                                    <img src="https://www.flaticon.com/br/premium-icon/icons/svg/1566/1566744.svg" alt="pet" />
                                </div>
                                <div>
                                    <p class="card-title font-weight-bold">{{ $pet->nome }}</p>
                                    <p class="card-text">{{ $pet->descricao }}</p>
                                    <div class="disponibilidade">
                                        <small class="text-muted">
                                            Disponivel: {{$pet->disponivel ? 'SIM' : 'NÃO'}}
                                        </small>
                                        <small class="text-muted">
                                            <a href="/pets/disponibilidade/{{$pet->id}}">
                                                Trocar
                                            </a>
                                        </small>
                                    </div>
                                </div>
                                <div class="actions-dogs">
                                    <div class="btn-group">
                                        <a href="/pets/editar/{{$pet->id}}" class="btn btn-sm btn-outline-secondary">
                                            Editar
                                        </a>

                                        <a href="/pets/{{$pet->id}}/interessados" class="btn btn-sm btn-outline-secondary">
                                            Candidatos
                                        </a>
                                    </div>
                                    <small class="text-muted">
                                        <a href="/pets/remove/{{ $pet->id }}">Excluir Pet</a>
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