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
                        <div class="post">    
                                <p class="postagem"><?php echo $posts["post"]."<br>";?></p>
                                        <div class="comments">
                                                <p class="titulo-comentario">Comentários</p>

                                                <form action="comment.php" method="POST">
                                                        <input type="hidden" name="operacao" id="operacao" value="comenta">
                                                        <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
                                                        <input type="hidden" name="cod_postagem" value="<?php echo $posts['id_post'] ?>">
                                                        <textarea  id="comentario" name="comentario"  placeholder="Comente aqui..." type="text" rows="2"></textarea>

                                                        <button type="submit" class="btnSubmitForm">Publicar</button>
                                                </form>
                                        </div>        
                        </div>
                  </body>
        <html>
<?php
               }
                mysqli_close($mysqli);
        }
?>