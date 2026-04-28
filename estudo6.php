<?php

$temaEscolhido = $_GET['tema'] ?? 'claro';

$corFundo = "";
$corTexto = "";

if ($temaEscolhido == "escuro") {
    $corFundo = "#222222";
    $corTexto = "white";
} elseif ($temaEscolhido == "matrix") {
    $corFundo = "black";
    $corTexto = "#00ff00";
} else {
    $corFundo = "white";
    $corTexto = "black";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Temas</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            padding: 50px;
            text-align: center;
            background-color:
                <?= $corFundo ?>
            ;
            color:
                <?= $corTexto ?>
            ;
            transition: background-color 0.5s, color 0.5s;
        }

        .botao-link {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            color: white;
        }

        .btn-claro {
            background-color: #ccc;
            color: black;
        }

        .btn-escuro {
            background-color: #444;
        }

        .btn-matrix {
            background-color: #00ff00;
        }
    </style>
</head>

<body>
    <h1>Controle os Temas</h1>
    <p>Clique nos botões para mudar o visual</p>

    <a href="?tema=claro" class="botao-link btn-claro">Modo Claro</a>

    <a href="?tema=escuro" class="botao-link btn-escuro">Modo Escuro</a>

    <a href="?tema=matrix" class="botao-link btn-matrix">Modo Matrix</a>
</body>

</html>