<?php 

include "autentica.inc";
include "conexao.php";
$cod_usuario = $_SESSION["cod_usuario"];

?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Home</title>
        <link rel='stylesheet' href="st.css">
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
                    <li><a href="buscausuario.php">Buscar usuário</a></li>
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

            <main class="main">
                <div class="newPost">
                    <div class="infoUser">
                        <div class="imgUser"></div>
                        <strong>  <?php echo $usuario["username"]?> </strong>
                    </div>


                    <form action="postagem.php" class="formPost" method="POST">
                        <input type="hidden" name="operacao" id="operacao" value="postagem">
                        <textarea id="post" id="post" name="post"  placeholder="Diga como está se sentindo..." type="text"></textarea>
                        <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">

                        <div class="iconsAndButton">
                                <div class="icons">
                                <input type="file" name="file" id="file" hidden >
                                <label for="file"><img src="./imagens/img.svg" style="cursor:pointer" ></label>
                                <button><img src="./imagens/video.svg" alt="Adicionar um video"></button>
                                </div>
                            <button type="submit" class="btnSubmitForm">Publicar</button>
                        </div>

                    </form>

                </div>

                <ul class="posts">
                        
                </ul>


            </main>

 
        <script src="mobile-navbar.js"></script> 
    </body>

</html>