<?php
require_once "admin/config.inc.php"; // Conexão com o banco

$sql = "SELECT * FROM clientes";
$resultado = mysqli_query($conexao, $sql);

// Verifica se a consulta deu certo
if (!$resultado) {
    die("Erro ao consultar o banco de dados: " . mysqli_error($conexao));
}
?>
<div class="container mt-3">
    <h2>Clientes atendidos pela Empresa</h2>
    <a href="clientes_cadastrar.php" class="btn btn-success mb-3">+ Novo Cliente</a>

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
        <?php
            while($cliente = mysqli_fetch_array($resultado)){
        ?>
        <tr>
             <td><?=$cliente['nome']?></td>
             <td><?=$cliente['cidade']?></td>
             <td><?=$cliente['uf']?></td>    
            <td>
                <a href="clientes_editar.php?id=<?=$cliente['id']?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="clientes_excluir.php?id=<?=$cliente['id']?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
