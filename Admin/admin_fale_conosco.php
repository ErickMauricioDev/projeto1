 <?php
session_start();

// 🔒 Proteção: só permite acesso se estiver logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}

require_once "config.inc.php"; // Conexão com o banco

// Excluir mensagem, se solicitado
if (isset($_GET["excluir"])) {
    $id = intval($_GET["excluir"]);
    $sql = "DELETE FROM fale_conosco WHERE id = $id";

    if (mysqli_query($conexao, $sql)) {
        $mensagem_sucesso = "Mensagem excluída com sucesso!";
    } else {
        $mensagem_erro = "Erro ao excluir mensagem: " . mysqli_error($conexao);
    }
}

// Buscar todas as mensagens
$sql = "SELECT * FROM fale_conosco ORDER BY id DESC";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Administração - Fale Conosco</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f5f5f5;
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #c0392b;
            padding: 6px 10px;
            border-radius: 4px;
        }
        a:hover {
            background-color: #e74c3c;
        }
        .mensagem-sucesso {
            color: green;
        }
        .mensagem-erro {
            color: red;
        }
    </style>
</head>
<body>

<h2>Painel Administrativo - Mensagens Recebidas</h2>

<?php if (!empty($mensagem_sucesso)) echo "<p class='mensagem-sucesso'>{$mensagem_sucesso}</p>"; ?>
<?php if (!empty($mensagem_erro)) echo "<p class='mensagem-erro'>{$mensagem_erro}</p>"; ?>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Assunto</th>
        <th>Mensagem</th>
        <th>Ações</th>
    </tr>

    <?php while ($msg = mysqli_fetch_assoc($resultado)) : ?>
        <tr>
            <td><?= $msg["id"] ?></td>
            <td><?= htmlspecialchars($msg["nome"]) ?></td>
            <td><?= htmlspecialchars($msg["email"]) ?></td>
            <td><?= htmlspecialchars($msg["assunto"]) ?></td>
            <td><?= nl2br(htmlspecialchars($msg["mensagem"])) ?></td>
            <td>
                <a href="?excluir=<?= $msg["id"] ?>" onclick="return confirm('Tem certeza que deseja excluir esta mensagem?')">Excluir</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
