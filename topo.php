<?php $nome = "BlueWorld"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($nome) ?></title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="/projeto1/css/styles.css">

    <style>
     <style>
  .navbar-brand {
    font-family: 'Poppins', sans-serif;
    font-size: 28px;
    font-weight: 600;
    letter-spacing: 1px;
    color: #2d2c50ff !important;
  }

  .navbar-brand strong {
    color: #007bff; 
  }
</style>

    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
<header class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
  <strong>NT</strong> Nova Terra
</a>


      <span style="font-weight:700; font-size:18px;"><?= htmlspecialchars($nome) ?></span>
    </a>
  </div>
</header>

<?php

