<?php  include("admin/bd.php");
 //MOSTRAMOS LOS REGISTROS DE NOSOTROS
 $sentencia= $conexion->prepare("SELECT * FROM `tbl_nosotros`"); 
 $sentencia->execute();
 $lista_nosotros=$sentencia->fetchAll(PDO::FETCH_ASSOC);

  //MOSTRAMOS LOS REGISTROS DEL EQUIPO
  $sentencia= $conexion->prepare("SELECT * FROM `tbl_equipo`"); 
  $sentencia->execute();
  $lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);

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
                            <h1 class="m-0 text-primary text-uppercase"><</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="pagprin.php" class="nav-item nav-link">Home</a>
                                <a href="about.php" class="nav-item nav-link active">Nosotros</a>
                                <a href="service.php" class="nav-item nav-link">Servicios</a>
                                <a href="room.php" class="nav-item nav-link">Habitaciones</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Paginas</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="booking.php" class="dropdown-item">Reservas</a>
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $lista_configuraciones[28]['valor'];?></h1>
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


   

 <!-- About Start -->
 <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">Sobre Nosotros</h6>
                        <?php foreach($lista_nosotros as $registros){?>
                        <h1 class="mb-4"><?php echo $registros["titulo"];?><span class="text-primary text-uppercase"></span></h1><?php }?>
                        <p class="mb-4"> es un lugar especial que invita a soñar a quien lo visita. Un proyecto único en el mundo que ha reunido a diecinueve de los mejores estudios de arquitectos y diseñadores del mundo, que tiene el lujo de contar con cuatro premios Pritzker – el Nobel de la Arquitectura - (Norman Foster, Zaha Hadid, Arata Isozaki y Jean Nouvel).
                                         ​Cada una de las 12 plantas de nuestro hotel de lujo en Madrid propone un concepto distinto de habitación, todas ellas juegan con diferentes materiales, colores y formas creando un espacio sorprendente para los sentidos, una experiencia sensorial incomparable. En definitiva, un museo donde disfrutar y descansar.</p>
                        
                            <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?php echo $lista_configuraciones[8]['valor'];?></h2>
                                        <p class="mb-0">Suits</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?php echo $lista_configuraciones[9]['valor'];?></h2>
                                        <p class="mb-0">Staffs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?php echo $lista_configuraciones[10]['valor'];?></h2>
                                        <p class="mb-0">Clientes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>
                    
                    <div class="col-lg-6">
                        <div class="row g-3">
                        <?php foreach($lista_nosotros as $registros){?>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.5s" src="img/<?php echo $registros["imagen"];?>" style="margin-top: 25%;">
                            </div>
                          
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Staff</h6>
                    <h1 class="mb-5">Explore nuestro <span class="text-primary text-uppercase">Staffs</span></h1>
                </div>
                <div class="row g-4">
                    <?php foreach ($lista_equipo as $registro){?>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/<?php echo $registro['imagen'];?>" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0"><?php echo $registro['nombre'];?></h5>
                                <small><?php echo $registro['profesion'];?></small>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- Team End -->


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