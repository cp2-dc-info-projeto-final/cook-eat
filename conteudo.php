<?php
    H@$pagina = $_GET['page']: "";
        if($pagina == 2){
            include "exibirpostagem.php";
        } else if ($pagina == 3){
            include "postagem.php";
        }
?>