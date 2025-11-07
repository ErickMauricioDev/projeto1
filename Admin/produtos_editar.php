<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "config.inc.php";

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'] ?? null;
$nome = $descricao = $preco = "";

if ($id) {
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $res = mysqli_query($conexao, $sql);
    $produto = mysqli_fetch_assoc($res);
    if ($produto) {
        $nome = $produto['nome'];
        $descricao = $produto['descricao'];
        $preco = $produto['preco'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    if ($id) {
        $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco' WHERE id=$id";
    } else {
        $sql = "INSERT INTO produtos (nome, descricao, preco) VALUES ('$nome','$descricao','$preco')";
    }

    if (mysqli_query($conexao, $sql)) {
        header("Location: produtos_listar.php");
        exit;
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $id ? "Editar" : "Cadastrar" ?> Produto</title>
</head>
<body>

<h2><?= $id ? "Editar" : "Cadastrar" ?> Produto</h2>

<form method="post">
    Nome:<br>
    <input type="text" name="nome" value="<?= htmlspecialchars($nome) ?>" required><br><br>
    Descrição:<br>
    <textarea name="descricao"><?= htmlspecialchars($descricao) ?></textarea><br><br>
    Preço:<br>
    <input type="text" name="preco" value="<?= htmlspecialchars($preco) ?>" required><br><br>
    <input type="submit" value="Salvar">
    <a href="produtos_listar.php">Cancelar</a>
</form>

</body>
</html>
