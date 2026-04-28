<?php

$aviso = "";
$titulo = "Login Simples";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario == 'admin' && $senha == "1234feijaonoprato") {
        header("Location: estudo3.php");
        exit;
    } else {
        $aviso = "Usuário ou senha incorretos. Tente novamente!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <style>
        * {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin: 0;
            padding: 0;
        }

        form {
            border: 1px solid black;
            padding: 20px;
            border-radius: 5px;
            width: 20%;
            margin: 0 auto;
            text-align: center;
            margin-top: 20px;
        }

        input {
            width: 80%;
            padding: 5px;
            margin: 5px;
        }

        .btnJoin {
            padding: 10px;
            margin: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        p {
            text-align: center;
            margin-top: 5px;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .caixa-senha {
            position: relative;
            display: inline-block;
        }

        .botao-olho {
            position: absolute;
            right: 18px;
            top: 9.5px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h2>Acesso Restrito</h2>

    <form method="post">
        <label>Usuário:</label><br>
        <input type="text" name="usuario"><br><br>

        <label>Senha:</label><br>
        <div class="caixa-senha">
            <input type="password" name="senha" id="inputSenha">

            <button type="button" id="btnOlho" class="botao-olho">👀</button>
        </div>
        <br><br>

        <button type="submit" class="btnJoin">Entrar</button>
    </form>
    <?php if ($aviso != ""): ?>
        <p style="color: red; font-weight: bold"><?= $aviso ?></p>
    <?php endif; ?>

    <script>
        const campoSenha = document.getElementById('inputSenha');
        const botaoOlho = document.getElementById('btnOlho');

        botaoOlho.addEventListener('click', function () {
            if (campoSenha.type === 'password') {
                campoSenha.type = 'text';
                botaoOlho.textContent = '🙈';
            } else {
                campoSenha.type = 'password';
                botaoOlho.textContent = '👀';
            }
        })
    </script>
</body>

</html>