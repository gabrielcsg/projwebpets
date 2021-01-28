<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Endereco</title>
</head>

<body>
    <h1 align="center" style="margin-top: 50px;">Novo Endereco</h1>
    <div class="container containerForm" align="center">
        <form method="post" action="/enderecos/cadastro">
            @csrf
            Cep: <input type="text" name="cep" required /> <br>
            Número: <input type="text" name="numero" required /> <br>
            Bairro: <input type="text" name="bairro" required /> <br>
            Cidade: <input type="text" name="cidade" required /> <br>
            Logradouro: <input type="text" name="logradouro" required /> <br>
            Estado: <input type="text" name="estado" required /> <br>
            
            @error('cep')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('numero')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('bairro')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('cidade')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('logradouro')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('estado')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <button type="submit">Confirmar</button>
            <a href="/enderecos">Cancel</a>
        </form>
    </div>
</body>

</html>
