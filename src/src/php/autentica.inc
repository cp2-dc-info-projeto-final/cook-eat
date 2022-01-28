<?php
    session_start();
    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
    }
    if(isset($_SESSION["senha_cript"])){
        $senha_cript = $_SESSION["senha_cript"];
    }
    if(empty($username) OR empty($senha_cript)){
       echo"Você não fez o login!"; 
       echo"<p><a href='index.php'>Página de login</a></p>";
        exit;
    }
    else{
        include "conexao.php";
        $sql = "SELECT * FROM usuarios WHERE username = '$username';";
        $res = mysqli_query($mysqli, $sql);

        if(mysqli_num_rows($res) != 1){ // testa se não encontrou o username
            unset($_SESSION["username"]);
            unset($_SESSION["senha_cript"]);
            header("Location: index.php");
            exit;
        }
        else{
            $usuario = mysqli_fetch_array($res);
            if(!hash_equals($usuario["senha_cript"], $senha_cript)){ // testa se a senha está errada
                unset($_SESSION["username"]);
                unset($_SESSION["senha_cript"]);
                header("Location: index.php");
                exit;
            }
        }
        mysqli_close($mysqli);
    }
?>