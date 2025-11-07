<?php
require_once "admin/config.inc.php";

$id = $_GET['id'];
$result = mysqli_query($conexao, "SELECT * FROM produtos WHERE id = $id");
$p = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "UPDATE produtos 
            SET nome='$nome', descricao='$descricao', preco='$preco'
            WHERE id=$id";

    if (mysqli_query($conexao, $sql)) {
        echo "<p style='color:green;'>Produto atualizado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro ao atualizar: " . mysqli_error($conexao) . "</p>";
    }
}
?>

<h2>Editar Produto</h2>
<form method="POST">
    Nome: <br>
    <input type="text" name="nome" value="<?= htmlspecialchars($p['nome']) ?>" required><br><br>

    Descrição: <br>
    <textarea name="descricao" required><?= htmlspecialchars($p['descricao']) ?></textarea><br><br>

    Preço: <br>
    <input type="number" step="0.01" name="preco" value="<?= $p['preco'] ?>" required><br><br>

    <input type="submit" value="Atualizar Produto">
</form>
