<?php
session_start();

//  Proteção: só permite acesso se estiver logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        .btn {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
            margin-right: 10px;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .logout {
            background-color: #c0392b;
        }
        .logout:hover {
            background-color: #e74c3c;
        }
        .btn-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2>Bem-vindo ao Painel Administrativo</h2>
<p>Escolha o que deseja gerenciar:</p>

<div class="btn-container">
    <a href="admin_fale_conosco.php" class="btn">📩 Ver mensagens do Fale Conosco</a> 
    <a href="../logout.php" class="btn logout">🚪 Sair</a> 
</div>

</body>
</html>
