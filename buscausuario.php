<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
        <link rel='stylesheet' href="buscacss.CSS">
        <title>Buscar usuários</title>
    </head>

    <form action="recebe_dados.php" method="POST">
        <div class="search-box">
            <input type="hidden" name="operacao" value="buscar">
            <input class="search-txt" type="text" name="" placeholder="Procure o usuário...">
            <a class="search-btn" href=""><i class="fas fa-search"></i></a>
        
        </div>
    </form>
</html>