<?php
    include "conexao.php";
    $cod_usuario = $_GET["cod_usuario"];
    $sql = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;";
    $res = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($res);
    
    //$adm = $_POST["adm"];
    //$cod_usuario = $_GET["cod_usuario"];

    $sql = "UPDATE usuarios SET adm = 0  WHERE usuarios . cod_usuario = '$cod_usuario'";
    $res = mysqli_query($mysqli,$sql);
    echo "Admistrador retirado com sucesso!";
    echo "<br><br><a href='listar.php'>Volte para a listagem</a>";
    mysqli_close($mysqli);
    
?>