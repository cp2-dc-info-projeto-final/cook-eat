<?php 
    include "autentica.inc";
    include "conexao.php";
    $cod_usuario = $_GET["cod_usuario"];
    $sql = "SELECT * FROM usuarios WHERE cod_usuario = '$cod_usuario';";
    $res = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($res); 
    if ($_SESSION["username"] == $usuario["username"]){
        header("Location: perfilmeu.php");
    }
    ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <title> Perfil</title>
        <link rel='stylesheet' href="assets/css/styleee.css">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
    </head>
    <style>
        nav{
    background: white	 ;    
}
@media( max-width: 999px){
    body{
        overflow-x: hidden;
    }
    .nav-list{        
        background: white	 ;;        

    }
    .nav-list li{
        margin-left: 0;
        opacity: 0;
    }
    .mobile-menu {
        display: block;
    }
}
    </style>
    <body style=" background: linear-gradient(-45deg,  #ffce51, #ff7253, #fd5754)" >
    
        <?php include "navuser.php" ?>
        <br><br><br><br><br>
       
            
           <div style="background-color: white; padding: 20px; border-radius: 20px; width: 400px; margin: auto; border-color: black; border: 1">
                
                    <h2 style='text-align: center'>Perfil de <?php echo $usuario["username"] ?></h2><br>
                
            </div>
            
        
            <div style="background-color: white; text-align: center; border-color: black; border: 1"> <br><br>
            <?php if( $_SESSION["adm"] == 1 ){
                echo'<h3> Identificador:'; echo $cod_usuario; echo  '</h3>'; 
            }
            ?>
            <h3> Username: <?php echo $usuario["username"]; ?></h3>
            <h3> Email: <?php echo $usuario["email"]; ?></h3>
            <h3> Administrador: <?php if($usuario["adm"] == 1) { echo "Sim"; } else { echo"Não"; } ?></h3>
          <?php if( $_SESSION["adm"] == 1){
              include("alteradadosbutton.php"); 
              include("deleteuserbutton.php");
                if($usuario["adm"] == 1){
                    include("demotebutton.php");
                } else{
                    include("promotebutton.php");
                }
            }
          ?>
            
            <br><br> </div>
            <br><br>
            <h1 style="color: white; text-align: center;font-size:100px"> Timeline </h1>
       
    
<br><br>
<div style="margin: auto; text-align: center">
    <?php 
        $sql = "SELECT * FROM posts WHERE cod_autor = $cod_usuario;";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        for($i=0; $i < $linhas; $i++){
            $postagem = mysqli_fetch_array($res);
            if($_SESSION["adm"] == 1){
                include("postagemcardmeu.php");
            }else{
                include("postagemcard.php");
            }
            
            
        }
        ?><br><br>
</div>



<br>




    </body>
    </html>