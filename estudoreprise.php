<?php

$usuario = "Rafael Adriano Oliveira da Silva";
$usuarioAtivo = true;
$habilidade = ['PHP', 'CSS', 'JAVASCRIPT', 'HTML', 'PYTHON'];
$biografia = null;
$titulo = "Teste Perfil"

    ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    .card {
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 8px;
        max-width: 370px;
    }

    .status-on {
        color: green;
        font-weight: bold;
    }

    .status-off {
        color: red;
        font-weight: bold;
    }
</style>

<body>
    <div class="card">
        <h2><?= $usuario ?></h2>
        <p>Status:</p>
        <?php if ($usuarioAtivo): ?>
            <span class="status-off">Usuário Inativo</span>
        <?php elseif ($usuarioAtivo): ?>
            <span class="status-on">Usuário Ativo</span>
        <?php endif ?>

        <h3>Habilidades:</h3>
        <ul>
            <?php foreach ($habilidade as $hab): ?>
                <li><?= $hab ?></li>
            <?php endforeach ?>
        </ul>

        <h3>Sobre Mim:</h3>
        <p><?= $biografia ?? 'Este Usuário não tem uma descrição' ?></p>
    </div>
</body>

</html>