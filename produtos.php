<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Proteção para admin
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: admin/login.php");
    exit;
}

// Conexão com o banco
require_once __DIR__ . "/admin/config.inc.php";

// Buscar produtos
$sql = "SELECT * FROM produtos ORDER BY id DESC";
$resultado = mysqli_query($conexao, $sql);
?>

<h2>Produtos Cadastrados</h2>
<a href="?pg=produtos_cadastrar">➕ Cadastrar Novo Produto</a>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>

    <?php while($produto = mysqli_fetch_assoc($resultado)): ?>
    <tr>
        <td><?= $produto['id'] ?></td>
        <td><?= htmlspecialchars($produto['nome']) ?></td>
        <td>R$ <?= number_format($produto['preco'],2,",",".") ?></td>
        <td>
            <a href="?pg=produtos_editar&id=<?= $produto['id'] ?>">Editar</a>
            <a href="?pg=produtos_excluir&id=<?= $produto['id'] ?>" onclick="return confirm('Deseja realmente excluir este produto?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
