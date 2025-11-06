<?php

    require_once "config.inc.php";

    $email = $_POST['email'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';
    if (empty($email) || empty($nome) || empty($mensagem)) {
        die("Erro: Todos os campos são obrigatórios!");
    
    $sql = "INSERT INTO fale_conosco (email, nome, mensagem, data_envio) VALUES (
            '$email', '$nome', '$mensagem', NOW())";

    if (mysqli_query($conexao, $sql)) {
        echo "<br><h2>Mensagem enviada com sucesso!</h2><br>";
        echo "<a href='?pg=admin_fale_conosco'>Voltar</a>";
    } else {
        echo "<h2>Houve um erro ao enviar a mensagem!</h2><br>";
    }

?>