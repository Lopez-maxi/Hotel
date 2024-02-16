<?php session_start();

if($_POST){
    include("../admin/bd.php");
     //recepcionamos los valores del formulario
     $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
     $password=(isset($_POST['password']))?$_POST['password']:"";
	
	     //SELECCIONAR REGISTROS
		 $sentencia= $conexion->prepare("SELECT *, count(*) as n_usuario
		 FROM `tbl_admin` 
		 WHERE usuario=:usuario
		 AND password=:password
		 ");
		$sentencia->bindParam(":usuario",$usuario);
		$sentencia->bindParam(":password",$password);
		$sentencia->execute();
	
		$lista_usuarios=$sentencia->fetch(PDO::FETCH_LAZY);
	  
		if($lista_usuarios['n_usuario']>0){
			$_SESSION['usuario']=$lista_usuarios['usuario'];
			$_SESSION['logueado']=true;
			header("Location: ../admin");
		}else{
			$mensaje="ERROR: El usuario o la contraseña son incorrectas";
		}
}
?>


<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Cada nuevo amigo es una<br> nueva aventura</span>
          <span class="text-2">Conectémonos</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
          <?php if(isset($mensaje)){ ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							<strong><?php echo $mensaje ?></strong>
						</div>       
					<?php } ?>
            <div class="title">Iniciar sesion</div>
          <form action="" method="post" >
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="submit" value="Ingresar">
              </div>
            </div>
        </form>
      </div>
  </div>
</body>
</html>
