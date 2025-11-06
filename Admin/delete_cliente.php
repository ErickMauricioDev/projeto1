<?php

    require_once "config.inc.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        echo "<h2>Cliente excluído com sucesso!</h2>";
        echo "<a href='?pg=admin_clientes'>Voltar</a>";
    }else{
        echo "<h2>Erro ao excluir o cliente!</h2>";
        echo "<a href='?pg=admin_clientes'>Voltar</a>";
    }
