@extends('layouts.app')

<head>
    <style>
        li {
            list-style: none;
            margin-top: 10px;
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

        .card-dogs .img-dogs img{
            height: 150px;
            width: 150px;
        }

        .card-dogs .actions-dogs {
            display: flex;
            justify-content: flex-end;
        }

        .btn-full-witdh {
            width: 100%;
        }

        @media only screen and (max-width: 767px) {
            .btn-full-witdh {
                margin-top: 20px;
            }
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
                            <div class="col-12 col-md-10">
                                <input placeholder="Insira algo aqui" type="text" class="form-control" name="algo" required />
                            </div>
                            <div class="col-12 col-md-2">
                                <button class="btn btn-primary btn-full-witdh" type="submit">Buscar</button>
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
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-3">
                    @foreach ($pets as $pet)
                    @if($pet->disponivel)
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

                                        @if($pet->limite_de_candidatos && $pet->limite_de_candidatos > 0)
                                            <small class="text-muted">
                                                Ainda restam: {{
                                                $pet->limite_de_candidatos - count($pet->interessados)
                                            }} vagas.
                                            </small>
                                        @endif
                                    </div>
                                    <div class="actions-dogs">
                                        <div class="btn-group">
                                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">
                                                Detalhes
                                            </button> -->
                                            @if(!(Auth::user() && Auth::user()->tipo == 'ong'))
                                            <a href="/pets/candidatar/{{$pet->id}}" class="btn btn-sm btn-outline-primary">
                                                QUERO ADOTAR
                                            </a>
                                            @endif
                                        </div>
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