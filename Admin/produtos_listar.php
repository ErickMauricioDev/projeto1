<?php
session_start();
require_once "config.inc.php"; // conexão com banco

// Proteção de admin
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}

// Buscar produtos
$sql = "SELECT * FROM produtos ORDER BY id DESC";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos - Listagem</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #333; color: white; }
        tr:nth-child(even) { background-color: #f5f5f5; }
        a { text-decoration: none; padding: 5px 10px; border-radius: 4px; }
        .editar { background-color: #007bff; color: #fff; }
        .editar:hover { background-color: #0056b3; }
        .excluir { background-color: #c0392b; color: #fff; }
        .excluir:hover { background-color: #e74c3c; }
    </style>
</head>
<body>

<h2>Produtos Cadastrados</h2>
<a href="produtos_editar.php" class="editar">➕ Cadastrar Novo Produto</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>

    <?php while($produto = mysqli_fetch_assoc($resultado)): ?>
    <tr>
        <td><?= $produto['id'] ?></td>
        <td><?= htmlspecialchars($produto['nome']) ?></td>
        <td><?= htmlspecialchars($produto['descricao']) ?></td>
        <td>R$ <?= number_format($produto['preco'],2,",",".") ?></td>
        <td>
            <a href="produtos_editar.php?id=<?= $produto['id'] ?>" class="editar">Editar</a>
            <a href="produtos_excluir.php?id=<?= $produto['id'] ?>" class="excluir" onclick="return confirm('Deseja realmente excluir este produto?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
