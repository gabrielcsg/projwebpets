<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets</title>
</head>

<body>
    <h1 align="center">Pets Cadastrados</h1>
    <a href="/pets/cadastro">Cadastrar novo PET</a>
    <ul>
        @foreach ($pets as $pet)
        <li>
            <p>{{ $pet->nome }} - {{ $pet->descricao }}</p>
            <p>Disponivel: {{ $pet->disponivel ? 'SIM' : 'NÃO' }} | Ong: {{ $pet->ong->nome_fantasia}}</p>
            <a href="/pets/remove/{{$pet->id}}">Excluir</a>
            @if ($pet->disponivel) 
                | <a href="/pets/candidatar/{{$pet->id}}">Me interesso</a>
            @endif
        </li>
        @endforeach
    </ul>
    
    <h1 align="center">Pets que me interessei</h1>
    <ul>
        @foreach ($petsInteressados as $pet)
        <li>
            <p>{{ $pet->nome }} - {{ $pet->descricao }}</p>
            <p>Disponivel: {{ $pet->disponivel ? 'SIM' : 'NÃO' }} | Ong: {{ $pet->ong->nome_fantasia}}</p>
            <a href="/pets/retirarInteresse/{{$pet->id}}">Remover</a>
        </li>
        @endforeach
    </ul>
</body>

</html>
