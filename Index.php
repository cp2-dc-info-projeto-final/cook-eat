<html>
   <head>
      <title> Cadastro</title>
      <link rel="icon" href="download.png">
<///head>
/////<body>      <p><strong>Cadastro de Usuário</strong></p>
     //  <form action="recebe_dados.php" method="POST">
            <p>Username: <input type="text" name="username" size="10"> </p>
            <p>Senha: <input type="password" name="senha" size="10"> </p>
            <p>Nome: <input type="text" name="nome" size="30"> </p>
            <p>Idade: <input type="text" name="idade" size="3"> </p>
            <p>E-mail: <input type="text" name="email" size="30"></p> 
            <p><input type="submit" value="Enviar!"></p>
        </form>
      <p><Strong>Alteração de Usuário</strong></p>   
      <form action="recebe_dados.php" method="POST">
             <input type="hidden" name="operacao" value="alteracao">
             <p>Digite seu nome: <input name="nome" type="text" size="30"></p>
             <p>Digite sua idade: <input name="idade" type="text" size="3"></p>
            <p><input type="submit" value="Enviar"></p>
      </form>
<ul>
      <li><a href="facebook.com"> Produto 1</a></li>
      <li><a href="facebook.com"> Produto 2</a></li>
      <li><a href="facebook.com"> Produto 3</a></li>
   
</body>
</html>
