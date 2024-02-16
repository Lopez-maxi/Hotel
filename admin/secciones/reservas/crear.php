<?php include("../../bd.php");

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
      header("Location:index.php?mensaje=".$mensaje);
    
  
  }
  
  

include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        Crear Nueva reserva
    </div>
    <div class="card-body">
       
        <form action="" enctype="multipart/form-data" method="post">
        
        <div class="mb-3">
          <label for="nombrecompleto" class="form-label">Nombre completo:</label>
          <input type="text"
            class="form-control" name="nombrecompleto" id="nombrecompleto" aria-describedby="helpId" placeholder="Nombre completo">
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo:</label>
          <input type="text"
            class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo">
        </div>
        <div class="mb-3">
          <label for="fecha_entrada" class="form-label">Fecha de entrada:</label>
          <input type="text"
            class="form-control" name="fecha_entrada" id="fecha_entrada" aria-describedby="helpId" placeholder="Fecha de entrada">
        </div>
        <div class="mb-3">
          <label for="fecha_salida" class="form-label">Fecha de salida:</label>
          <input type="text"
            class="form-control" name="fecha_salida" id="fecha_salida" aria-describedby="helpId" placeholder="fecha de salida">
        </div>
            <div class="mb-3">
              <label for="adultos" class="form-label">Cantidad de adultos:</label>
              <input type="text"
                class="form-control" name="adultos" id="adultos" aria-describedby="helpId" placeholder="cantidad de adultos">
            </div>
            <div class="mb-3">
              <label for="menores" class="form-label">Cantidad de menores:</label>
              <input type="text"
                class="form-control" name="menores" id="menores" aria-describedby="helpId" placeholder="cantidad de menores">
            </div>
            <div class="mb-3">
              <label for="habitacion" class="form-label">Tipo de habitacion:</label>
              <input type="text"
                class="form-control" name="habitacion" id="habitacion" aria-describedby="helpId" placeholder="tipo de habitacion">
            </div>
            <div class="mb-3">
              <label for="solicitud_especial" class="form-label">Solicitud especial:</label>
              <input type="text"
                class="form-control" name="solicitud_especial" id="solicitud_especial" aria-describedby="helpId" placeholder="solicitud especial">
            </div>

                    <button type="submit" class="btn btn-success">Agregar</button>
                    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>
    <div class="card-footer text-muted">
     
    </div>
</div>


<?php include("../../templates/footer.php"); ?>