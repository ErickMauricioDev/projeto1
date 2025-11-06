<?php
require_once "admin/config.inc.php";

// Se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    $sql = "INSERT INTO fale_conosco (nome, email, assunto, mensagem) 
            VALUES ('$nome', '$email', '$assunto', '$mensagem')";

    if (mysqli_query($conexao, $sql)) {
        echo "<p style='color: green;'>Mensagem enviada com sucesso! Obrigado pelo contato.</p>";
    } else {
        echo "<p style='color: red;'>Erro ao enviar mensagem: " . mysqli_error($conexao) . "</p>";
    }
}
?>

<h2>Fale Conosco</h2>
<form method="POST">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>E-mail:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Assunto:</label><br>
    <input type="text" name="assunto" required><br><br>

    <label>Mensagem:</label><br>
    <textarea name="mensagem" rows="5" cols="40" required></textarea><br><br>

    <input type="submit" value="Enviar">
</form>
