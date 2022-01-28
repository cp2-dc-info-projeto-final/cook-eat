<?php 
    include "php/autentica.inc";
    include "php/conexao.php";
    $sql = "SELECT * FROM usuarios WHERE username like '$username';";
    $res = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($res);
    $cod_usuario = $_SESSION["cod_usuario"];
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
        <link rel='stylesheet' href="assets/css/buscacss.CSS">
        <title>Buscar usuários</title>
    </head>
    <body>
        <nav>
            <a class="logo" href="home.php">Cookeat</a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class= "nav-list">
                <li><a href="ALTERA.php">Alterar conta</a></li>
                <li><a href="php/logout.php">Logout</a></li>
                <?php 
                    //session_start();
                    if($_SESSION["adm"] == 1)
                        echo "<li><a href='listar.php'>Admistração</a></li>";
                ?>
            </ul>
        </nav>
        <form action="exibirusuario.php" method="POST">
            <div class="search-box">
                <input type="hidden" name="operacao" value="exibir">
                <input class="search-txt" type="text" attribute="required" name="username" placeholder="Procure o usuário...">
                <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <script src="assets/js/mobile-navbar.js"></script>

    </body>
</html>