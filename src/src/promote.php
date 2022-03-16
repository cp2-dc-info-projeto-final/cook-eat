<?php
include("autenticaadm.inc");
include("conexao.php");
$cod_usuario = $_GET["cod_usuario"];
$um = 1;
        $sql = "UPDATE usuarios SET adm = '$um' WHERE cod_usuario LIKE $cod_usuario;";
        mysqli_query($mysqli,$sql);
        mysqli_close($mysqli);
        header("Location:perfil.php?cod_usuario=$cod_usuario");
?>