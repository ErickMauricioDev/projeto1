<?php
require_once "admin/config.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "INSERT INTO produtos (nome, descricao, preco, data_criacao)
            VALUES ('$nome', '$descricao', '$preco', NOW())";

    if (mysqli_query($conexao, $sql)) {
        echo "<p style='color:green;'>Produto cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro ao cadastrar produto: " . mysqli_error($conexao) . "</p>";
    }
}
?>

<h2>Cadastrar Produto</h2>
<form method="POST">
    Nome: <br>
    <input type="text" name="nome" required><br><br>

    Descrição: <br>
    <textarea name="descricao" required></textarea><br><br>

    Preço: <br>
    <input type="number" step="0.01" name="preco" required><br><br>

    <input type="submit" value="Salvar Produto">
</form>
