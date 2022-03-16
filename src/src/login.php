<html>
    
    <head>
        <?php include "autenticadeslogado.inc" ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <title>Login</title>
        <link rel='stylesheet' href="assets/css/index.css">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
    </head>
    <form action="index.php">
    <?php

        // Recebe os campos do formulário
        $username = $_POST["username"];
        $senha = $_POST["senha"];

        // Realiza a consulta no banco de dados
        include "conexao.php";
        $sql = "SELECT * FROM usuarios WHERE username = '$username';";
        $res = mysqli_query($mysqli, $sql);

        if(mysqli_num_rows($res) != 1){ // testa se não encontrou o username
            echo "<p style='text-align: center'>Username inválido! </p><br>";
            echo "<p><input type='submit' value='Voltar' ></p>";
        }
        else{
            $usuario = mysqli_fetch_array($res);
            if(!password_verify($senha, $usuario["senha_cript"])){ // testa se a senha está errada
                echo "<p style='text-align: center'>Senha inválida! </p><br>";
                echo "<p><input type='submit' value='Voltar' ></p>";
            }
            else{ // usuário e senha corretos, abre a sessão
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["senha_cript"] = $usuario["senha_cript"];
                $_SESSION["cod_usuario"] = $usuario["cod_usuario"];
                $_SESSION["adm"] = $usuario["adm"];
                // direciona à página inicial
                header("Location: home.php");

            }
            
        }
        mysqli_close($mysqli);
    ?>
    </form>
    </html>