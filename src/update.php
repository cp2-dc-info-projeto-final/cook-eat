<?php
SESSION_START();
header ('content-type: text/html; charset=utf-8');

include "conexao.php";

?>

        <form action="atualiza.php" method="post">
            <label>
                <br><br>
                <textarea name ="atualiza" row="10" cols="50" required></textarea><br><br>
                <input type ="hidden" name ="id" valeu = "<?php echo $id_update;?>">
                <input type ="submit" value ="Editar">
            </label>
        </form> 
