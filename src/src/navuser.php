<nav style="text-align: right;position: fixed; overflow: hidden; width: 100%"> 
    <a class="logo" href="home.php">Cookeat</a>
    <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <ul style="font-size: 5x" class= "nav-list">
        <li><a href="home.php">Início</a></li>
        <li><a href="buscausuario.php">Buscar usuário</a></li>
        <li><a href="perfilmeu.php">Meu Perfil</a></li>
        <li><a href="logout.php" style="color: #dd4045" href="logout.php " onclick="if (!confirm('Tem certeza de que deseja encerrar a sessão?')) return false;" >Logout</a></li>
        <?php 
            //session_start();
            if($_SESSION["adm"] == 1)
                echo "<li><a href='exibirusuarios_adm.php'>Exibir Usuários</a></li>";
        ?>
    </ul>
</nav>