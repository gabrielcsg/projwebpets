<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscam por adoção</title>
</head>

<body>
    <h1 align="center">Endereços</h1>
    <a href="/enderecos/cadastro">Novo endereço</a>
    <ul>
        @foreach ($enderecos as $endereco)
        <li> {{ $endereco->cidade }} - {{ $endereco->estado }} - {{ $endereco->bairro }} - {{ $endereco->cep }} </li>
        @endforeach
    </ul>
</body>

</html>
