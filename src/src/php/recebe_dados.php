<?php
    $operacao = $_POST["operacao"];
    include "conexao.php";

    if($operacao == "inserir"){
        $username = $_POST["username"];
        $senha = $_POST["senha"];
        $email = $_POST["email"];
        $consenha = $_POST["confirmarsenha"];
        $erro = 0;

        if(strlen($username) < 5 OR strlen($username) > 15){
            echo "O username deve possuir no mínimo 5 e no máximo 15 caracteres.<br>";
            $erro = 1;
        }
        if(strlen($senha) < 5 OR strlen($senha) > 18){
            echo "A senha deve possuir no mínimo 5 e no máximo 18 caracteres.<br>";
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
        $sql_conferir_user = "SELECT * FROM usuarios WHERE username like '$username';";
        $resultado_user = mysqli_query($mysqli,$sql_conferir_user);
        $linhas_user = mysqli_num_rows($resultado_user);
            if($linhas_user != 0){
                echo "<script type='text/javascript'>alert('O username já está sendo utilizado');</script>";
                echo "<br><br><a href='cadastro.php'>Volte para o cadastro</a>"; 
                $erro = 1;
            }
        // VERIFICA SE NÃO HOUVE ERRO 
        if($erro == 0) {
            $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (username,senha_cript,email,adm)";
            $sql .= "VALUES ('$username','$senha_cript','$email',0);";  
        $var = mysqli_query($mysqli,$sql);  
        //echo "Esse é o valor do var $var";
            //echo "<br>O usuário foi cadastrado com sucesso!"; 
            header("Location: index.html");
        }
    }
    elseif($operacao == "atualizar"){

        $cod_usuario = $_POST["cod_usuario"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        // $adm = $_POST["adm"];
        $erro = 0;

        $sql = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;";
        $res = mysqli_query($mysqli,$sql);
        $usuario = mysqli_fetch_array($res);

        if(strlen($username) < 5 OR strlen($username) > 10){
            echo "O username deve possuir no mínimo 5 e no máximo 10 caracteres.<br>";
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
            $sql = "UPDATE usuarios SET username = '$username',";
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
        // VERIFICA SE NÃO HOUVE ERRO 
        if($erro == 0) {
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
    }

    mysqli_close($mysqli);
?>
