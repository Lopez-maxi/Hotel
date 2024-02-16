<?php include ("../../bd.php");

if($_POST){
  
  //recepcionamos los valores del formulario
  $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
  $profesion=(isset($_POST['profesion']))?$_POST['profesion']:"";
  $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
  $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

  $fecha_imagen=new DateTime();
  $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";

  $tmp_imagen=$_FILES["imagen"]["tmp_name"];

  if($tmp_imagen!=""){
    move_uploaded_file($tmp_imagen,"../../../img/".$nombre_archivo_imagen);
  }


  $sentencia= $conexion->prepare("INSERT INTO `tbl_testimonios` (`id`,`nombre`,`profesion`,`imagen`,`descripcion`)
  VALUES (NULL, :nombre, :profesion, :imagen, :descripcion);");

  $sentencia->bindParam(":nombre",$nombre);
  $sentencia->bindParam(":profesion",$profesion);
  $sentencia->bindParam(":imagen",$nombre_archivo_imagen);
  $sentencia->bindParam(":descripcion",$descripcion);


  $sentencia->execute();  
  $mensaje="Registro agregado con exito.";
  header("Location:index.php?mensaje=".$mensaje);


}

include("../../templates/header.php")
?>

<div class="card">
    <div class="card-header">
        Agregar nuevo testimonio
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            
        <div class="mb-3">
              <label for="nombre" class="form-label">Nombre:</label>
              <input type="text"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="nombre">
            </div>
            <div class="mb-3">
              <label for="profesion" class="form-label">Profesion:</label>
              <input type="text"
                class="form-control" name="profesion" id="profesion" aria-describedby="helpId" placeholder="profesion">
            </div>
            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen:</label>
              <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen" aria-describedby="fileHelpId">
            </div>
             <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción:</label>
              <input type="text"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
            </div>
                    <button type="submit" class="btn btn-success">Agregar</button>

                    <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        </form>
      </div>
    <div class="card-footer text-muted">
        
    </div>
</div>

<?php include("../../templates/footer.php"); ?>