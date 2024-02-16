<?php  
include("admin/bd.php");

 //MOSTRAMOS LOS REGISTROS DE NOSOTROS
 $sentencia= $conexion->prepare("SELECT * FROM `tbl_nosotros`"); 
 $sentencia->execute();
 $lista_nosotros=$sentencia->fetchAll(PDO::FETCH_ASSOC);
 
 //MOSTRAMOS LOS REGISTROS DE HABITACIONES
 $sentencia= $conexion->prepare("SELECT * FROM `tbl_habitaciones`"); 
 $sentencia->execute();
 $lista_habitaciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);

  //MOSTRAMOS LOS REGISTROS DE SERVICIOS    
  $sentencia= $conexion->prepare("SELECT * FROM `tbl_servicios`"); 
  $sentencia->execute();
  $lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
 
  //MOSTRAMOS LOS REGISTROS DE TESTIMONIOS 
  $sentencia= $conexion->prepare("SELECT * FROM `tbl_testimonios`"); 
  $sentencia->execute();
  $lista_testimonios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

  //MOSTRAMOS LOS REGISTROS DE EQUIPO
  $sentencia= $conexion->prepare("SELECT * FROM `tbl_equipo`"); 
  $sentencia->execute();
  $lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);

  //MOSTRAMOS LA CONFIGURACION GENERAL
  $sentencia= $conexion->prepare("SELECT * FROM `tbl_configuraciones`"); 
  $sentencia->execute();
  $lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">

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
                    <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
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
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="pagprin.php" class="nav-item nav-link active">Home</a>
                                <a href="about.php" class="nav-item nav-link">Nosotros</a>
                                <a href="service.php" class="nav-item nav-link">Servicios</a>
                                <a href="room.php" class="nav-item nav-link">Suits</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Paginas</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="booking.php" class="dropdown-item">Reservas</a>
                                        <a href="team.php" class="dropdown-item">Nuestrro Staff</a>
                                        <a href="testimonial.php" class="dropdown-item">Testimonios</a>
                                    </div>
                                </div>
                                <a href="contact.php" class="nav-item nav-link">Contactenos</a>
                                <a href="login-admin" class="nav-item nav-link">Administrador</a>
                                <a href="index.php" class="nav-item nav-link">Cerrar sesion</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown"><?php echo $lista_configuraciones[4]['valor'];?></h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown"><?php echo $lista_configuraciones[5]['valor'];?></h1>
                                <a href="room.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><?php echo $lista_configuraciones[6]['valor'];?></a>
                                <a href="booking.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight"><?php echo $lista_configuraciones[7]['valor'];?></a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown"><?php echo $lista_configuraciones[4]['valor'];?></h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown"><?php echo $lista_configuraciones[5]['valor'];?></h1>
                                <a href="room.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><?php echo $lista_configuraciones[6]['valor'];?></a>
                                <a href="booking.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight"><?php echo $lista_configuraciones[7]['valor'];?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">Sobre Nosotros</h6>
                        <?php foreach($lista_nosotros as $registros){?>
                        <h1 class="mb-4"><?php echo $registros["titulo"];?><span class="text-primary text-uppercase"></span></h1>
                        <p class="mb-4"><?php echo $registros["descripcion"];?></p>
                        <?php }?>
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
                        <a class="btn btn-primary py-3 px-5 mt-2" href="about.php">Mas</a>
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


        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Nuestras Suits</h6>
                    <h1 class="mb-5">Explore nuestras <span class="text-primary text-uppercase">Suits</span></h1>
                </div>
                
                <div class="row g-4">
                    <?php foreach($lista_habitaciones as $registros){?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/<?php echo $registros["imagen"];?>" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"><?php echo $registros["precio"];?></small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"><?php echo $registros["titulo"];?></h5>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i><?php echo $registros["camas"];?></small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i><?php echo $registros["banos"];?></small>
                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                                </div>
                                <p class="text-body mb-3"><?php echo $registros["descripcion"];?></p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="booking.php">Reserva ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Room End -->

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Servicios</h6>
                    <h1 class="mb-5">Explore nuestros <span class="text-primary text-uppercase">Servicios</span></h1>
                </div>
                <div class="row g-4">
                <?php foreach($lista_servicios as $registros){?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="<?php echo $registros["icono"];?> fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3"><?php echo $registros["titulo"];?></h5>
                            <p class="text-body mb-0"><?php echo $registros["descripcion"];?></p>
                    </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- Testimonial Start -->
        <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="owl-carousel testimonial-carousel py-5">
                <?php foreach($lista_testimonios as $registros){?>
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p><?php echo $registros["descripcion"];?></p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/<?php echo $registros["imagen"];?>" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1"><?php echo $registros["nombre"];?></h6>
                                <small><?php echo $registros["profesion"];?></small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


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