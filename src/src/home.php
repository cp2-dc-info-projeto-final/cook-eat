<?php 
    include "autentica.inc";
    include "conexao.php";
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
        <?php include "navuser.php" ?> <br><br><br>
        <main class="main">
            <div class="newPost">
                <div class="infoUser">
                    <strong> Bem-vindo, <?php if ($usuario["adm"] == 1) { echo "administrador"; }else { echo $usuario["username"]; } ?>!</strong>
                </div>

                <form action="postarfeedback.php" class="formPost" method="POST">
                    <input type="hidden" name="operacao" id="operacao" value="postagem">
                    <textarea id="post" id="post" name="post"  placeholder="Diga como está se sentindo..." type="text"></textarea>
                    <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
                    <div class="iconsAndButton">
                        <button type="submit" class="btnSubmitForm">Publicar</button>
                    </div>
                </form>
            </div>
           
              <a href="perfilmeu.php">  <button  class="mostposts">Minhas publicações</button> </a>
           
        </main>

        <script src="assets/js/mobile-navbar.js"></script>

    </body>
</html>
<?php
    mysqli_close($mysqli);
?>