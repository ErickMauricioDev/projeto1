<?php

    require_once "admin/config.inc.php";
    $sql = "SELECT * FROM fale_conosco";
    $resultado = mysqli_query($conexao, $sql);

?>
<h3>Fale Conosco</h3>
<form action="?pg=cadastra_fale_conosco" method="post">
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email">
    </div>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" placeholder="Seu nome" name="nome">
    </div>
    <div class="mb-3">
        <label for="mensagem" class="form-label">Mensagem:</label>
        <textarea class="form-control" id="mensagem" placeholder="Sua mensagem" name="mensagem"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>