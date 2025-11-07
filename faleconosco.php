<?php
// Mostrar erros na tela (para depuração)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclui o arquivo de conexão
require_once "admin/config.inc.php";

// Testa a conexão com o banco
if (!isset($conexao) || !$conexao) {
    die("<p style='color:red;'>❌ Erro na conexão com o banco de dados: " . mysqli_connect_error() . "</p>");
}

// Se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    // Monta o SQL
    $sql = "INSERT INTO fale_conosco (nome, email, assunto, mensagem)
            VALUES ('$nome', '$email', '$assunto', '$mensagem')";

    // Executa o SQL e verifica resultado
    if (mysqli_query($conexao, $sql)) {
        echo "<p style='color: green;'>✅ Mensagem enviada com sucesso! Obrigado pelo contato.</p>";
    } else {
        echo "<p style='color: red;'>❌ Erro ao enviar mensagem: " . mysqli_error($conexao) . "</p>";
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
