<?php
// home.php
include_once "topo.php";
include_once "menu.php";
?>
<div style="position: relative;
            background: url('imagens/Terra.jpg') center center / cover no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;">

  <div style="background: rgba(0, 0, 0, 0.55);
              padding: 40px 60px;
              border-radius: 15px;
              max-width: 700px;">
    <h1 class="display-4 fw-bold mb-3">Bem-vindo à Nossa Empresa</h1>
    <p class="lead mb-4">Soluções de qualidade feitas pra você.</p>
    <a href="index.php?pg=clientes" class="btn btn-light btn-lg">Ver Clientes</a>
  </div>
</div>


<?php include_once "rodape.php"; ?>
