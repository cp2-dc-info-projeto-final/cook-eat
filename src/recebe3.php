<?php
        $operacao = $_POST["operacao"];
        include "conexao.php";


       // if($operacao == "inserir"){
         //   $posta = $_POST["posta"]; }
         if($operacao == "inserir"){
         $Posta = $_POST["Posta"];
         }

         $sql = "INSERT INTO postagem (Posta)";
         $sql .= "VALUES ('$Posta');";  
         $var = mysqli_query($mysqli,$sql);  

        echo  $postagem["posta"];
?>