@extends('auth.register')

@section('formulario')
    <input id="tipo" type="hidden" name="tipo" value="ong">

    <div class="form-group row">
        <label for="nome_fantasia" class="col-md-4 col-form-label text-md-right">{{ __('Nome Fantasia') }}</label>

        <div class="col-md-6">
            <input id="nome_fantasia" type="text" class="form-control @error('nome_fantasia') is-invalid @enderror" name="nome_fantasia" value="{{ old('nome_fantasia') }}" required autocomplete="nome_fantasia" autofocus>

            @error('nome_fantasia')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
@endsection
