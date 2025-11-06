<p>
    <a href="?pg=form_fale_conosco">Enviar nova mensagem</a>
</p>

<h2>Lista de mensagens</h2>
<?php

    require_once "config.inc.php";

    $sql = "SELECT * FROM fale_conosco ";

    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while($dados = mysqli_fetch_array($resultado)) {

            echo "<br>===============<br>";
            echo "Id do Cliente: $dados[id] | ";
            echo "Email: $dados[email] | ";
            echo "Nome: $dados[nome] | ";
            echo "Mensagem: $dados[mensagem] ";
            echo " | <a href='?pg=form_fale_conosco_alterar&id=$dados[id]'>Alterar</a>";
            echo " | <a href='?pg=delete_fale_conosco&id=$dados[id]'>Excluir</a>";
            echo "<br>============= <br>";
        }
    }else{
        echo "<br><h2>Nenhuma mensagem encontrada!</h2><br>";
    }
?>

