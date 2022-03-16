<?php  include "autenticaadm.inc" ?> 


<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href="assets/css/buscacss.CSS">
    <title>Exibir Usuários</title>
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
            
                $sql = "SELECT * FROM usuarios;";
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
                for($i=0; $i < $linhas; $i++){
                    $usuario = mysqli_fetch_array($res);
                    
                            include("exibir_usuario_card_adm.php");
                        
                }
                mysqli_close($mysqli);
            ?>
        
                        
            <?php  ?>
    </body>
</html>