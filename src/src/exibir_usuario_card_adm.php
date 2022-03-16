<div style="background-color: white; padding: 20px; border-radius: 20px; width: 500px; margin: auto;">
<h3 style="text-align: left"> <?php echo $usuario["username"] ?>  </h3> 
 <p>Id:: <?php echo $usuario["cod_usuario"]; ?> </p> 
 <p>Email: <?php echo $usuario["email"]; ?> </p> 
 <p style=" text-align: right"> <a href="perfil.php?cod_usuario=<?php echo $usuario["cod_usuario"] ?>"> <button style="cursor: pointer; font-family: 'Poppins', sans-serif; background: rgb(112, 185, 2); color: white; border: 0; border-radius: 20px; width: 100px; height: 30px"> Gerenciar </button> </a></p>
</div> <br><br>