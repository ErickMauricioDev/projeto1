<?php
// menu.php - menu moderno
?>
<header class="header">
  <div class="header-inner">
    <a href="index.php" class="logo">
      <!-- você pode substituir por uma imagem: <img src="img/logo.png" alt="Logo"> -->
      <span style="background:#fff;color:var(--primary);padding:6px 8px;border-radius:6px;font-weight:800;">MG</span>
      <span style="opacity:0.95;margin-left:6px;">Minha Empresa</span>
    </a>

<nav class="nav" aria-label="Main navigation">
  <a href="index.php" class="">Home</a>
  <a href="index.php?pg=quemsomos">Quem Somos</a>
  <a href="index.php?pg=clientes">Clientes</a>
  <a href="index.php?pg=produtos_listar">Produtos</a>
  <a href="index.php?pg=faleconosco">Fale Conosco</a>
  <a href="index.php?pg=clientes_cadastrar" class="cta">+ Cliente</a>
  <a href="index.php?pg=produtos_cadastrar" class="cta">+ Produto</a>
</nav>


    <button class="hamburger" id="hamburgerBtn" aria-label="Abrir menu">
      ☰
    </button>
  </div>

  <!-- menu mobile -->
  <div class="mobile-menu" id="mobileMenu">
    <a href="index.php">Home</a>
    <a href="index.php?pg=quemsomos">Quem Somos</a>
    <a href="index.php?pg=clientes">Clientes</a>
    <a href="index.php?pg=form_fale_conosco">Fale Conosco</a>
    <a href="index.php?pg=clientes_cadastrar">+ Cliente</a>
  </div>
</header>

<script>
(function(){
  const btn = document.getElementById('hamburgerBtn');
  const menu = document.getElementById('mobileMenu');
  btn?.addEventListener('click', ()=> {
    menu.classList.toggle('open');
  });
})();
</script>
