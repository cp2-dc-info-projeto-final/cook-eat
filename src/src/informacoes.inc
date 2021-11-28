<?php 
  
  include "autentica.inc"; 
  include "conexao.php";

  $sql = "SELECT * FROM usuarios WHERE username like '$username';";
  $res = mysqli_query($mysqli,$sql);
  $usuario = mysqli_fetch_array($res);
  $cod_usuariocarta = $usuario['cod_usuario'];
  $usernamecarta = $usuario['username'];
 
?>