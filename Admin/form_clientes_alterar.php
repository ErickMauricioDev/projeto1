<?php
    require_once "config.inc.php";
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM clientes WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql);

    while ($cliente = mysqli_fetch_array($resultado)){
        $id = $cliente['id'];
        $nome = $cliente['cliente'];
        $cidade = $cliente['cidade'];
        $estado = $cliente['estado'];
    }
?>

<form action="?pg=altera_clientes" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    <label>Nome do cliente:</label>
    <input type="text" name="cliente" value="<?=$nome?>">
    <label>Cidade:</label>
    <input type="text" name="cidade" value="<?=$cidade?>">
    <label>Estado:</label>
    <input type="text" name="estado" value="<?=$estado?>">
    <input type="submit" value="Cadastrar">
</form>