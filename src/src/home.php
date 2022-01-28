<?php 
    include "php/autentica.inc";
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
        <link rel='stylesheet' href="assets/css/styleee.css">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
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
        <main class="main">
            <div class="newPost">
                <div class="infoUser">
                    <strong> Bem-vindo, <?php echo $usuario["username"]?>!</strong>
                </div>

                <form action="postagem.php" class="formPost" method="POST">
                    <input type="hidden" name="operacao" id="operacao" value="postagem">
                    <textarea id="post" id="post" name="post"  placeholder="Diga como está se sentindo..." type="text"></textarea>
                    <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
                    <div class="iconsAndButton">
                        <button type="submit" class="btnSubmitForm">Publicar</button>
                    </div>
                </form>
            </div>
            <form action="postagem.php" method="POST">
                <input type="hidden" name="operacao" id="operacao" value="mostrarpublicacoes">
                <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario;?>">
                <button type="submit" class="mostposts">Mostrar publicações</button>
            </form>
        </main>

        <script src="assets/js/mobile-navbar.js"></script>

    </body>
</html>
<?php
    mysqli_close($mysqli);
?>