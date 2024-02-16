<?php session_start();

if($_POST){
    include("admin/bd.php");
     //recepcionamos los valores del formulario
     $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
     $password=(isset($_POST['password']))?$_POST['password']:"";
	
	     //SELECCIONAR REGISTROS
		 $sentencia= $conexion->prepare("SELECT *, count(*) as n_usuario
		 FROM `tbl_usuarios` 
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
			header("Location: pagprin.php");
		}else{
			$mensaje="ERROR: El usuario o la contraseña son incorrectas";
		}
}
?>




<!doctype html>
<html lang="es">
  <head>
  	<title>Inicio de sesion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css1/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(imagenes/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
					<?php if(isset($mensaje)){ ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							<strong><?php echo $mensaje ?></strong>
						</div>       
					<?php } ?>
		      	<h3 class="mb-4 text-center">Ingresar</h3>
		      	<form action="" class="signin-form" method="post" >

		      		<div class="form-group">
		      			<input type="text" id="usuario" name="usuario" class="form-control" placeholder="Nombre de usuario" required>
		      		</div>

	            <div class="form-group">
	              <input id="password-field" id="password" name="password" type="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>

	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Entrar</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Recuerdame
							<input type="checkbox" checked>
							 <span class="checkmark"></span>
						</label>
					</div>
						<div class="w-50 text-md-right">
							<a href="" style="color: #fff">Olvidaste la contraseña?</a>
							<a href="registro.php" style="color: #fff">Registrarme</a>	
						</div>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js1/jquery.min.js"></script>
  <script src="js1/popper.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/main.js"></script>

	</body>
</html>

