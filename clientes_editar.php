<?php
require_once __DIR__ . "/admin/config.inc.php"; // Conexão com o banco


if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "Erro: nenhum cliente selecionado para edição.";
    exit;
}

$id = intval($_GET["id"]); 


if ($_SERVER["REQUEST_METHOD"] === "POST") {

$nome   = $_POST["nome"];
$cidade = $_POST["cidade"];
$uf     = $_POST["uf"];

    $sql = "UPDATE clientes 
            SET nome='$nome', cidade='$cidade', uf='$uf' 
            WHERE id=$id";

    if (mysqli_query($conexao, $sql)) {

        
        header("Location: ?pg=clientes");
        exit;

    } else {
        echo "Erro ao atualizar: " . mysqli_error($conexao);
    }
}

// Buscar dados
$sql = "SELECT * FROM clientes WHERE id=$id";
$res = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($res);
?>

<h2>Editar Cliente</h2>

<form method="POST">
    Nome: <input type="text" name="nome" value="<?= $dados['nome'] ?>" required><br><br>
    Cidade: <input type="text" name="cidade" value="<?= $dados['cidade'] ?>"><br><br>
    Estado (UF): <input type="text" name="uf" value="<?= $dados['uf'] ?>"><br><br>

    <input type="submit" value="Salvar Alterações">
    <a href="?pg=clientes">Cancelar</a>
</form>
