<?php include "autentica.inc" ?>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <title>postagem</title>
        <link rel='stylesheet' href="assets/css/index.css">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
    </head>
    <body>
   
    
    <form action="home.php">
    <?php 
                include "conexao.php";
                $cod_usuario = $_POST["cod_usuario"];
                $post = $_POST["post"];
                $erro = 0;
        
                if ( empty($post)){
                    echo "<p style='text-align: center'>ERRO: A postagem precisa de um texto </p> <br>";
                    $erro = $erro + 1;
                    echo "<p><input type='submit' value='Voltar' ></p>";
                }


                if ($erro == 0)
                {
                    $sql = "INSERT INTO posts (cod_autor,post)";
                    $sql .= "VALUES ('$cod_usuario','$post');";  
                    mysqli_query($mysqli,$sql);  
                    echo "<p style='text-align: center'> Novo Post completo. </p> <br>";
                    
                    echo "<p><input type='submit' value='Voltar' ></p>";
                };
    
    
    
    
            mysqli_close($mysqli);
    ?>  
    </form>
    
    
    
    
    </body>

</html>
    