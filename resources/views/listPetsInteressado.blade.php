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
    <h2>Pets que teve interesse</h2>
</div>
<div class="album py-5 bg-light">
    <div class="container">
        <ul>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($pets as $pet)
                @if($pet->disponivel)
                <li>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body card-dogs">
                                <p class="card-title font-weight-bold">{{ $pet->nome }}</p>
                                <p class="card-text">{{ $pet->descricao }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- <div class="btn-group">
                                        <a href="/pets/editar/{{$pet->id}}" class="btn btn-sm btn-outline-secondary">
                                            Editar
                                        </a>

                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            Candidatos
                                        </button>
                                    </div> -->

                                    <small class="text-muted">
                                        <a href="/pets/retirarInteresse/{{$pet->id}}">Remover</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endif
                @endforeach
            </div>
        </ul>
    </div>
    @endsection