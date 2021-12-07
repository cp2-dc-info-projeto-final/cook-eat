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
            $sql = "INSERT INTO usuarios (username,senha_cript,email,adm)";
            $sql .= "VALUES ('$username','$senha_cript','$email',0);";  
        $var = mysqli_query($mysqli,$sql);  
        //echo "Esse é o valor do var $var";
            //echo "<br>O usuário foi cadastrado com sucesso!"; 
            header("Location: index.html");
        }
    }
        elseif($operacao == "exibir"){
        $sql = "SELECT * FROM usuarios;";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        for($i=0; $i < $linhas; $i++){
            $usuario = mysqli_fetch_array($res);
            echo "<strong>Username:</strong> ".$usuario["username"]."<br>";
            echo "<strong>Senha:</strong> ".$usuario["senha_cript"]."<br>";
            echo "<strong>Email:</strong> ".$usuario["email"]."<br>";
            echo "<a href='alteraadm.php?cod_usuario=".$usuario["cod_usuario"]."'>Alterar usuário</a><br>";
            echo "<a href='deletar.php?cod_usuario=".$usuario["cod_usuario"]."'>Deletar</a><br><br>";
            echo "<a href='conceder.php?cod_usuario=".$usuario["cod_usuario"]."'><input type='button' value='Conceder admistrador'/> </a><br><br>";
            echo "<a href='tirar.php?cod_usuario=".$usuario["cod_usuario"]."'><input type='button' value='Tirar admistrador'/></a>";
            echo "<br>----------------------------------<br>";
        }
    }
    elseif($operacao == "buscar"){
        $username = $_POST["username"];
        $sql = "SELECT * FROM usuarios WHERE username like '%$username%';";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        for($i=0; $i < $linhas; $i++){
            $usuario = mysqli_fetch_array($res);
            echo "<strong>Username:</strong> ".$usuario["username"]."<br>";
            echo "<strong>Senha:</strong> ".$usuario["senha_cript"]."<br>";
            echo "<strong>Email:</strong> ".$usuario["email"]."<br>";
            echo "<a href='alteraadm.php?cod_usuario=".$usuario["cod_usuario"]."'>Alterar usuário</a>";
            echo "<br>----------------------------------<br>";
        }
    }
    
    elseif($operacao == "atualizar"){
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
    }
    

    mysqli_close($mysqli);
?>
