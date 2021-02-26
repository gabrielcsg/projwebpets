@extends('layouts.app')

<head>
    <style>
        li {
            list-style: none;
        }

        .card-interessados {
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
    <h2>Interessados no pet: "{{$pet->nome}}"</h2>
</div>
<div class="album py-5 bg-light">
    <div class="container">
        <ul>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($interessados as $interessado)
                <li>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body card-interessados">
                                <p class="card-title font-weight-bold">{{ $interessado->nome }}</p>
                                <p class="card-text">
                                    Email: {{ $interessado->user->email }} <br />
                                    Contato: {{ $interessado->telefone }}
                                </p>
                                <div class="d-flex justify-content-end align-items-center">
                                    <div class="btn-group">
                                        <a href="" class="btn btn-sm btn-primary">
                                            Aceitar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </div>
        </ul>
    </div>
</div>
@endsection