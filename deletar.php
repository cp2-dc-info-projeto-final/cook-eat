<?php
    include "conexao.php";

    $cod_usuario = $_GET["cod_usuario"];
    $sql= "DELETE FROM usuarios WHERE usuarios . cod_usuario = $cod_usuario";
    $res = mysqli_query($mysqli,$sql);
    echo "Usuário deletado com sucesso.";
    echo "<br><br><a href='listar.php'>Volte para a listagem</a>";
    
?>