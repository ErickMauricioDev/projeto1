<?php
require_once "admin/config.inc.php";

$id = $_GET['id'];
mysqli_query($conexao, "DELETE FROM produtos WHERE id = $id");

header("Location: ?pg=produtos_listar");
exit;
?>
