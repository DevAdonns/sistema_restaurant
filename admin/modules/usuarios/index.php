<?php include_once("../../templates/header.php");?>
<?php include_once("../../connection/conexion.php"); ?>

<?php
if($_GET){
    // Obtiene el ID del usuario a eliminar
    $txtid=(isset($_GET["txtID"])) ? $_GET["txtID"] : "";

    // Elimina el usuario seleccionado
    $sql = "DELETE FROM tbl_usuarios WHERE id='$txtid'";
    $result = $conn->query($sql);
    // Verifica si la eliminación fue exitosa
    if(isset($result)){
        echo "<script>alert('Usuario eliminado correctamente');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el usuario');</script>";
    }

}


?>

<br>
<div class="card">
    <div class="card-header">
    <a id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
    <br>
    <br>
    <h4>Usuarios</h4>
    
</div>
    
    <div class="card-body">
        <div style="overflow-x:auto; width:100%;">
            <table class="table table-striped table-hover table-bordered align-middle shadow-sm" style="background: #fff; border-radius: 10px; min-width: 900px;">
                <thead class="table-dark text-center align-middle">
                    <tr>
                        <th>ID</th>
                        <th>usuario</th>
                        <th>contraseña</th>
                        <th>correo</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider text-center align-middle">
                    <?php
                    $sql = "SELECT * FROM tbl_usuarios";
                    $result=$conn->query($sql);
                    foreach($result as $row) { ?>
                    <tr>
                        <td><strong><?php echo $row["id"] ?></strong></td>
                        <td><strong><?php echo $row["usuario"] ?></strong></td>
                        <td><strong>*****</strong></td>
                        <td><strong><?php echo $row["correo"] ?></strong></td>
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
