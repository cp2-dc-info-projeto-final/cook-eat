<?php
include "conexao.php";
$atualiza = $_POST['atualiza'];
$id_post = $_POST['id'];
echo "Postagem atualizada: $atualiza<br>";
echo Id da postagem: $id_post<br>";

if ($atualizar){
    $sql = mysqli_query($link, "UPDATE posts SET post = '$atualiza' WHERE id_post = '$id_post'");
    header ("location: home.php");
}else {
    header("location: home.php");
}
?>