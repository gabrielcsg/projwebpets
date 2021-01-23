<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pet</title>
</head>

<body>
    <h1 align="center" style="margin-top: 50px;">Cadastro de Ong</h1>
    <div>
        <form method="post" action="/pets/cadastro" style="display:flex; flex-direction:column; align-items:center;">
            @csrf
            Nome: <input type="text" name="nome" required />
            Descrição: <input type="text" name="descricao" required />
            Limite de Candidatos: <input type="number" name="limite_de_candidatos" />
            Ong:
            <select name="ong_id" id="ongs">
                @foreach ($ongs as $ong)
                <option value="{{$ong->id}}">{{$ong->nome_fantasia}}</option>
                @endforeach
            </select>
            <br />
            <button type="submit">Confirmar</button>
            <a href="/pets">Cancel</a>
        </form>
    </div>
</body>

</html>