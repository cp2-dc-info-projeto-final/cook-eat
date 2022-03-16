<?php
    
    include "conexao.php";

    
        $username = $_POST["username"];
        $senha = $_POST["senha"];
        $email = $_POST["email"];
        $consenha = $_POST["confirmarsenha"];
        $erro = 0;

        
?>
<html>
    
    <head>
        <?php include "autenticadeslogado.inc" ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <title>Cadastro</title>
        <link rel='stylesheet' href="assets/css/index.css">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
    </head>
    <form action="cadastro.php">
        <?php
        if(strlen($username) < 5 OR strlen($username) > 15){
            echo "<p style='text-align: center'>O username deve possuir no mínimo 5 e no máximo 15 caracteres. </p><br>";
            $erro = 1;
        }
        if(strlen($senha) < 5 OR strlen($senha) > 16){
            echo "<p style='text-align: center'>A senha deve possuir no mínimo 5 e no máximo 16 caracteres. </p><br>";
            $erro = 1;
        }
        if($username == $senha){
            echo "<p style='text-align: center'>O username e a senha devem ser diferentes. </p><br>";
            $erro = 1;
        }
        if(strlen($email) < 8 || strstr($email,'@') == FALSE){
            echo "<p style='text-align: center'>Favor digitar seu email corretamente. </p><br>";
            $erro = 1;
        }
        if(strlen($email) > 30){
            echo "<p style='text-align: center'>O email deve possuir no máximo 30 caracteres. </p><br>";
            $erro = 1;
        }
        if( $senha != $consenha ){
            echo "<p style='text-align: center'>As senhas precisam ser iguais. </p><br>";
            $erro = 1;
        }
        $sql_conferir_user = "SELECT * FROM usuarios WHERE username like '$username';";
        $resultado_user = mysqli_query($mysqli,$sql_conferir_user);
        $linhas_user = mysqli_num_rows($resultado_user);
            if($linhas_user != 0){
                echo "<p style='text-align: center'> O username já está sendo utilizado. </p><br>";                
                $erro = 1;
            }
        // VERIFICA SE NÃO HOUVE ERRO 
        if($erro == 0) {
            $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (username,senha_cript,email,adm)";
            $sql .= "VALUES ('$username','$senha_cript','$email',0);";  
        mysqli_query($mysqli,$sql);  
        //echo "Esse é o valor do var $var";
            //echo "<br>O usuário foi cadastrado com sucesso!"; 
          header("Location: index.php");
        }else{
            echo "<p><input type='submit' value='Voltar' ></p>";
        }
    

   
        





        mysqli_close($mysqli);
        ?>




    </html>