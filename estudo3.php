<?php

$tarefas = ["Comprar pão", "Estudar PHP", "Pagar a conta de luz", "Passear com o cachorro"];

$titulo = "Lista de Tarefas";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo; ?></title>
    <style>
        body {
            font-family: Arial;
        }

        .tarefa {
            background: #f4f4f4;
            margin: 5px;
            padding: 10px;
            border-left: 5px solid blue;
        }
    </style>
</head>

<body>
    <h2><?php echo "O que tenho para fazer hoje?"; ?></h2>

    <?php foreach ($tarefas as $taf): ?>
        <div class="tarefa">
            <?= htmlspecialchars($taf) ?>
        </div>
    <?php endforeach; ?>


</body>

</html>