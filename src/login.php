<?php

        // Recebe os campos do formulário
        $username = $_POST["username"];
        $senha = $_POST["senha"];

        // Realiza a consulta no banco de dados
        include "conexao.php";
        $sql = "SELECT * FROM usuarios WHERE username = '$username';";
        $res = mysqli_query($mysqli, $sql);

        if(mysqli_num_rows($res) != 1){ // testa se não encontrou o username
            echo "Username inválido!";
            echo "<p><a href='index.html'>Página de login</a></p>";
        }
        else{
            $usuario = mysqli_fetch_array($res);
            if(!password_verify($senha, $usuario["senha_cript"])){ // testa se a senha está errada
                echo "Senha inválida!";
                echo "<p><a href='index.html'>Página de login</a></p>";
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