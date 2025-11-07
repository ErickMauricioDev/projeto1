<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Proteção para admin
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: admin/login.php");
    exit;
}

// Conexão com banco
require_once __DIR__ . "/admin/config.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $preco = floatval($_POST['preco']);

    $sql = "INSERT INTO produtos (nome, preco) VALUES ('$nome', $preco)";
    if (mysqli_query($conexao, $sql)) {
        header("Location: ?pg=produtos"); // volta para lista de produtos
        exit;
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
}
?>

<h2>Cadastrar Produto</h2>
<form method="post">
    Nome: <input type="text" name="nome" required><br><br>
    Preço: <input type="text" name="preco" required><br><br>
    <input type="submit" value="Salvar">
</form>
