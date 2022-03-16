<html>
    <head>
    <?php include "autenticadeslogado.inc" ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <title>Login</title>
        <link rel='stylesheet' href="assets/css/index.css">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
    </head>

    <body>
        
        <form action="login.php" method="POST">
            <h2><img src="assets/img/logo.png" width="65">COOKEAT</h2>
            <br>
            <p>Username: <input type="text" name="username" size="10" placeholder="Digite seu username..." > </p><br>
            <p>Senha: <input type="password" name="senha" size="10" placeholder="Digite sua senha..." > </p>
            <br>
            <p><input type="submit" value="Enviar" ></p> 
            <br><hr><br>
            <a class="btn" href="cadastro.php" font="Poppins" >  &nbsp;  Cadastre-se   &nbsp; </a>
        </form>
    
    </body>
</html>