<?php
    require_once "config.inc.php";


    $id = $_REQUEST['id'] ?? null;

    if (!$id || !is_numeric($id)) {
        die("ID inválido.");
    }

    $sql = "SELECT * FROM fale_conosco WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    $fale_conosco = mysqli_fetch_array($resultado);
    
    $id = $fale_conosco['id'] ?? '';
    $email = $fale_conosco['email'] ?? '';
    $nome = $fale_conosco['nome'] ?? '';
    $mensagem = $fale_conosco['mensagem'] ?? '';
?>

<form action="?pg=altera_fale_conosco" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    <label>Email:</label>
    <input type="text" name="email" value="<?=$email?>">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?=$nome?>">
    <label>Mensagem:</label>
    <input type="text" name="mensagem" value="<?=$mensagem?>">
    <input type="submit" value="Enviar">
</form>