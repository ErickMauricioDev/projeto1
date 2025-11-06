<?php
session_start();

// 🔒 Proteção: só permite acesso se estiver logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}
?>
