<?php include_once("../../templates/header.php");?>
<?php include_once("../../connection/conexion.php"); ?>

<?php

if($_GET){
    $txtid= (isset($_GET["txtID"])) ? $_GET["txtID"] : '';
    
    $sql_delete="SELECT * FROM tbl_menu WHERE id = '$txtid'";
    $resultado_delete = mysqli_query($conn, $sql_delete);
    $row_delete = mysqli_fetch_assoc($resultado_delete);
    $imagentxt= $row_delete["foto"];
    if($imagentxt !== ""){
        if(file_exists("../../../img/colaboradores/".$imagentxt)){
            unlink("../../../img/colaboradores/".$imagentxt);
        }
    }
    
    $sql = "DELETE FROM tbl_menu WHERE id = '$txtid'";
    $resultado = mysqli_query($conn, $sql);
    if(isset($resultado)){
        echo "<script>alert('Registro eliminado correctamente');</script>";
        echo "<script>window.location.href='index.php';</script>";  
    }
 
}

?>

<br>
<div class="card">
    <div class="card-header">
    <a id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
    <br>
    <br>
    <h4>Menu</h4>
    
</div>
    
    <div class="card-body">
        <div style="overflow-x:auto; width:100%;">
            <table class="table table-striped table-hover table-bordered align-middle shadow-sm" style="background: #fff; border-radius: 10px; min-width: 900px;">
                <thead class="table-dark text-center align-middle">
                    <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th>ingredientes</th>
                        <th>foto</th>
                        <th>precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider text-center align-middle">
                    <?php
                    $slq = "SELECT * FROM tbl_menu";
                    $resultado = mysqli_query($conn, $slq);
                    foreach($resultado as $row) { ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["nombre"] ?></td>
                        <td><?php echo $row["ingredientes"] ?></td>
                        <td><img src="../../../img/menus/<?php echo $row["foto"] ?>" alt="Foto" style="width:40px; height:40px; object-fit:cover; border-radius:50%;"></td>
                        <td><?php echo $row["precio"] ?></td>
                        <td>
                            <a href="editar.php?txtID=<?php echo $row["id"] ?>" class="btn btn-sm btn-info">Editar</a>
                            <a href="index.php?txtID=<?php echo $row["id"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este registro?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include_once("../../templates/footer.php");?>