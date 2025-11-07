<?php
require_once "admin/config.inc.php";

$result = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY id DESC");
?>

<h2>Lista de Produtos</h2>
<a href="?pg=produtos_cadastrar">+ Novo Produto</a>
<br><br>

<table border="1" cellpadding="6" cellspacing="0">
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Preço</th>
    <th>Data de Criação</th>
    <th>Ações</th>
</tr>

<?php while ($p = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= htmlspecialchars($p['nome']) ?></td>
    <td><?= nl2br(htmlspecialchars($p['descricao'])) ?></td>
    <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
    <td><?= $p['data_criacao'] ?></td>
    <td>
        <a href="?pg=produtos_editar&id=<?= $p['id'] ?>">Editar</a> |
        <a href="?pg=produtos_excluir&id=<?= $p['id'] ?>" onclick="return confirm('Deseja excluir este produto?')">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
