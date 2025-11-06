<?php 
 
 ?>

<style>
  nav {
    background-color: #222;
    padding: 10px;
    text-align: center;
  }

  nav a {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    margin: 0 5px;
    border-radius: 5px;
    background-color: #ca0e0eff;
    font-family: Arial, sans-serif;
    transition: background-color 0.3s;
  }

  nav a:hover {
    background-color: #555;
  }

  .active {
    background-color: #007bff;
  }

  /* Botão administrativo destacado */
  .admin-btn {
    background-color: #007bff;
    color: white;
  }

  .admin-btn:hover {
    background-color: #0056b3;
  }
</style>

<nav>
  <a href="?pg=conteudo" class="active">🏠 Home</a>
  <a href="?pg=quemsomos">👥 Quem Somos</a>
  <a href="?pg=clientes">📋 Clientes</a>
  <a href="?pg=faleconosco">💬 Fale Conosco</a>
  <a href="?pg=produtos">🛒 Produtos</a>

  <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
    <!-- Botão visível apenas para admin -->
    <a href="Admin/admin_fale_conosco.php" class="admin-btn">🔒 Área Admin</a>
  <?php endif; ?>
 </nav>