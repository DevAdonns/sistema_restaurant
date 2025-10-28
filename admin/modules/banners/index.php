<?php include_once("../../connection/conexion.php"); ?>
<?php include_once("../../templates/header.php");?>
<?php

if($_GET){
   $idtxt=$_GET["txtID"];
   $sql_borrar= "DELETE FROM `tbl_banner` WHERE `tbl_banner`.`id` = $idtxt";
   $result_sql= $conn->query($sql_borrar);
   if (isset($result_sql)) {
        echo "<script>alert('Eliminado correctamente')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}


?>

<br>
<div class="card">
    <div class="card-header">
        <a id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
        <br>
        <br>
        <h4>Banners</h4>
    </div>
   
    <div class="card-body">
        <div
            class="table-responsive-sm"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Enlace</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $sql="SELECT * FROM `tbl_banner`";
                        $result_banner=$conn->query($sql);
                        
                        foreach($result_banner as $row) { ?>

                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["titulo"] ?></td>
                            <td><?php echo $row["descripcion"] ?></td>
                            <td><?php echo $row["link"] ?></td>
                            <td>
                                <a href="editar.php?txtID=<?php echo  $row["id"];?>" class="btn btn-info">Editar</a>
                                <a href="index.php?txtID=<?php echo  $row["id"];?>" class="btn btn-danger"  onclick="return confirm('¿Seguro que deseas eliminar este registro?')">Borrar</a>
                            </td>
                               
                            
                    </tr>
                    
                        <?php } ?>
                </tbody>
            </table>
        </div>
        
        
      
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include_once("../../templates/footer.php");?>


