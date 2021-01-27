<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pet</title>
</head>

<body>
    <h1 align="center" style="margin-top: 50px;">Cadastro de Pet</h1>
    <div>
        <form method="post" action="/pets/cadastro" style="display:flex; flex-direction:column; align-items:center;">
            @csrf
            Nome: <input type="text" name="nome" value="{{ old('nome') }}" required />
            @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            Descrição: <input type="text" name="descricao" value="{{ old('descricao') }}" required />
            @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            Limite de Candidatos: <input type="number" min="1" name="limite_de_candidatos" value="{{ old('limite_de_candidatos') }}" />
            @error('limite_de_candidatos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            Ong:
            <select name="ong_id" id="ongs">
                @foreach ($ongs as $ong)
                <option value="{{$ong->id}}">{{$ong->nome_fantasia}}</option>
                @endforeach
            </select>
            @error('ong_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br />
            <button type="submit">Confirmar</button>
            <a href="/pets">Cancel</a>
        </form>
    </div>
</body>

</html>