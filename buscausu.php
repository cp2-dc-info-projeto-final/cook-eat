
<?php
    include "conexao.php";
    include "autentica.inc";
    $operacao = $_POST["operacao"];

    if($operacao == "buscausuario.php"){

        $username = $_POST["username"];

        $sql = "SELECT * FROM usuarios WHERE username like '%$username%';";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        
        for($i=0; $i < $linhas; $i++){
            $usuario = mysqli_fetch_array($res);
            echo "<strong>Username:</strong> ".$usuario["username"]."<br>";
        }

        mysqli_close($mysqli);
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
        <link rel='stylesheet' href="buscacss.CSS">
        <title>Buscar usuários</title>
    </head>

    <form action="buscausuario.php" method="POST">
        <div class="search-box">
            <input type="hidden" name="operacao" value="buscar">
            <input class="search-txt" type="text" name="" placeholder="Procure o usuário...">
            <a class="search-btn" href=""><i class="fas fa-search"></i></a>
        
        </div>
    </form>
</html>
