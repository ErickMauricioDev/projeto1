<?php

    include_once "topo.php";
    include_once "menu.php";

    if(empty($_SERVER["QUERY_STRING"])){
        $var = "conteudo";
        include_once "$var.php";
    }elseif($_GET['pg']){
        $pg = $_GET['pg'];
        
        $caminho_arquivo = "admin/$pg.php";
        
        if (file_exists($caminho_arquivo)) {
            include_once $caminho_arquivo;
        } else { 
            if (file_exists("$pg.php")) {
                include_once "$pg.php";
            } else {
                echo "Página '$pg' não encontrada!";
            }
        }
    }else{
        echo "Página não encontrada";
    }

    include_once "rodape.php";