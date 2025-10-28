<?php include_once("../../templates/header.php");?>
<?php include_once("../../connection/conexion.php"); ?>
<?php
if($_GET){
    $id=$_GET["txtID"];
    $sql="DELETE FROM tbl_comentarios WHERE id = '$id'";
    $result=$conn->query($sql);
    if(isset($result)){
        echo "<script>alert('Comentario eliminado correctamente');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el Comentario');</script>";
    }

}

?>

<br>
<div class="card">
    <div class="card-header">
    
    <h4>Comentarios</h4>
    
</div>
    
    <div class="card-body">
        <div style="overflow-x:auto; width:100%;">
            <table class="table table-striped table-hover table-bordered align-middle shadow-sm" style="background: #fff; border-radius: 10px; min-width: 900px;">
                <thead class="table-dark text-center align-middle">
                    <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th>correo</th>
                        <th>mensaje</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider text-center align-middle">
                    <?php
                    $sql = "SELECT * FROM tbl_comentarios";
                    $result=$conn->query($sql);
                    foreach($result as $row) { ?>
                    <tr>
                        <td><strong><?php echo $row["id"] ?></strong></td>
                        <td><strong><?php echo $row["nombre"] ?></strong></td>
                        <td><strong><?php echo $row["correo"] ?></strong></td>
                        <td><strong><?php echo $row["mensaje"] ?></strong></td>
                        <td>
                            <a href="index.php?txtID=<?php echo $row["id"]; ?>" class="btn btn-danger" onclick="return confirm('Seguro de que deseas eliminar este registro?')">Eliminar</a>
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