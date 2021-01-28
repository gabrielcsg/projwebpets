<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscam por adoção</title>
</head>

<body>
    <h1 align="center">Nomes de usuários</h1>
    <a href="/interessados/cadastro">Novo Cadastro</a>
    <ul>
        @foreach ($interessados as $interessado)
        <li>{{ $interessado->nome }}</li>
        @endforeach
    </ul>
</body>

</html>
