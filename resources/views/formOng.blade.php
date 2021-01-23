<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Ong</title>
</head>

<body>
    <h1 align="center" style="margin-top: 50px;">Cadastro de Ong</h1>
    <div class="container containerForm">
        <form method="post" action="/ongs/cadastro">
            @csrf
            Name Fantasia: <input type="text" name="nome_fantasia" required />
            <button type="submit">Confirmar</button>
            <a href="/ongs">Cancel</a>
        </form>
    </div>
</body>

</html>