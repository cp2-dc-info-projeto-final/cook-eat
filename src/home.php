<?php 

include "autentica.inc";
include "conexao.php";
$cod_usuario = $_SESSION["cod_usuario"];

?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Navbar</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <header>
            <nav>
                <a class="logo" href="home.php">Cookeat</a>
                <div class="mobile-menu">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>

                <ul class= "nav-list">
                    <li><a href="/">Início</a></li>
                    <li><a href="/">Sobre</a></li>
                    <li><a href="ALTERA.php">Alterar conta</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php 
                        //session_start();
                        if($_SESSION["adm"] == 1)
                            echo "<li><a href='listar.php'>Admistração</a></li>";
                    ?>


                </ul>
            </nav>
        </header>
        <main></main>
        <script src="mobile-navbar.js"></script>
    </body>
</html>