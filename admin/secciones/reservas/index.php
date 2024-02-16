<?php 
include("../../bd.php");

if(isset($_GET['txtid'])){
    //Borrar dicho registro con el ID correspondiente
    $txtid=(isset($_GET['txtid']))?$_GET['txtid']:"";
    $sentencia= $conexion->prepare("DELETE FROM tbl_reservas WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();
}

    //SELECCIONAR REGISTROS
    $sentencia= $conexion->prepare("SELECT * FROM `tbl_reservas`"); 
    $sentencia->execute();
    $lista_reservas=$sentencia->fetchAll(PDO::FETCH_ASSOC);



include("../../templates/header.php");?>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        
    <div class="table-responsive">
        <table class="table table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre completo:</th>
                    <th scope="col">Correo:</th>
                    <th scope="col">Fecha entrada:</th>
                    <th scope="col">Fecha salida:</th>
                    <th scope="col">Cantidad adultos:</th>
                    <th scope="col">Cantidad niños:</th>
                    <th scope="col">Habitacion:</th>
                    <th scope="col">Solicitudes especiales:</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_reservas as $registros){?>
                <tr class="">
                    <td><?php echo $registros['id'];?></td>
                    <td><?php echo $registros['nombrecompleto'];?></td>
                    <td><?php echo $registros['correo'];?></td>
                    <td><?php echo $registros['fecha_entrada'];?></td>
                    <td><?php echo $registros['fecha_salida'];?></td>
                    <td><?php echo $registros['adultos'];?></td>
                    <td><?php echo $registros['menores'];?></td>
                    <td><?php echo $registros['habitacion'];?></td>
                    <td><?php echo $registros['solicitud_especial'];?></td>
                    <td>
                        
                        <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $registros['id']; ?> " role="button" role="button">Editar</a>

                        <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $registros['id']; ?> " role="button">Eliminar</a>
                </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    

    </div>
</div>


<?php include("../../templates/footer.php"); ?>