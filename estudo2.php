<?php
// Inclui a conexão com o banco ($conn)
include 'cfg.php';

$nome = '';
$email = '';
$erro = false;
$mensagemErro = '';
$mensagemSucesso = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars($_POST['nome'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');

    // 1. Verifica se os campos estão vazios
    if (empty($nome) || empty($email)) {
        $erro = true;
        $mensagemErro = 'Por favor, preencha todos os campos!';
    } else {
        // 2. Verifica se o email já existe no banco de dados
        // Usamos Prepared Statements para evitar SQL Injection (Segurança)
        $stmt_check = $conn->prepare("SELECT idestudo2 FROM estudo2 WHERE email = ?");
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            // O email já foi encontrado
            $erro = true;
            $mensagemErro = 'Este email já está cadastrado!';
        } else {
            // 3. Como o email não existe, fazemos o INSERT
            $stmt_insert = $conn->prepare("INSERT INTO estudo2 (nome, email) VALUES (?, ?)");
            $stmt_insert->bind_param("ss", $nome, $email);

            if ($stmt_insert->execute()) {
                $mensagemSucesso = "Cadastro finalizado, obrigado por participar do teste, $nome!";
                // Limpa os campos após o sucesso
                $nome = '';
                $email = '';
            } else {
                $erro = true;
                $mensagemErro = 'Erro ao salvar no banco de dados.';
            }
            $stmt_insert->close();
        }
        $stmt_check->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        overflow-x: hidden;
    }

    .input-normal {
        border: 1px solid #ccc;
        padding: 8px;
        margin-bottom: 10px;
        width: 100%;
    }

    /* NÍVEL DIFÍCIL (CSS preparado para o PHP): Classe dinâmica de erro */
    .input-erro {
        border: 2px solid red;
        padding: 8px;
        margin-bottom: 10px;
        width: 100%;
    }

    .alerta {
        background-color: #ffcccc;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid red;
    }

    .sucesso {
        background-color: #ccffcc;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid green;
        text-align: center;
    }
</style>

<body>
    <h1><?php echo "Contato"; ?></h1>

    <?php if ($erro): ?>
        <div class="alerta">
            <?= $mensagemErro; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($mensagemSucesso)): ?>
        <div class="sucesso"><?= $mensagemSucesso ?></div>
    <?php endif; ?>

    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" class="<?= ($erro && empty($nome)) ? 'input-erro' : 'input-normal' ?>"
            value="<?= $nome ?>">

        <label>Email:</label><br>
        <input type="email" name="email" class="<?= ($erro && empty($email)) ? 'input-erro' : 'input-normal' ?>"
            value="<?= $email ?>">

        <button type="submit">Enviar</button>
    </form>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO estudo2 (nome, email) VALUES ('$nome', '$email')";


    mysqli_query($conn, $sql);
}

?>