@extends('auth.register')
@section('formulario')

<input id="tipo" type="hidden" name="tipo" value="interessado">

<div class="form-group row">
    <label for="data_nascimento" class="col-md-4 col-form-label text-md-right">{{ __('Data de nascimento') }}</label>

    <div class="col-md-6">
        <input id="data_nascimento" type="date" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value="{{ old('data_nascimento') }}" required autocomplete="data_nascimento" autofocus>

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

<strong class="text-center">Informações de endereço</strong class="text-center">

<div class="form-group row">
    <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>

    <div class="col-md-6">
        <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep') }}" required autocomplete="cep" autofocus>

        @error('cep')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="logradouro" class="col-md-4 col-form-label text-md-right">{{ __('Logradouro') }}</label>

    <div class="col-md-6">
        <input id="logradouro" type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" value="{{ old('logradouro') }}" required autocomplete="logradouro" autofocus>

        @error('logradouro')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Número') }}</label>

    <div class="col-md-6">
        <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero" autofocus>

        @error('numero')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="bairro" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>

    <div class="col-md-6">
        <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ old('bairro') }}" required autocomplete="bairro" autofocus>

        @error('bairro')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>

    <div class="col-md-6">
        <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{ old('cidade') }}" required autocomplete="cidade" autofocus>

        @error('cidade')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

    <div class="col-md-6">
        <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror" name="estado" value="{{ old('estado') }}" required autocomplete="estado" autofocus>

        @error('estado')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@endsection