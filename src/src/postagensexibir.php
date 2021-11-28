<div class="navbar" style="position:relative; width:100%; z-index:1">
    <a href="home.php">Início</a>                        
</div>
<br><br>
<?php
    
    $operacao = $_GET["operacao"];
    include "conexao.php";
    include "informacoes.inc";
?>
<head>


    <title> Cook Eat (Postagens)</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Tema CSS -->
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>


<div class="navbar navbar-collapse" style="position:fixed; width:100%; z-index:1; border-radius:0">
    <a href="home.php" class="active">Início</a>
  
<?php

    if($operacao == "exibir"){
        $cod_usuario = $_GET["cod_usuario"];
        $sql = "SELECT * FROM postagens WHERE cod_autor = $cod_usuario;";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);

        for($i=0; $i < $linhas; $i++){
            $postagem = mysqli_fetch_array($res);

?>

<body style="font-family: Arial, Helvetica, sans-serif; background-image: url('../assets/img/logo4.png'); background-size: 200%;">
                <div style="color:black;" class="container">
                    <div class="row">
                        <div class="jumbotron container" style="border-radius: 12px; text-align:center;">
                            <h4>
                                <?php 
                                    if($postagem["texto"] == NULL)
                                    echo "<h3><small class='text-uppercase font-weight-bold text-muted'>Postagem sem legenda</small></h3>";
                                    else
                                    echo $postagem["texto"] ."<br>"; 
                                ?>
                            </h4>
                                <p style="text-align: right; font-size: 80%"><small class="text-uppercase font-weight-bold text-muted">
                                    <?php 
                                        $sql = "SELECT * FROM usuarios WHERE cod_usuario = ".$postagem['cod_autor'].";";
                                        $resusuario = mysqli_query($mysqli,$sql);
                                        $usuario = mysqli_fetch_array($resusuario);

                                        echo "(", $postagem['datapost'], ") by ", $usuario["username"];
                                    ?>
                                </p></small>
                            </small></p>
                            <img src='<?php echo $postagem['caminho_post']?>'alt='Postagem' width='60%' height='60%'>
                            <br><br>
                            <?php
                                if($cod_usuariocarta == $postagem['cod_autor']){
                            ?>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Opções</button>
                                    <ul class="dropdown-menu">
                                        <form action="postagensexibir.php" method="GET">
                                            <input type="hidden" name="operacao" value="editarpost1">
                                            <input type="hidden" name="cod_post" value="<?php echo $postagem['cod_post']?>">
                                            <li><input class='btn btn-block btn-sm btn-dark' type="submit" value="Editar"></li>
                                        </form>
                                        <form action="postagensexibir.php" method="GET">
                                            <input type="hidden" name="operacao" value="deletarpost">
                                            <input type="hidden" name="cod_post" value="<?php echo $postagem['cod_post']?>">
                                            <li><input class='btn btn-block btn-sm btn-danger' type="submit" value="Deletar"></li>
                                        </form>
                            
                                    <form action="postagensexibir.php" method="GET">
                                        <input type="hidden" name="operacao" value="deletarpost">
                                        <input type="hidden" name="cod_post" value="<?php echo $postagem['cod_post']?>">
                                        <input class='btn btn-block btn-sm btn-danger' type="submit" value="Deletar">
                                    </form>
                            <?php
                               }
                            ?>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
                
            </body>

<?php

        }
    }
    elseif($operacao == "deletarpost"){
        
            $cod_post = $_GET['cod_post'];

            $sql = "SELECT * FROM postagens WHERE `postagens`.`cod_post` = '$cod_post';";
            $res = mysqli_query($mysqli,$sql);
            $postagem = mysqli_fetch_array($res);
            unlink($postagem['caminho_post']);

            $sql = "DELETE FROM `postagens` WHERE `postagens`.`cod_post` = '$cod_post';";
            mysqli_query($mysqli,$sql);
            echo "Postagem deletada com sucesso!";
            echo "<a href='../index.php'>Voltar ao início</a>";
    }
    elseif($operacao == "exibiroutros"){

        $cod_usuario = $_GET["cod_usuario"];
        $sql = "SELECT * FROM postagens WHERE cod_autor = $cod_usuario;";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        
        for($i=0; $i < $linhas; $i++){
            $postagem = mysqli_fetch_array($res);

?>

<body style="font-family: Arial, Helvetica, sans-serif; background-image: url('../assets/img/logo4.png'); background-size: 200%;">
                <div style="color:black;" class="container">
                    <div class="row">
                        <div class="jumbotron container" style="border-radius: 12px; text-align:center;">
                            <h4>
                                <?php 
                                    if($postagem["texto"] == NULL)
                                    echo "<h3><small class='text-uppercase font-weight-bold text-muted'>Postagem sem legenda</small></h3>";
                                    else
                                    echo $postagem["texto"] ."<br>"; 
                                ?>
                            </h4>
                                <p style="text-align: right; font-size: 80%"><small class="text-uppercase font-weight-bold text-muted">
                                    <?php 
                                        $sql = "SELECT * FROM usuarios WHERE cod_usuario = ".$postagem['cod_autor'].";";
                                        $resusuario = mysqli_query($mysqli,$sql);
                                        $usuario = mysqli_fetch_array($resusuario);

                                        echo "(", $postagem['datapost'], ") by ", $usuario["username"];
                                    ?>
                                </p></small>
                            </small></p>
                            <img src='<?php echo $postagem['caminho_post']?>'alt='Postagem' width='60%' height='60%'>
                            <br><br>
                            <?php
                                if($cod_usuariocarta == $postagem['cod_autor']){
                            ?>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Opções</button>
                                    <ul class="dropdown-menu">
                                        <form action="postagensexibir.php" method="GET">
                                            <input type="hidden" name="operacao" value="editarpost1">
                                            <input type="hidden" name="cod_post" value="<?php echo $postagem['cod_post']?>">
                                            <li><input class='btn btn-block btn-sm btn-dark' type="submit" value="Editar"></li>
                                        </form>
                                        <form action="postagensexibir.php" method="GET">
                                            <input type="hidden" name="operacao" value="deletarpost">
                                            <input type="hidden" name="cod_post" value="<?php echo $postagem['cod_post']?>">
                                            <li><input class='btn btn-block btn-sm btn-danger' type="submit" value="Deletar"></li>
                                        </form>
                            
                                    <form action="postagensexibir.php" method="GET">
                                        <input type="hidden" name="operacao" value="deletarpost">
                                        <input type="hidden" name="cod_post" value="<?php echo $postagem['cod_post']?>">
                                        <input class='btn btn-block btn-sm btn-danger' type="submit" value="Deletar">
                                    </form>
                            <?php
                               }
                            ?>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
                
            </body>
<?php 
        }
    }
    elseif($operacao == "exibirtodos"){

        $sql = "SELECT * FROM postagens WHERE caminho_post like '%a%';";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        
        for($i=0; $i < $linhas; $i++){
            $postagem = mysqli_fetch_array($res);

?>

            <body style="font-family: Arial, Helvetica, sans-serif; background-image: url('../assets/img/logo4.png'); background-size: 200%;">
                <div style="color:black;" class="container">
                    <div class="row">
                        <div class="jumbotron container" style="border-radius: 12px; text-align:center;">
                            <h4>
                                <?php 
                                    if($postagem["texto"] == NULL)
                                    echo "<h3><small class='text-uppercase font-weight-bold text-muted'>Postagem sem legenda</small></h3>";
                                    else
                                    echo $postagem["texto"] ."<br>"; 
                                ?>
                            </h4>
                                <p style="text-align: right; font-size: 80%"><small class="text-uppercase font-weight-bold text-muted">
                                    <?php 
                                        $sql = "SELECT * FROM usuarios WHERE cod_usuario = ".$postagem['cod_autor'].";";
                                        $resusuario = mysqli_query($mysqli,$sql);
                                        $usuario = mysqli_fetch_array($resusuario);

                                        echo "(", $postagem['datapost'], ") by ", $usuario["username"];
                                    ?>
                                </p></small>
                            </small></p>
                            <img src='<?php echo $postagem['caminho_post']?>'alt='Postagem' width='60%' height='60%'>
                            <br><br>
                            <?php
                                if($cod_usuariocarta == $postagem['cod_autor']){
                            ?>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Opções</button>
                                    <ul class="dropdown-menu">
                                        <form action="postagensexibir.php" method="GET">
                                            <input type="hidden" name="operacao" value="editarpost1">
                                            <input type="hidden" name="cod_post" value="<?php echo $postagem['cod_post']?>">
                                            <li><input class='btn btn-block btn-sm btn-dark' type="submit" value="Editar"></li>
                                        </form>
                                        <form action="postagensexibir.php" method="GET">
                                            <input type="hidden" name="operacao" value="deletarpost">
                                            <input type="hidden" name="cod_post" value="<?php echo $postagem['cod_post']?>">
                                            <li><input class='btn btn-block btn-sm btn-danger' type="submit" value="Deletar"></li>
                                        </form>
                            
                                    <form action="postagensexibir.php" method="GET">
                                        <input type="hidden" name="operacao" value="deletarpost">
                                        <input type="hidden" name="cod_post" value="<?php echo $postagem['cod_post']?>">
                                        <input class='btn btn-block btn-sm btn-danger' type="submit" value="Deletar">
                                    </form>
                            <?php
                               }
                            ?>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
                
            </body>

<?php
        }
    }
    elseif($operacao == "editarpost1"){

    $cod_post = $_GET["cod_post"];
    $sql = "SELECT * FROM postagens WHERE cod_post = $cod_post;";
    $res = mysqli_query($mysqli,$sql);
    $postagem = mysqli_fetch_array($res);
?>
	<body>
        <h1 style="text-align: center;"><br>Edição de Postagem</h1><br>
        <form action="recebe_dados.php" method="POST" style="margin:15px;">
            <input type="hidden" name="operacao" value="editarpost2">
            <input type="hidden" name="cod_post" value="<?php echo $cod_post?>">
            <p>Legenda: <input type="text" name="texto" size="80" value="<?php echo $postagem['texto']?>"> </p>
            <h2><a href="../atualiza_postagem.php?cod_post='<?php echo $cod_post?>'">Atualizar postagem:<br></h2> 
                <img src='../src/<?php echo $postagem['caminho_post'] ?>'alt='Postagem' width='400' height='400'>
            </a>
            <p><br><input class="btn-dark btn-lg btn-block" type="submit" value="Enviar!"></p>
        </form>
	<body>
<?php
    }
    mysqli_close($mysqli);
?>