<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ongs</title>
</head>

<body>
    <h1 align="center">Ongs Cadastradas</h1>
    <a href="/ongs/cadastro">Cadastrar nova ONG</a>
    <ul>
        @foreach ($ongs as $ong)
        <li>#{{ $ong->id }} - {{ $ong->nome_fantasia }}
        </li>
        @endforeach
    </ul>
</body>

</html>
