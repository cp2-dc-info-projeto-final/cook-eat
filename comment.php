<?php
    include "conexao.php";
        $operacao = $_POST["operacao"];

        
        if($operacao == "comenta"){

            $cod_usuario = $_POST["cod_usuario"];
            $comentario = $_POST["comentario"];
            $cod_postagem = $_POST["cod_postagem"];
        
            $sql = "INSERT INTO comment (cod_autor,cod_postagem,comentario)";
            $sql .= "VALUES ('$cod_usuario','$cod_postagem','$comentario');";
            mysqli_query($mysqli,$sql); 
            header("Location: home.php");
         
        }
        elseif ($operacao == "mostcoment"){

            $cod_usuario = $_POST["cod_usuario"];
            $cod_postagem = $_POST["id_post"];

            $sql = "SELECT * FROM comment WHERE cod_postagem = $cod_postagem;";
            $rescoment = mysqli_query($mysqli,$sql);
            $linhas = mysqli_num_rows($rescoment);

            for($i=0; $i < $linhas; $i++){
                $comentarios = mysqli_fetch_array($rescoment);
?>
                <body>
                    <form action="comment.php" method="POST">
                        <input type="hidden" name="operacao" value="curtircoment">
                        <input type="hidden" name="cod_comentario" value="<?php echo $comentarios['cod_coment']; ?>">
                        <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario; ?>">
                    <?php
                        
                        $cod_comentario = $comentarios['cod_coment'];
                        $sql = "SELECT * FROM curtidas WHERE cod_usuario = $cod_usuario AND cod_comentario = $cod_comentario;";
                        $res = mysqli_query($mysqli,$sql);
                        $curtida = mysqli_fetch_array($res);

                        $url = $_SERVER["REQUEST_URI"];

                        if($cod_usuario == $curtida['cod_usuario'] && $comentarios['cod_coment'] == $curtida['cod_comentario']){
                            echo "<a href=''><button type='submit' class='btn btn-coment btn-light btn-sm'><span style='color:blue;'>Desurtir</span></button></a>";
                        }else{
                            echo "<a href=''><button type='submit' class='btn btn-coment btn-light btn-sm'><span style='color:gray;'>Curtir</span></button></a>";
                        }
                    ?>
                        <input type="hidden" name="url" value="<?php echo $url; ?>">
                    </form>
                    <h1><?php echo $comentarios["comentario"]."<br>";?></h1>
                </body>
<?php   
            }
        }
        elseif($operacao == "curtircoment"){

            $url = $_POST["url"];
            $cod_usuario = $_POST["cod_usuario"];
            $cod_comentario = $_POST["cod_comentario"];
            
            $sql = "SELECT * FROM curtidas WHERE cod_usuario = $cod_usuario AND cod_comentario = $cod_comentario;";
            $res = mysqli_query($mysqli,$sql);
            $curtida = mysqli_fetch_array($res);
    
            if($cod_usuario == $curtida['cod_usuario'] && $cod_comentario == $curtida['cod_comentario']){
     
                $sql = "DELETE FROM `curtidas` WHERE `curtidas`.`cod_comentario` = $cod_comentario AND `curtidas`.`cod_usuario` = $cod_usuario;";
                mysqli_query($mysqli,$sql);
    
                header ("Location: ".$url);
            }else{
    
                $sql = "INSERT INTO curtidas (cod_usuario,cod_comentario)";
                $sql .= "VALUES ('$cod_usuario','$cod_comentario');";  
                mysqli_query($mysqli,$sql);
    
                header("Location: home.php");
                //header ("Location: ".$url);
            }     
        }
    mysqli_close($mysqli);
?>