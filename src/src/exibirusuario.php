<?php  include "autentica.inc" ?> 


<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href="assets/css/buscacss.CSS">
    <title>Buscar usuários</title>
    </head>
    <style>
        body{
    background: linear-gradient(-45deg, #ffce51, #ff7253, #fd5754);
    font-family: 'Poppins', sans-serif;
}
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
    <body>
            
        <?php
            include "navuser.php";
            include "conexao.php";
            echo "<br><br><br><br><br><br>";
            

            
                $username = $_POST["username"];
                $sql = "SELECT * FROM usuarios WHERE username like '%$username%';";
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
                for($i=0; $i < $linhas; $i++){
                    $usuario = mysqli_fetch_array($res);
                    
                        if($_SESSION["adm"] == 1){
                            include("exibir_usuario_card_adm.php");
                        }else{
                            include("exibir_usuario_card.php");
                        }
                    
                
                }
                mysqli_close($mysqli);
            ?>
        
                        
            <?php  ?>
    </body>
</html>