<?php
require_once __DIR__ . "/admin/config.inc.php"; // Conexão com o banco

// Consulta todos os clientes no banco
$sql = "SELECT * FROM clientes";
$resultado = mysqli_query($conexao, $sql);

// Verifica se a consulta deu certo
if (!$resultado) {
    die("Erro ao consultar o banco de dados: " . mysqli_error($conexao));
}
?>

<div class="container mt-3">
    <h2>Clientes atendidos pela Empresa</h2>

    <!-- 🔹 Botão para adicionar novo cliente -->
    <a href="?pg=clientes_cadastrar" class="btn btn-success mb-3">+ Novo Cliente</a>

    <!-- 🔹 Tabela de listagem -->
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($cliente = mysqli_fetch_array($resultado)) { ?>
                <tr>
                    <td><?= htmlspecialchars($cliente['nome']) ?></td>
                    <td><?= htmlspecialchars($cliente['cidade']) ?></td>
                    <td><?= htmlspecialchars($cliente['uf']) ?></td>
                    <td>
                        
                        <a href="?pg=clientes_editar&id=<?= $cliente['id'] ?>" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        
                        <a href="?pg=clientes_excluir&id=<?= $cliente['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Tem certeza que deseja excluir este cliente?')">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
