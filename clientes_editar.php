<?php
require_once "admin/config.inc.php"; // Conexão com o banco

$id = $_GET["id"]; // Pega o ID do cliente na URL

// Se o formulário foi enviado (para salvar as alterações)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome   = $_POST["nome"];
    $cidade = $_POST["cidade"];
    $uf     = $_POST["uf"];

    $sql = "UPDATE clientes SET nome='$nome', cidade='$cidade', uf='$uf' WHERE id=$id";

    if (mysqli_query($conexao, $sql)) {
        // Redireciona direto pra lista (sem JavaScript)
        header("Location: clientes.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conexao);
    }
}

// Consulta os dados atuais do cliente pra preencher o formulário
$sql = "SELECT * FROM clientes WHERE id=$id";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h2>Editar Cliente</h2>

    <form method="POST">
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars($dados['nome']) ?>" required><br><br>
        Cidade: <input type="text" name="cidade" value="<?= htmlspecialchars($dados['cidade']) ?>"><br><br>
        Estado (UF): <input type="text" name="uf" value="<?= htmlspecialchars($dados['uf']) ?>"><br><br>

        <input type="submit" value="Salvar Alterações">
        <a href="clientes.php">Cancelar</a>
    </form>
</body>
</html>
