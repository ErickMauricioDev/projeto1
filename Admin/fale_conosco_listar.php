<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . "/config.inc.php";

$sql = "SELECT * FROM fale_conosco ORDER BY data_envio DESC";
$resultado = mysqli_query($conexao, $sql);
?>

<h2>Mensagens Recebidas</h2>

<?php if (mysqli_num_rows($resultado) === 0): ?>
    <p>Nenhuma mensagem encontrada.</p>
<?php else: ?>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Assunto</th>
            <th>Mensagem</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($msg = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?= htmlspecialchars($msg['nome']) ?></td>
            <td><?= htmlspecialchars($msg['email']) ?></td>
            <td><?= htmlspecialchars($msg['assunto']) ?></td>
            <td><?= nl2br(htmlspecialchars($msg['mensagem'])) ?></td>
            <td><?= $msg['data_envio'] ?></td>
            <td>
                <a href="fale_conosco_excluir.php?id=<?= $msg['id'] ?>" 
                   onclick="return confirm('Excluir esta mensagem?')">Excluir</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<?php endif; ?>
