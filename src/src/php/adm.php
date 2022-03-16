<?php 
    include "autenticaadm.inc";
    include "php/conexao.php";
    $sql = "SELECT * FROM usuarios WHERE username = '$username';";
    $res = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($res);
    $cod_usuario = $_SESSION["cod_usuario"];
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <title>Início</title>
        <link rel='stylesheet' href="assets/css/exibirusuarios.css">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav>
            <li><a class="logo" href="home.php">Cookeat</a></li>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class= "nav-list">
                <li><a href="buscausuario.php">Buscar usuário</a></li>
                <li><a href="ALTERA.php">Alterar conta</a></li>
                <li><a href="php/logout.php">Logout</a></li>
                <?php 
                    //session_start();
                    if($usuario["adm"] == 1)
                        echo "<li><a href='adm.php'>Admistração</a></li>";
                ?>
            </ul>
        </nav>
        <div class="exterior">
            <div class="interior">
                <p>Clique no botão abaixo para mostrar todos os usuários cadastrados:</p>
                <br>
                <form action="exibirusuario.php" method="POST">
                    <input type="hidden" name="operacao" value="exibirtodosadm">
                    <button id="btn" type="submit">Mostrar usuários</button>
                </form>
                <br>
                <h3>Busca de Usuário</h3>
                <br>
                <form action="exibirusuario.php" method="POST">
                    <input type="hidden" name="operacao" value="exibiradm">
                    <p>Username: <input type="text" name="username" size="10"> </p>
                    <p><input type="submit" value="Buscar"></p>
                </form>
            </div>    
        </div>
    <body>
</html>

