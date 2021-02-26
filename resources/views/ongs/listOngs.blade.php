
@extends('layouts.app')

@section('content')
    <body>               
        <div class="album py-5 bg-light">
        <div class="container">
            <a href="/ongs/cadastro">Cadastrar nova ONG</a>
            <div class="card-header">{{ __('ONGs cadastradas') }}</div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-3">
                @foreach ($ongs as $ong)
                    <div class="col">
                        <div class="card shadow-md">
                            <div class="card-body card-dogs">
                                <p class="card-title font-weight-bold">{{ $ong->nome_fantasia }}</p>
                                <p class="card-text">{{ $ong->endereco->estado }}</p>
                                <p class="card-text">{{ $ong->endereco->cidade }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
        
    </body>

    </html>
@endsection
