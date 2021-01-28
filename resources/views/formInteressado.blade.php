<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuário</title>
</head>

<body>
    <h1 align="center" style="margin-top: 50px;">Cadastro de usuário</h1>
    <div class="container containerForm" align="center">
        <form method="post" action="/interessados/cadastro">
            @csrf
            Nome: <input type="text" name="nome" required /> <br>
            Data de nascimento: <input type="text" name="data_nascimento" required /> <br>
            Telefone: <input type="text" name="telefone" required /> <br>
            Endereco_id: <input id="endereco_id" type="text" name="endereco_id" required />
			
            <button type="submit">Confirmar</button>
            <a href="/interessados">Cancel</a>
        </form>
    </div>
</body>

</html>
