<?php include("admin/bd.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHP-mailer/Exception.php';
require 'PHP-mailer/PHPMailer.php';
require 'PHP-mailer/SMTP.php';


$errores = '';
$enviado = '';

// Comprobamos que el formulario haya sido enviado.
if (isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$mensaje = $_POST['mensaje'];
    $asunto = $_POST['asunto'];

// Comprobamos que el nombre no este vacio.
	if (!empty($nombre)) {

		// Saneamos el nombre para eliminar caracteres que no deberian estar.
		$nombre = trim($nombre);
		$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
		
        // Comprobamos que el nombre despues de quitar los caracteres ilegales no este vacio.
		if ($nombre == "") {
			$errores.= 'Por favor ingresa un nombre.<br />';
		}
	} else {
		$errores.= 'Por favor ingresa un nombre.<br />';
	}

	if (!empty($correo)) {
		$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
		// Comprobamos que sea un correo valido
		if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			$errores.= "Por favor ingresa un correo valido.<br />";
		}
	} else {
		$errores.= 'Por favor ingresa un correo.<br />';
	}


	if (!empty($mensaje)) {
		// Podemos sanear la cadena de texto con filter_var, pero queremos que en el mensaje los signos se conviertan en entidades HTML
		$mensaje = htmlspecialchars($mensaje);
		$mensaje = trim($mensaje);
		$mensaje = stripslashes($mensaje);
	} else {
		$errores.= 'Por favor ingresa el mensaje.<br />';
	}

// Comprobamos si hay errores, si no hay entonces enviamos.
	if (!$errores) {
		
		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'maximilianojlopez@hotmail.com';                     //SMTP username
    $mail->Password   = 'mailen13082019';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('maximilianojlopez@hotmail.com', 'Maxi');
    $mail->addAddress($correo);     //Add a recipient
    
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje;
    $mail->send();

    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
		
	}
}

  //MOSTRAMOS LA CONFIGURACION GENERAL
  $sentencia= $conexion->prepare("SELECT * FROM `tbl_configuraciones`"); 
  $sentencia->execute();
  $lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title><?php echo $lista_configuraciones[0]['valor'];?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase"><?php echo $lista_configuraciones[1]['valor'];?></h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <p class="mb-0"><?php echo $lista_configuraciones[2]['valor'];?></p>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0"><?php echo $lista_configuraciones[3]['valor'];?></p>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.html" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase"></h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="pagprin.php" class="nav-item nav-link">Home</a>
                                <a href="about.php" class="nav-item nav-link">Nosotros</a>
                                <a href="service.php" class="nav-item nav-link">Servicios</a>
                                <a href="room.php" class="nav-item nav-link">Suits</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Paginas</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="booking.php" class="dropdown-item">Reservas</a>
                                        <a href="team.php" class="dropdown-item">Nuestro Staff</a>
                                        <a href="testimonial.php" class="dropdown-item">Testimonios</a>

                                    </div>
                                </div>
                                <a href="contact.php" class="nav-item nav-link active">Contactanos</a>
                                <a href="login-admin" class="nav-item nav-link">Administrador</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $lista_configuraciones[33]['valor'];?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="pagprin.php">Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Contactenos</h6>
                    <h1 class="mb-5"><span class="text-primary ">Contactenos</span> por cualquier duda o cosulta</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase">Reservas</h6>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i><?php echo $lista_configuraciones[2]['valor'];?></p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase">General</h6>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i><?php echo $lista_configuraciones[2]['valor'];?></p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase">Tecnicas</h6>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i><?php echo $lista_configuraciones[2]['valor'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" value="<?php if(!$enviado && isset($nombre))?>">
                                            <label for="name">Nombre completo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Your Email" value="<?php if(!$enviado && isset($correo))?>" >
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="asunto"  name="asunto" placeholder="Subject" value="<?php if(!$enviado && isset($asunto))?>">
                                            <label for="subject">Asunto</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Mensaje" id="mensaje" name="mensaje" style="height: 150px"  value="<?php if(!$enviado && isset($mensaje))?>"></textarea>
                                            <label for="message">Mensaje</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="submit" class="btn btn-primary w-100 py-3" >Envias mensaje</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- Newsletter Start -->
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 ">
                            <div class=" text-center ">
                                <div class="rounded text-center ">
                                    <div class="position-relative mx-auto" style="max-width: 400px;">
                                        <img >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Newsletter Start -->
        

       <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="p-4">
                            <a href="index.php"><h1 class="text-white text-uppercase mb-3"><?php echo $lista_configuraciones[11]['valor'];?></h1></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4"><?php echo $lista_configuraciones[12]['valor'];?></h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?php echo $lista_configuraciones[15]['valor'];?></p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?php echo $lista_configuraciones[16]['valor'];?></p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i><?php echo $lista_configuraciones[17]['valor'];?></p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="row gy-5 g-4">
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4"><?php echo $lista_configuraciones[13]['valor'];?></h6>
                                <a class="btn btn-link"><?php echo $lista_configuraciones[18]['valor'];?></a>
                                <a class="btn btn-link"><?php echo $lista_configuraciones[19]['valor'];?></a>
                                <a class="btn btn-link"><?php echo $lista_configuraciones[20]['valor'];?></a>
                                <a class="btn btn-link"><?php echo $lista_configuraciones[21]['valor'];?></a>
                                <a class="btn btn-link"><?php echo $lista_configuraciones[22]['valor'];?></a>
                            </div>
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4"><?php echo $lista_configuraciones[14]['valor'];?></h6>
                                <a class="btn btn-link"><?php echo $lista_configuraciones[23]['valor'];?></a>
                                <a class="btn btn-link"><?php echo $lista_configuraciones[24]['valor'];?></a>
                                <a class="btn btn-link"><?php echo $lista_configuraciones[25]['valor'];?></a>
                                <a class="btn btn-link"><?php echo $lista_configuraciones[26]['valor'];?></a>
                                <a class="btn btn-link"><?php echo $lista_configuraciones[27]['valor'];?></a>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href=""></a>Todos los derechos reservados.
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>