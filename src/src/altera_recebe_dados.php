<?php
    include "autentica.inc";
    include "conexao.php";
    
        $username = $_POST["username"];
        $senha_atual = $_POST["senha_atual"];
        $senha_nova = $_POST["senha_nova"];
        $senha_nova_rep = $_POST["senha_nova_rep"];
        $email = $_POST["email"];
        $cod_usuario = $_POST["cod_usuario"];
        $erro = 0;

        
?>
<html>
    
    <head>       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <title>Alterar Dados</title>
        <link rel='stylesheet' href="assets/css/index.css">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
    </head>
    <style>
        form button{
            width: 100%;
            height: 40px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg,  #ffce51, #ff7253, #fd5754)	 ;
            color: white;
            border: 0;
            border-radius: 20px;
            transition: 1s;
        }
        form button:hover{
            background: linear-gradient(-45deg,  #eec04c, #ec7054, #ee5a57);

        }
    </style>
    <form action="perfilmeu.php">
        <?php
        if(password_verify($senha_atual, $_SESSION["senha_cript"])){
                if($senha_nova == $senha_nova_rep){
                    if(strlen($username) < 5 OR strlen($username) > 15){
                        echo "<p style='text-align: center'>O username deve possuir no mínimo 5 e no máximo 15 caracteres. </p><br>";
                        $erro = 1;
                    }else{
                        if($username != $_SESSION["username"]){
                            $sql = "SELECT * FROM usuarios WHERE username = '$username'; ";
                            $res = mysqli_query($mysqli,$sql);
                            $linhas_user = mysqli_num_rows($res);
                            if($linhas_user != 0){
                            echo "<p style='text-align: center'> O username já está sendo utilizado. </p><br>";                
                            $erro = 1;
                        }
                        
                         }
                    }
                    
                     
                    if(strlen($senha_nova) < 5 OR strlen($senha_nova) > 16){
                        echo "<p style='text-align: center'>A senha deve possuir no mínimo 5 e no máximo 16 caracteres. </p><br>";
                        $erro = 1;
                    }
                    if($username == $senha_nova){
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
                }else{
                    echo "<p style='text-align: center'> Repita a senha nova corretamente! </p><br>"; 
                    $erro = 1;
                }
        }else{
            echo "<p style='text-align: center'> Senha Errada!</p><br>";
            $erro = 1;
        }
        
        
        // VERIFICA SE NÃO HOUVE ERRO 
        if($erro == 0) {
            $senha_cript = password_hash($senha_nova, PASSWORD_DEFAULT);
          $sql = "UPDATE usuarios SET username = '$username', senha_cript = '$senha_cript', email = '$email' WHERE cod_usuario like $cod_usuario;";
            
        mysqli_query($mysqli,$sql); 
        
        $_SESSION["username"] = $username;
        $_SESSION["senha_cript"] = $senha_cript; 
            echo "<p style='text-align: center'> Dados alterados com sucesso! </p><br>";  
        }
            echo "<p><a href='perfilmeu.php'><button>Voltar</button></a>";
        
        mysqli_close($mysqli);
        ?>




    </html>