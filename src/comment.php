<?php
    include "conexao.php";
        $operacao = $_POST["operacao"];

        
        if($operacao == "comenta"){

        $cod_usuario = $_POST["cod_usuario"];
        $comentario = $_POST["comentario"];
        $cod_postagem = $_POST["cod_postagem"];
    
        $sql = "INSERT INTO comment (cod_autor,cod_postagem,comentario)";
        $sql .= "VALUES ('$cod_usuario','$cod_postagem','$comentario');";
        mysqli_query($mysqli,$sql); 

         
        }
        mysqli_close($mysqli);
?>