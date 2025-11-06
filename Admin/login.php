<?php
session_start();
require_once "config.inc.php";

$erro = "";

//  Se já estiver logado, redireciona direto para o painel
if (isset($_SESSION["logado"]) && $_SESSION["logado"] === true) {
     
    header("Location: painel.php");

    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $senha   = trim($_POST["senha"]);

    // Login fixo
    if ($usuario === "admin" && $senha === "1234") {
        $_SESSION["logado"] = true;
       header("Location: painel.php");

        exit;
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Administrativo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #333;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color:
