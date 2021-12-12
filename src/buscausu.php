<?php
    include ("conexao.php");
    include ("autentica.inc");
    $operacao = $_POST["operacao"];

    if($operacao == "buscausu"){

        $username = $_POST["username"];

        $sql = "SELECT * FROM usuarios WHERE username like '%$username%';";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        
        for($i=0; $i < $linhas; $i++){
            $usuario = mysqli_fetch_array($res);
            echo "<strong>Username:</strong> ".$usuario["username"]."<br>";
        }
        
    }

    mysqli_close($mysqli);

?>
