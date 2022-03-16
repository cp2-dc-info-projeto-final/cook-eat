<?php 
    include "autentica.inc";
    include "conexao.php";
    $sql = "SELECT * FROM usuarios WHERE username like '$username';";
    $res = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($res);
    $cod_usuario = $_SESSION["cod_usuario"];
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <script src="https://kit.fontawesome.com/47e36a68f2.js" crossorigin="anonymous"></script>
        <link rel='stylesheet' href="assets/css/buscacss.CSS">
        <title>Buscar usuários</title>
    </head>
    <style>

        body{
    background: linear-gradient(-45deg, #ffce51, #ff7253, #fd5754);
    font-family: 'Poppins', sans-serif;
}
nav{
    background: white	 ;    
}
@media( max-width: 999px){
    body{
        overflow-x: hidden;
    }
    .nav-list{        
        background: white	 ;;        

    }
    .nav-list li{
        margin-left: 0;
        opacity: 0;
    }
    .mobile-menu {
        display: block;
    }
}
.search-box{

position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
background: white;
height: 40px;
border-radius: 40px;
padding: 10px;
}

.search-btn{
color: #00a8ff;
float: right;
width: 40px;
height: 40px;
border-radius: 50%;
background: white;
display:flex;
justify-content: center;
align-items: center;
transition: 2s ;
}

.search-txt{
border:none;
background: none;
outline: none;
float: left;
padding: 0;
color: black;
font-size: 16px;
transition: 0.4s;
line-height: 40px;
width: 0px;

}


.search-box:hover > .search-txt{

width: 240px;
padding: 0 6px;

}

.search-box:hover > .search-btn{

background: white;

}

    </style>
    <body>
        <?php include "navuser.php"; ?>
        <form action="exibirusuario.php" method="POST">
            <div class="search-box">                
                <input class="search-txt" type="text" attribute="required" name="username" placeholder="Procure o usuário...">
                <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <script src="assets/js/mobile-navbar.js"></script>

    </body>
</html>