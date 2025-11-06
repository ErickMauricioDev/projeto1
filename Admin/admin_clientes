<p>
    <a href="?pg=form_clientes">Cadastrar novo cliente</a>
</p>

<h2>Lista de Clientes</h2>
<?php

    require_once "config.inc.php";

    $sql = "SELECT * FROM clientes ";

    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while($dados = mysqli_fetch_array($resultado)) {

            echo "<br>===============<br>";
            echo "Id do Cliente: $dados[id] | ";
            echo "Nome: $dados[cliente] | ";
            echo "Cidade: $dados[cidade] | ";
            echo "Estado: $dados[estado] ";
            echo " | <a href='?pg=form_clientes_alterar&id=$dados[id]'>Alterar</a>";
            echo " | <a href='?pg=delete_cliente&id=$dados[id]'>Excluir</a>";
            echo "<br>============= <br>";
        }
    }else{
        echo "<br><h2>Nenhum cliente encontrado!</h2><br>";
    }
?>

