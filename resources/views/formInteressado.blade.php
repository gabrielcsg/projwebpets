@extends('auth.register')
@section('formulario')

@if ($tipo == 'interessado')
    <input id="tipo" type="hidden" name="tipo" value="interessado">
@endif

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
    <label for="data_nascimento" class="col-md-4 col-form-label text-md-right">{{ __('Data de nascimento') }}</label>

    <div class="col-md-6">
        <input id="data_nascimento" type="text" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value="{{ old('data_nascimento') }}" required autocomplete="data_nascimento" autofocus>

        @error('data_nascimento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

    <div class="col-md-6">
        <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>

        @error('telefone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="endereco_id" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>

    <div class="col-md-6">
        <input id="endereco_id" type="text" class="form-control @error('endereco_id') is-invalid @enderror" name="endereco_id" value="{{ old('endereco_id') }}" required autocomplete="endereco_id" autofocus>

        @error('endereco_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endsection


