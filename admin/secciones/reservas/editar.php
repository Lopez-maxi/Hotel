<?php include("../../bd.php");



if(isset($_GET['txtid'])){
  //Recuperamos los datos del ID seleccionado
  $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";

  $sentencia= $conexion->prepare("SELECT * FROM `tbl_reservas` WHERE id=:id");
  $sentencia->bindParam(":id",$txtid);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $nombrecompleto=$registro['nombrecompleto'];
  $correo=$registro['correo'];
  $fecha_entrada=$registro['fecha_entrada']; 
  $fecha_salida=$registro['fecha_salida']; 
  $adultos=$registro['adultos']; 
  $menores=$registro['menores']; 
  $habitacion=$registro['habitacion']; 
  $solicitud_especial=$registro['solicitud_especial']; 
}


if($_POST){
     

  //recepcionamos los valores del formulario
  $txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
  $nombrecompleto=(isset($_POST['nombrecompleto']))?$_POST['nombrecompleto']:"";
  $correo=(isset($_POST['correo']))?$_POST['correo']:"";
  $fecha_entrada=(isset($_POST['fecha_entrada']))?$_POST['fecha_entrada']:"";
  $fecha_salida=(isset($_POST['fecha_salida']))?$_POST['fecha_salida']:"";
  $adultos=(isset($_POST['adultos']))?$_POST['adultos']:"";
  $menores=(isset($_POST['menores']))?$_POST['menores']:"";
  $habitacion=(isset($_POST['habitacion']))?$_POST['habitacion']:"";
  $solicitud_especial=(isset($_POST['solicitud_especial']))?$_POST['solicitud_especial']:"";

  $sentencia= $conexion->prepare("UPDATE `tbl_reservas`
  SET 
  nombrecompleto=:nombrecompleto,
  correo=:correo,
  fecha_entrada=:fecha_entrada,
  fecha_salida=:fecha_salida,
  adultos=:adultos,
  menores=:menores,
  habitacion=:habitacion,
  solicitud_especial=:solicitud_especial
  WHERE id=:id");

  $sentencia->bindParam(":nombrecompleto",$nombrecompleto);
  $sentencia->bindParam(":correo",$correo);
  $sentencia->bindParam(":fecha_entrada",$fecha_entrada);
  $sentencia->bindParam(":fecha_salida",$fecha_salida);
  $sentencia->bindParam(":adultos",$adultos);
  $sentencia->bindParam(":menores",$menores);
  $sentencia->bindParam(":habitacion",$habitacion);
  $sentencia->bindParam(":solicitud_especial",$solicitud_especial);
  $sentencia->bindParam(":id",$txtid);


  $sentencia->execute();
  $mensaje="Registro modificado con exito.";
  header("Location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        Editar reserva
    </div>
    <div class="card-body">
       
        <form action="" enctype="multipart/form-data" method="post">
        <div class="mb-3">
          <label for="txtid" class="form-label">Id:</label>
          <input type="text"
            class="form-control"  readonly value="<?php echo $txtid;?>" name="txtid" id="txtid" aria-describedby="helpId" placeholder="id">
        </div>
        <div class="mb-3">
          <label for="nombrecompleto" class="form-label">Nombre completo:</label>
          <input type="text"
            class="form-control" value="<?php echo $nombrecompleto;?>"  name="nombrecompleto" id="nombrecompleto" aria-describedby="helpId" placeholder="Nombre completo">
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo:</label>
          <input type="text"
            class="form-control" value="<?php echo $correo;?>"  name="correo" id="correo" aria-describedby="helpId" placeholder="Correo">
        </div>
        <div class="mb-3">
          <label for="fecha_entrada" class="form-label">Fecha de entrada:</label>
          <input type="text"
            class="form-control" value="<?php echo $fecha_entrada;?>"  name="fecha_entrada" id="fecha_entrada" aria-describedby="helpId" placeholder="Fecha de entrada">
        </div>
        <div class="mb-3">
          <label for="fecha_salida" class="form-label">Fecha de salida:</label>
          <input type="text"
            class="form-control" value="<?php echo $fecha_salida;?>"  name="fecha_salida" id="fecha_salida" aria-describedby="helpId" placeholder="fecha de salida">
        </div>
            <div class="mb-3">
              <label for="adultos" class="form-label">Cantidad de adultos:</label>
              <input type="text"
                class="form-control" value="<?php echo $adultos;?>"  name="adultos" id="adultos" aria-describedby="helpId" placeholder="cantidad de adultos">
            </div>
            <div class="mb-3">
              <label for="menores" class="form-label">Cantidad de menores:</label>
              <input type="text"
                class="form-control" value="<?php echo $menores;?>"  name="menores" id="menores" aria-describedby="helpId" placeholder="cantidad de menores">
            </div>
            <div class="mb-3">
              <label for="habitacion" class="form-label">Tipo de habitacion:</label>
              <input type="text"
                class="form-control" value="<?php echo $habitacion;?>"  name="habitacion" id="habitacion" aria-describedby="helpId" placeholder="tipo de habitacion">
            </div>
            <div class="mb-3">
              <label for="solicitud_especial" class="form-label">Solicitud especial:</label>
              <input type="text"
                class="form-control" value="<?php echo $solicitud_especial;?>"  name="solicitud_especial" id="solicitud_especial" aria-describedby="helpId" placeholder="solicitud especial">
            </div>

                    <button type="submit" class="btn btn-success">Agregar</button>
                    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>
    <div class="card-footer text-muted">
     
    </div>
</div>


<?php include("../../templates/footer.php"); ?>