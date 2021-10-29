<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário</title>
        <link rel="stylesheet" href="form.css">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
        <title>Cadastro</title>
    </head>


	
    
    <body>
        <div id="form">
            <form action="recebe_dados.php" method = "POST">
                <input type="hidden" name="operacao" id="operacao" value="inserir">
                <h2 class="title">Cadastrar</h2>
                <label for="username">Username</label>
                <div class="input">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <input id="username" name="username" placeholder="Username" type="text">
                </div>

                <label for="email">Email</label>
                <div class="input">
                    <i class="far fa-envelope"></i>
                    <input id="email" name="email" placeholder="Email" type="text">
                </div>

                <label for="senha">Senha</label>
                <div class="input">
                    <i class="fas fa-lock"></i>
                    <input id="senha" name="senha" placeholder="Senha" type="password">
                </div>
                
                <label for="senha">Confirmar senha</label>
                <div class="input">
                    <i class="fas fa-lock"></i>
                    <input id="senha" name="confirmarsenha" placeholder="Senha" type="password">
                </div>
                
                <div id="btn">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </div>   
    </body>
</html>