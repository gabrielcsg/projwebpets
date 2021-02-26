@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar novo pet') }}</div>

                <div class="card-body">
                    <form method="POST" action="/pets/cadastro">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ old('descricao') }}" required autocomplete="descricao" autofocus>

                                @error('descricao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="limite_de_candidatos" class="col-md-4 col-form-label text-md-right">{{ __('Limite de Candidatos') }}</label>

                            <div class="col-md-6">
                                <input id="limite_de_candidatos" type="number" min="0" class="form-control @error('limite_de_candidatos') is-invalid @enderror" name="limite_de_candidatos" value="{{ old('limite_de_candidatos') }}" autocomplete="limite_de_candidatos" autofocus>

                                @error('limite_de_candidatos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-4 col-sm-2">
                                <a href="/pets" class="btn btn-outline-secondary">
                                    {{ __('Cancelar') }}
                                </a>
                            </div>
                            <div class="col-4 col-sm-2">
                                <button type="submit" class="btn btn-primary" name="confirmar" id="confirmar">
                                    {{ __('Confirmar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
