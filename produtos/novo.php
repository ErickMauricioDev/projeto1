<?php
require_once __DIR__ . '/../conexao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $conn->real_escape_string($_POST['nome']);
  $preco = $conn->real_escape_string($_POST['preco']);
  $conn->query("INSERT INTO produtos (nome, preco) VALUES ('$nome', '$preco')");
  header('Location: listar.php');
  exit;
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Novo Produto</title></head>
<body>
  <h1>Novo Produto</h1>
  <form method="post">
    Nome: <input name="nome" required><br>
    Preço: <input name="preco" required><br>
    <button type="submit">Salvar</button>
  </form>
  <a href="listar.php">Voltar</a>
</body>
</html>
