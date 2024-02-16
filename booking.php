<?php  include("admin/bd.php");
 //MOSTRAMOS LOS REGISTROS DE RESERVAS
 $sentencia= $conexion->prepare("SELECT * FROM `tbl_reservas`"); 
 $sentencia->execute();
 $lista_reservas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

 if($_POST){
  
    //recepcionamos los valores del formulario
    $nombrecompleto=(isset($_POST['nombrecompleto']))?$_POST['nombrecompleto']:"";
    $correo=(isset($_POST['correo']))?$_POST['correo']:"";
    $fecha_entrada=(isset($_POST['fecha_entrada']))?$_POST['fecha_entrada']:"";
    $fecha_salida=(isset($_POST['fecha_salida']))?$_POST['fecha_salida']:"";
    $adultos=(isset($_POST['adultos']))?$_POST['adultos']:"";
    $menores=(isset($_POST['menores']))?$_POST['menores']:"";
    $habitacion=(isset($_POST['habitacion']))?$_POST['habitacion']:"";
    $solicitud_especial=(isset($_POST['solicitud_especial']))?$_POST['solicitud_especial']:"";
  
    


      $sentencia= $conexion->prepare("INSERT INTO `tbl_reservas` 
      (`id`,`nombrecompleto`, `correo`, `fecha_entrada`, `fecha_salida`, `adultos`, `menores`, `habitacion`, `solicitud_especial`)
      VALUES (NULL, :nombrecompleto, :correo, :fecha_entrada, :fecha_salida, :adultos, :menores, :habitacion, :solicitud_especial);");
    
      $sentencia->bindParam(":nombrecompleto",$nombrecompleto);
      $sentencia->bindParam(":correo",$correo);
      $sentencia->bindParam(":fecha_entrada",$fecha_entrada);
      $sentencia->bindParam(":fecha_salida",$fecha_salida);
      $sentencia->bindParam(":adultos",$adultos);
      $sentencia->bindParam(":menores",$menores);
      $sentencia->bindParam(":habitacion",$habitacion);
      $sentencia->bindParam(":solicitud_especial",$solicitud_especial);
      
     
    
    
      $sentencia->execute();  
      $mensaje="Registro agregado con exito.";
  
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
                                <a href="room.php" class="nav-item nav-link">Habitaciones</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Paginas</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="booking.php" class="dropdown-item active">Reservas</a>
                                        <a href="team.php" class="dropdown-item">Nuestro Staff</a>
                                        <a href="testimonial.php" class="dropdown-item">Testimonios</a>

                                    </div>
                                </div>
                                <a href="contact.php" class="nav-item nav-link">Contactenos</a>
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $lista_configuraciones[31]['valor'];?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Booking Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Reserva de habitaciones</h6>
                    <h1 class="mb-5">Libro de <span class="text-primary text-uppercase">Reservas</span></h1>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                    <form action="" method="post">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nombrecompleto" placeholder="Nombre completo">
                                            <label for="name">Nombre completo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="correo" placeholder="Email">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date3" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="fecha_entrada" placeholder="Registro de entrada" data-target="#date3" data-toggle="datetimepicker" />
                                            <label for="checkin">Registro de entrada</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date4" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="fecha_salida" placeholder="Salida" data-target="#date4" data-toggle="datetimepicker" />
                                            <label for="checkout">Salida</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date5" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="adultos" placeholder="Adultos"/>
                                            <label for="checkout">Adultos</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date6" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="menores" placeholder="Niños"/>
                                            <label for="checkout">Niños</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" name="habitacion">
                                              <option value="Junior Suite">Junior Suite</option>
                                              <option value="Executive Suite">Executive Suite</option>
                                              <option value="Super Deluxe Presidencial">Super Deluxe Presidencial</option>
                                            </select>
                                            <label for="select3">Seleccione su habitacion</label>
                                          </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Solicitud especial" name="solicitud_especial" style="height: 100px"></textarea>
                                            <label for="message">Solicitud especial</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100 py-3" >Reservar ahora</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->


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
                                <a class="btn btn-link"><?php echo $lista_configuraciones[24]['valor'];?><?php echo $lista_configuraciones[4]['valor'];?></a>
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