<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href="assets/css/exibirusuarios.CSS">
    <title>Buscar usuários</title>
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
            <li><a href="ALTERA.php">Alterar conta</a></li>
            <li><a href="php/logout.php">Logout</a></li>
        </ul>
    </nav>
<?php
    include "php/conexao.php";
    $operacao = $_POST["operacao"];

    if($operacao == "exibir"){
        $username = $_POST["username"];
        $sql = "SELECT * FROM usuarios WHERE username like '%$username%';";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        for($i=0; $i < $linhas; $i++){
            $usuario = mysqli_fetch_array($res);
            ?>
                <div class="exterior">
                    <div class="interior">
                        <strong>Username:</strong> <?php echo $usuario["username"]; ?><br>
                        <strong>Email:</strong> <?php echo $usuario["email"]; ?><br><br>
                        <form action="postagem.php" method="POST">     
                            <input type="hidden" name="operacao" value="mostrarpublicacoes">    
                            <input type="hidden" name="cod_usuario" value="<?php echo $usuario["cod_usuario"]; ?>">                    
                            <button type="submit">Mostrar Publicações</button>
                        </form>
                    </div>     
                </div> 
                <body>
            <?php
        }
    }
    elseif($operacao == "exibiradm"){
        $username = $_POST["username"];
        $sql = "SELECT * FROM usuarios WHERE username like '%$username%';";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        for($i=0; $i < $linhas; $i++){
            $usuario = mysqli_fetch_array($res);
            ?>
                <div class="exterior">
                    <div class="interior">
                        <strong>Username:</strong> <?php echo $usuario["username"]; ?><br>
                        <strong>Email:</strong> <?php echo $usuario["email"]; ?><br><br>
                        <a href='alteraadm.php?cod_usuario= <?php echo $usuario["cod_usuario"]; ?>'>Alterar usuário</a><br><br>
                        <a href='php/deletar.php?cod_usuario= <?php echo $usuario["cod_usuario"]; ?>'>Deletar</a><br><br>
                        <form action="postagem.php" method="POST">     
                            <input type="hidden" name="operacao" value="mostrarpublicacoes">    
                            <input type="hidden" name="cod_usuario" value="<?php echo $usuario["cod_usuario"]; ?>">                    
                            <button type="submit">Mostrar Publicações</button>
                        </form>
                        <?php
                            if($usuario["adm"] != 0){
                                ?>
                                    <a href='php/tirar.php?cod_usuario= <?php echo $usuario["cod_usuario"]; ?>'><input type='button' value='Tirar admistrador'/></a>
                                <?php
                            }elseif($usuario["adm"] == 0){
                                ?>
                                    <a href='php/conceder.php?cod_usuario= <?php echo $usuario["cod_usuario"]; ?>'><input type='button' value='Conceder admistrador'/> </a><br><br>
                                <?php
                            }
                                ?>
                    </div>     
                </div> 
                <body>
            <?php
        }
    }elseif($operacao == "exibirtodosadm"){
        $sql = "SELECT * FROM usuarios WHERE cod_usuario > 0;";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        for($i=0; $i < $linhas; $i++){
            $usuario = mysqli_fetch_array($res);
            ?>
                <div class="exterior">
                    <div class="interior">
                        <strong>Username:</strong> <?php echo $usuario["username"]; ?><br>
                        <strong>Email:</strong> <?php echo $usuario["email"]; ?><br><br>
                        <a href='alteraadm.php?cod_usuario= <?php echo $usuario["cod_usuario"]; ?>'>Alterar usuário</a><br><br>
                        <a href='php/deletar.php?cod_usuario= <?php echo $usuario["cod_usuario"]; ?>'>Deletar</a><br><br>
                        <form action="postagem.php" method="POST">     
                            <input type="hidden" name="operacao" value="mostrarpublicacoes">    
                            <input type="hidden" name="cod_usuario" value="<?php echo $usuario["cod_usuario"]; ?>">                    
                            <button type="submit">Mostrar Publicações</button>
                        </form>
                        <?php
                            if($usuario["adm"] != 0){
                                ?>
                                    <a href='php/tirar.php?cod_usuario= <?php echo $usuario["cod_usuario"]; ?>'><input type='button' value='Tirar admistrador'/></a>
                                <?php
                            }elseif($usuario["adm"] == 0){
                                ?>
                                    <a href='php/conceder.php?cod_usuario= <?php echo $usuario["cod_usuario"]; ?>'><input type='button' value='Conceder admistrador'/> </a><br><br>
                                <?php
                            }
                                ?>
                    </div>     
                </div> 
                <body>
            <?php
        }
    }
    mysqli_close($mysqli);
?>