<?php
require_once "admin/config.inc.php"; // Conexão com o banco

$id = $_GET["id"]; // Pega o ID do cliente na URL

// Apaga o cliente do banco
$sql = "DELETE FROM clientes WHERE id=$id";
mysqli_query($conexao, $sql);

// Volta pra lista de clientes
header("Location: clientes.php");
exit;
?>
