<?php
session_start();
require_once "config.inc.php";

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: produtos_listar.php");
    exit;
}

$id = intval($_GET['id']);

$sql = "DELETE FROM produtos WHERE id=$id";
mysqli_query($conexao, $sql);

header("Location: produtos_listar.php");
exit;
