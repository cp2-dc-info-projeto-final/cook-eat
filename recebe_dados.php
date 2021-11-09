<?php
    $operacao = $_POST["operacao"];
    include "conexao.php";

    if($operacao == "inserir"){
        $username = $_POST["username"];
        $senha = $_POST["senha"];
        $email = $_POST["email"];
        $consenha = $_POST["confirmarsenha"];
        $erro = 0;

        if(strlen($username) < 5 OR strlen($username) > 10){
            echo "O username deve possuir no mínimo 5 e no máximo 10 caracteres.<br>";
            $erro = 1;
        }
        if(strlen($senha) < 5 OR strlen($senha) > 10){
            echo "A senha deve possuir no mínimo 5 e no máximo 10 caracteres.<br>";
            $erro = 1;
        }
        if($username == $senha){
            echo "O username e a senha devem ser diferentes.<br>";
            $erro = 1;
        }
        if(strlen($email) < 8 || strstr($email,'@') == FALSE){
            echo "Favor digitar seu email corretamente. <br>";
            $erro = 1;
        }
        if(strlen($email) > 30){
            echo "O email deve possuir no máximo 30 caracteres.<br>";
            $erro = 1;
        }
        if( $senha != $consenha ){
            echo "As senhas precisam ser iguais.";
            $erro = 1;
        }
        // VERIFICA SE NÃO HOUVE ERRO 
        if($erro == 0) {
            $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (username,senha_cript,email)";
            $sql .= "VALUES ('$username','$senha_cript','$email');";  
            mysqli_query($mysqli,$sql);  
            echo "<br>O usuário foi cadastrado com sucesso!"; 
            header("Location: Login.html");
        }
    }
    
    
    mysqli_close($mysqli);
?>
