<?php

$titulo = "Meu Perfil";
$usuario = "Rafael Adriano Oliveira da Silva";
$usuarioAtivo = true;
$habilidades = ["PHP", "HTML", "CSS", "JAVASCRIPT"];
$biografia = null;


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>
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
        max-width: 300px;
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
        <h2><?php echo $usuario ?></h2>
        <p>Status:
            <?php if ($usuarioAtivo): ?>
                <span class="status-on">
                    Usuário ativo
                </span>
            <?php else: ?>
                <span class="status-off">Offline</span>
            <?php endif; ?>
        </p>

        <h3>Habilidades</h3>
        <ul>
            <?php foreach ($habilidades as $hab): ?>
                <li><?= htmlspecialchars($hab) ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Sobre Mim:</h3>
        <p><?= $biografia ?? 'Este usuário ainda não escreveu uma bibliografia' ?></p>
    </div>
</body>

</html>