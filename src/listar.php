<html>

<p><strong>Exibe Usuários</strong></p>

        <p>Clique no botão abaixo para mostrar todos os usuários cadastrados:</p>
        
        <form action="recebe_dados.php" method="POST">
            <input type="hidden" name="operacao" value="exibir">
            <p><input type="submit" value="Mostrar usuários"></p>
        </form>

        <p><strong>Busca de Usuário</strong></p>

        <form action="recebe_dados.php" method="POST">
            <input type="hidden" name="operacao" value="buscar">
            <p>Username: <input type="text" name="username" size="10"> </p>
            <p><input type="submit" value="Buscar"></p>
        </form>
</html>

