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

{{--<div class="form-group row">--}}
{{--    <label for="endereco_id" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>--}}

{{--    <div class="col-md-6">--}}
{{--        <input id="endereco_id" type="text" class="form-control @error('endereco_id') is-invalid @enderror" name="endereco_id" value="{{ old('endereco_id') }}" autocomplete="endereco_id">--}}

{{--        @error('endereco_id')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                <strong>{{ $message }}</strong>--}}
{{--            </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}
@endsection


