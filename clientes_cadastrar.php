<?php
session_start();

//  Proteção: só permite acesso se estiver logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . "/admin/config.inc.php"; // Conexão com o banco

// Se o formulário for enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome   = $_POST["nome"];
    $cidade = $_POST["cidade"];
    $uf     = $_POST["uf"];

    // Inserir no banco de dados
    $sql = "INSERT INTO clientes (nome, cidade, uf) VALUES ('$nome', '$cidade', '$uf')";

    if (mysqli_query($conexao, $sql)) {
        // 🔹 Redireciona de volta para a página de listagem (sem JavaScript)
        header("Location: ?pg=clientes");
        exit;
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <h2>Cadastrar Novo Cliente</h2>

    <form method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        Cidade: <input type="text" name="cidade"><br><br>
        Estado (UF): <input type="text" name="uf"><br><br>

        <input type="submit" value="Salvar">
        <a href="?pg=clientes">Cancelar</a>
    </form>
</body>
</html>
