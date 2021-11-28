<?php 

include "autentica.inc";
include "conexao.php";
$cod_usuario = $_SESSION["cod_usuario"];

      $sql = "SELECT * FROM usuarios WHERE username like '$username';";
      $res = mysqli_query($mysqli,$sql);
      $usuario = mysqli_fetch_array($res);
      $cod_usuario = $usuario['cod_usuario'];
?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Cookeat</title>
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
        <main>
            <h2>Publique aqui:</h2>
          <h5>
            <?php 
              $timezone = new DateTimeZone('America/Sao_Paulo');
              $datahj00 = new DateTime('now', $timezone);
              echo "<p style='text-align:right'><small class='text-uppercase font-weight-bold text-muted'>", $datahj00->format('d, M, Y (H:i)'), "</small></p>";
            ?>
          </h5>
          <div class="jumbotron">
            <form action="recebe_dados.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="operacao" value="postagem">
              <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
              <p>
                <small class="text-uppercase font-weight-bold text-muted">Escolher arquivo: </small><input type="file" class="btn btn-light" name="img_post">
              </p> 
              <p><input type="text" name="texto" size="80" placeholder="Legenda"></p>        
              <p><input type="submit" value="Publicar" class="btn-lg btn-block btn-dark"></p><h2>Exibe Publicações</h2>
      <div class="jumbotron">
        <p>
          <small class="text-uppercase font-weight-bold text-muted">Clique no botão abaixo para mostrar todas as suas publicações.</small>
        </p> 
        <form action="postagensexibir.php" method="GET">
          <input type="hidden" name="operacao" value="exibirtodos">
          <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
          <p><input type="submit" value="Mostrar todas as publicações" class="btn-lg btn-dark"></p>
        </form>
      </div>



            </form>
      

        </main>
        <script src="mobile-navbar.js"></script>
    </body>
</html>