<?php include("../../bd.php");

   //Borrando registros con el ID
   if(isset($_GET['txtid'])){

    //Recuperamos los datos del ID seleccionado
    $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";

    //Borrando la imagen relacionada al ID del registro a eliminar
    $sentencia= $conexion->prepare("SELECT imagen FROM `tbl_equipo` WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

        if(isset($registro_imagen["imagen"])){
            if(file_exists("../../../img/".$registro_imagen["imagen"])){
                unlink("../../../img/".$registro_imagen["imagen"]);
            }
        }

     //Borrado del registro
    $sentencia= $conexion->prepare("DELETE FROM `tbl_equipo` WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();
    
}


//SELECCIONAR REGISTROS
$sentencia= $conexion->prepare("SELECT * FROM `tbl_equipo`"); 
$sentencia->execute();
$lista_nosotros=$sentencia->fetchAll(PDO::FETCH_ASSOC);



include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        
         <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre:</th>
                        <th scope="col">Profesion:</th>
                        <th scope="col">Imagen:</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lista_nosotros as $registros){?>
                    <tr>
                        <td><?php echo $registros["id"] ?></td>
                        <td><?php echo $registros["nombre"] ?></td>
                        <td><?php echo $registros["profesion"] ?></td>
                        <td><img width="70" src="../../../img/<?php echo $registros['imagen'];?>"/></td>
                        <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $registros['id']; ?> " role="button" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $registros['id']; ?>" role="button">Eliminar</a>

                        </td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
        </div>
        

    </div>
</div>

<?php include("../../templates/footer.php"); ?>