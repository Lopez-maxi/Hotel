<?php include("../../bd.php");

if(isset($_GET['txtid'])){

  $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";


  $sentencia= $conexion->prepare("SELECT * FROM tbl_habitaciones WHERE id=:id");
  $sentencia->bindParam(":id",$txtid);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $precio=$registro['precio'];
  $titulo=$registro['titulo'];
  $camas=$registro['camas'];
  $baños=$registro['banos'];
  $descripcion=$registro['descripcion'];
  $imagen=$registro['imagen'];
 
  if($_POST){
    //Recibo de la DB los datos
    $txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
    $precio=(isset($_POST['precio']))?$_POST['precio']:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $camas=(isset($_POST['camas']))?$_POST['camas']:"";
    $baños=(isset($_POST['banos']))?$_POST['banos']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
   
    //Actualizo en la DB los datos
    $sentencia= $conexion->prepare("UPDATE `tbl_habitaciones` 
    SET precio=:precio,titulo=:titulo,camas=:camas,banos=:banos,descripcion=:descripcion WHERE id=:id ");
    
    $sentencia->bindParam(":precio",$precio);
    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":camas",$camas);
    $sentencia->bindParam(":banos",$baños);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute(); 

    if($_FILES["imagen"]["tmp_name"]!=""){

      $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
      $fecha_imagen=new DateTime();
      $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";
  
      $tmp_imagen=$_FILES["imagen"]["tmp_name"];
     
      move_uploaded_file($tmp_imagen,"../../../img/".$nombre_archivo_imagen);

    //Borro el archivo anterior
    $sentencia= $conexion->prepare("SELECT imagen FROM tbl_habitaciones WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

        if(isset($registro_imagen["imagen"])){
            if(file_exists("../../../img/".$registro_imagen["imagen"])){
                unlink("../../../img/".$registro_imagen["imagen"]);
            }
        }

      $sentencia= $conexion->prepare("UPDATE tbl_habitaciones SET imagen=:imagen WHERE id=:id");
      $sentencia->bindParam(":imagen",$nombre_archivo_imagen);
      $sentencia->bindParam(":id",$txtid);
      $sentencia->execute();
      $imagen=$nombre_archivo_imagen;
    }
    $mensaje="Registro modificado con exito.";
    header("Location:index.php?mensaje=".$mensaje);
  }
 
}


include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        Editar habitación
    </div>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
        <div class="mb-3">
          <label for="txtid" class="form-label">Id:</label>
          <input type="text"
            class="form-control" readonly value="<?php echo $txtid; ?>" name="txtid" id="txtid" aria-describedby="helpId" placeholder="id">
        </div>
        <div class="mb-3">
          <label for="imagen" class="form-label">Imagen:</label>
          <img width="70" src="../../../img/<?php echo $imagen;?>"/>
          <input type="file" class="form-control" name="imagen" id="imagen" placeholder="" aria-describedby="fileHelpId">
        </div>
        <div class="mb-3">
          <label for="precio" class="form-label">Precio:</label>
          <input type="text"
            class="form-control" value="<?php echo $precio; ?>" name="precio" id="precio" aria-describedby="helpId" placeholder="precio">
        </div>
        <div class="mb-3">
          <label for="titulo" class="form-label">Titulo:</label>
          <input type="text"
            class="form-control" value="<?php echo $titulo; ?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
        </div>
        <div class="mb-3">
          <label for="camas" class="form-label">Camas:</label>
          <input type="text"
            class="form-control" value="<?php echo $camas; ?>" name="camas" id="cantcamas" aria-describedby="helpId" placeholder="camas">
        </div>
        <div class="mb-3">
        <div class="mb-3">
          <label for="banos" class="form-label">Baños:</label>
          <input type="text"
            class="form-control" value="<?php echo $baños; ?>" name="banos" id="banos" aria-describedby="helpId" placeholder="baños">
        </div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripcion:</label>
          <input type="text"
            class="form-control" value="<?php echo $descripcion; ?>" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
        </div>

        
        <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
     </form>   
    </div>
    <div class="card-footer text-muted">
   
    </div>
</div>



<?php include("../../templates/footer.php"); ?>