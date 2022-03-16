<?php
include("autenticaadm.inc");
include("conexao.php");
$cod_usuario = $_GET["cod_usuario"];

        $sql = "DELETE FROM usuarios WHERE cod_usuario LIKE $cod_usuario;";
        mysqli_query($mysqli,$sql);
        mysqli_close($mysqli);
        header("Location:deleteduser.php");
?>