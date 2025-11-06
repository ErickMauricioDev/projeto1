<?php

    require_once "config.inc.php";

    $id = $_GET['id'] ?? null;

    if (!$id || !is_numeric($id)) {
        die("ID inválido para exclusão.");
    }

    $sql = "DELETE FROM fale_conosco WHERE id = '$id'";

    if(mysqli_query($conexao, $sql)){
        echo "<h2>Mensagem excluída com sucesso!</h2>";
        echo "<a href='?pg=admin_fale_conosco'>Voltar</a>";
    }else{
        echo "<h2>Erro ao excluir a mensagem!</h2>";
        echo "<a href='?pg=admin_fale_conosco'>Voltar</a>";
    }

?>