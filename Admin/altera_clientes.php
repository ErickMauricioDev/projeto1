<?php

    require_once "config.inc.php";

    $id = $_POST['id'];
    $nome = $_POST['cliente'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = "UPDATE clientes SET
            cliente = '$nome',
            cidade = '$cidade',
            estado = '$estado'
            WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        echo "Cadastro Alterado com sucesso!";
        echo "<a href='?pg=admin_clientes'>Voltar</a>";
    }else{
        echo "Houve um erro na alteração.";
        echo "<a href='?pg=admin_clientes'>Voltar</a>";
    }