<?php
    $operacao = $_POST["operacao"];
    include "conexao.php";

    if($operacao == "atualizar"){

        $cod_usuario = $_POST["cod_usuario"];
        $username = $_POST["username"];
        $senha_atual = $_POST["senha_atual"];
        $senha_nova = $_POST["senha_nova"];
        $senha_nova_rep = $_POST["senha_nova_rep"];
        $email = $_POST["email"];
        $erro = 0;

        $sql = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;";
        $res = mysqli_query($mysqli,$sql);
        $usuario = mysqli_fetch_array($res);

        if(strlen($username) < 5 OR strlen($username) > 10){
            echo "O username deve possuir no mínimo 5 e no máximo 10 caracteres.<br>";
            $erro = 1;
        }
        if(!password_verify($senha_atual,$usuario["senha_cript"])){
            echo "A senha atual está errada.<br>";
            $erro = 1;
        }
        if(strlen($senha_nova) < 5 OR strlen($senha_nova) > 10){
            echo "A senha nova deve possuir no mínimo 5 e no máximo 10 caracteres.<br>";
            $erro = 1;
        }
        if($senha_nova != $senha_nova_rep){
            echo "A senha nova não foi repetida corretamente.<br>";
            $erro = 1;
        }
        if($username == $senha_nova){
            echo "O username e a senha nova devem ser diferentes.<br>";
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
        if(isset($_POST['adm'])){
            
        }

        
        // VERIFICA SE NÃO HOUVE ERRO 
        if($erro == 0) {
            $senha_cript = password_hash($senha_nova, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET username = '$username', senha_cript = '$senha_cript',";
            $sql .= "email = '$email'";
            $sql .= "WHERE cod_usuario = $cod_usuario;";  
            mysqli_query($mysqli,$sql);  
            echo "<br>O usuário foi atualizado com sucesso!"; 
            echo "<br><br><a href='index.html'>Faça o Login</a>"; 

        }
        else{
            echo "<br><a href='altera.php?cod_usuario=".$usuario["cod_usuario"]."'>Voltar para Alterar usuário</a>";
        }
        
        //if(isset($_POST['adm']))
          //  $adm = $_POST['adm'];
    

        
    }
?>