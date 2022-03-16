<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href="assets/css/publicacoes.CSS">
    <title>Publicações</title>
</head>
<body>
    <?php include "navuser.php" ?>
<?php
        include "conexao.php";
        $operacao = $_POST["operacao"];
        
        if($operacao == "postagem"){
                
                $cod_usuario = $_POST["cod_usuario"];
                $post = $_POST["post"];
        
                $sql = "INSERT INTO posts (cod_autor,post)";
                $sql .= "VALUES ('$cod_usuario','$post');";  
                //mysqli_query($mysqli,$sql);  
                //echo "<br>Novo Post completo.";
                
                header("Location: home.php");
                mysqli_query($mysqli,$sql);  
        }
        elseif($operacao == "mostrarpublicacoes"){
                $cod_usuario = $_POST["cod_usuario"];
                //$img_post = $_FILES["img_post"];
        
                
                 $sql = "SELECT * FROM posts WHERE cod_autor = '$cod_usuario';";
                 
                  $res = mysqli_query($mysqli,$sql);
                  $linhas = mysqli_num_rows($res);
                  for($i=0; $i < $linhas; $i++){
                    $posts = mysqli_fetch_array($res);
                    ?>
        <html>
        <link rel='stylesheet' href="post.css">
        <body>
        <div class="exterior">
                <div class="interior">
                <p class="postagem"><?php echo $posts["post"]."<br>";?></p>
                        <div class="comments">
                                <form action="comment.php" method="POST">
                                        <input type="hidden" name="operacao" id="operacao" value="comenta">
                                        <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
                                        <input type="hidden" name="cod_postagem" value="<?php echo $posts['id_post'] ?>">
                                        <textarea  id="comentario" name="comentario"  placeholder="Comente aqui..." type="text" rows="2"></textarea>

                                        <button type="submit" class="btnSubmitForm">Publicar</button>
                                </form>
                                <form action="comment.php" method="POST">
                                        <input type="hidden" name="operacao" id="operacao" value="mostcoment">
                                        <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
                                        <input type="hidden" name="id_post" value="<?php echo $posts['id_post'] ?>">
                                        <button type="submit">Mostrar comentários</button>
                                </form>
                                <form method="POST">
                        <input type="hidden" name="operacao" value="curtir">
                        <input type="hidden" name="cod_post" value="<?php echo $posts['id_post']; ?>">
                        <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario; ?>">
                        <?php
                        $cod_postagem = $posts['id_post'];
                        $sql = "SELECT * FROM curtidas WHERE cod_usuario = $cod_usuario AND cod_postagem = $cod_postagem;";
                        $rescoment2 = mysqli_query($mysqli,$sql);
                        $curtida = mysqli_fetch_array($rescoment2);

                        $url = $_SERVER["REQUEST_URI"];

                        if($cod_usuario == $curtida['cod_usuario'] && $posts['id_post'] == $curtida['cod_postagem']){
                                echo "<input class='btn btn-block btn-sm btn-danger' type='submit' value='Descurtir'>";
                        }else{
                                echo "<input class='btn btn-block btn-sm btn-success' type='submit' value='Curtir'>";
                        }
                        ?>
                        <input type="hidden" name="url" value="<?php echo $url; ?>">
                </form>    
                        </div>
                </div>        
        </div>
        </body>
        <html>
<?php
               }
        }
        elseif($operacao == "curtir"){

                $url = $_POST["url"];
                $cod_usuario = $_POST["cod_usuario"];
                $cod_postagem = $_POST["cod_post"];
                
                $sql = "SELECT * FROM curtidas WHERE cod_usuario = $cod_usuario AND cod_postagem = $cod_postagem;";
                $res = mysqli_query($mysqli,$sql);
                $curtida = mysqli_fetch_array($res);

                if($cod_usuario == $curtida['cod_usuario'] && $cod_postagem == $curtida['cod_postagem']){
                
                        $sql = "DELETE FROM `curtidas` WHERE `curtidas`.`cod_postagem` = $cod_postagem AND `curtidas`.`cod_usuario` = $cod_usuario;";
                        mysqli_query($mysqli,$sql);

                        echo "<a href='home.php'>VOLTAR</a>";
                        //header ("Location: ".$url);

                }else{

                        $sql = "INSERT INTO curtidas (cod_usuario,cod_postagem)";
                        $sql .= "VALUES ('$cod_usuario','$cod_postagem');";  
                        mysqli_query($mysqli,$sql);

                        echo "<a href='home.php'>VOLTAR</a>";
                        //header ("Location: ".$url);

                }     
        }
        mysqli_close($mysqli);

?>