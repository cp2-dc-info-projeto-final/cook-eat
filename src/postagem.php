<?php
    include "conexao.php";
$operacao = $_POST["operacao"];

        
        if($operacao == "postagem"){
        $cod_usuario = $_POST["cod_usuario"];
        //$img_post = $_FILES["img_post"];
        $post = $_POST["post"];
    
        $sql = "INSERT INTO posts (cod_autor,post)";
        $sql .= "VALUES ('$cod_usuario','$post');";  
        //mysqli_query($mysqli,$sql);  
        //echo "<br>Novo Post completo.";
        header("Location: home.php");

        mysqli_query($mysqli,$sql);  
                mysqli_close($mysqli);
        }
?>