<?php
    include "autenticaadm.inc";
    include "conexao.php";
    $cod_usuario = $_GET["cod_usuario"];
    $sql = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario;";
    $res = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($res);
    $adm = $_SESSION["adm"];
    
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <title>Editar Usuário</title>
    </head>
    <style>
        *{margin: 0;padding:0;box-sizing: border-box;}
        body{
            background: linear-gradient(-45deg, #ffce51, #ff7253, #fd5754);
            font-family: 'Poppins', sans-serif;
        }
        form{
            background-color: white;
            max-width: 400px;
            width: 70%;
            padding: 20px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform:translate(-50%, -50%);
            border-radius: 20px;
        }
        form h2{
            text-align: center;
            font-family: 'Poppins', sans-serif;
            
            
        }

        form input[type=text],
        form input[type=password]{
            width: 100%;
            height: 45px ;
            border: 1px solid #ccc;
            padding-left: 10px;
            margin: 10px 0;
            border-radius: 20px;

        }
        

        form input[type=submit]{
            width: 50%;
            height: 40px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg,  #ffce51, #ff7253, #fd5754)	 ;
            color: white;
            border: 0;
            border-radius: 20px;
            transition: 1s;
        }
        form button{
            width: 40%;
            height: 40px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg,  #ffce51, #ff7253, #fd5754)	 ;
            color: white;
            border: 0;
            border-radius: 20px;
            transition: 1s;
        }
        

        form input[type=submit]:hover{
            background: linear-gradient(-45deg,  #eec04c, #ec7054, #ee5a57);

        }
        form button:hover{
            background: linear-gradient(-45deg,  #eec04c, #ec7054, #ee5a57);

        }
        
    </style>
	<body>
        <!--<p><strong>Atualização de Usuário</strong></p>-->
        <form action="altera_recebe_dados_adm.php" method="POST">
            <h2>Editar usuário</h2><br><br>           
            <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
            <input type="hidden" name="old_username" value="<?php echo $usuario["username"]?>">
            <p>Username: <input type="text" name="username" size="10" placeholder="Username" value="<?php echo $usuario["username"]?>"> </p>            
            <p>Senha nova: <input type="password" name="senha_nova" placeholder="Nova senha" size="10"> </p>
            <p>Repita a senha nova: <input type="password" name="senha_nova_rep" placeholder="Nova senha" size="10"> </p>
            <p>E-mail: <input type="text" name="email" size="30" placeholder="Seu email" value="<?php echo $usuario["email"]?>"></p> 
            <p><a href="perfil.php?cod_usuario=<?php echo $cod_usuario?>"><button>Voltar</button></a>&nbsp;&nbsp;<input type="submit" value="Enviar!" onclick="if (!confirm('Tem certeza de que deseja alterar essas informações?')) return false;"></p>
            
        </form>
    </body>
</html>
