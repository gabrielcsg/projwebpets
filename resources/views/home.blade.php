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
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">{{ __('Buscar') }}</div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group row">
                                <div class="col-8 col-sm-10">
                                    <input placeholder="Insira algo aqui" type="text" class="form-control" name="algo"
                                           required/>
                                </div>
                                <div class="col-2 col-sm-2">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                                            Detalhes
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                                            Candidatar-se
                                                        </button>
                                                    </div>
                                                    <small
                                                        class="text-muted">Limite: {{ $pet->limite_de_candidatos }}</small>
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
        </div>
    </div>
@endsection


@section('footer')
    <span class="text-muted">&#169; Desenvolvido por WebPets, 2021. </span>
@endsection

