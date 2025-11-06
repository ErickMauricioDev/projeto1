<?php

require_once "config.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'] ?? '';
    $email = $_POST['email'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';


    if (empty($id) || empty($email) || empty($nome) || empty($mensagem)) {
        die("Erro: Todos os campos e o ID são obrigatórios!");
    }


    $sql = "UPDATE fale_conosco SET email = '$email', nome = '$nome', mensagem = '$mensagem' WHERE id = '$id'";

  
    if (mysqli_query($conexao, $sql)) {
        echo "<h2>Mensagem alterada com sucesso!</h2><br>";
        echo "<a href='?pg=admin_fale_conosco'>Voltar</a>";
    } else {
        echo "<h2>Erro ao alterar a mensagem!</h2><br>";

    }
} else {
    echo "Acesso inválido.";
}
?>