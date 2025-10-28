<?php include_once("../../templates/header.php");?>
<?php include_once("../../connection/conexion.php"); ?>

<?php
if ($_GET) {
    
    $txtid = (isset($_GET["txtID"])) ? $_GET["txtID"] : '';
    $sql = "SELECT * FROM tbl_menu WHERE id = '$txtid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];
        $nombre = $row["nombre"];
        $ingredientes = $row["ingredientes"];
        $foto = $row["foto"];
        $precio = $row["precio"];
    }
}

if ($_POST) {
     // Recoger los datos del formulario
    $id = (isset($_POST["id"])) ? $_POST["id"] : '';
    $nombre = (isset($_POST["nombre"])) ? $_POST["nombre"] : '';
    $ingredientes = (isset($_POST["ingredientes"])) ? $_POST["ingredientes"] : '';
    $foto = (isset($_FILES["foto"]["name"])) ? $_FILES["foto"]["name"] : '';
    $precio = (isset($_POST["precio"])) ? $_POST["precio"] : '';
    
   

    // Actualizar los datos 
    $sql = "UPDATE tbl_menu SET nombre = '$nombre', ingredientes = '$ingredientes', precio= '$precio' WHERE id = '$id'";
    mysqli_query($conn, $sql);

    // Eliminar la foto anterior
    $sql_delete = "SELECT * FROM tbl_menu WHERE id = '$id'";
    $result_delete = $conn->query($sql_delete);
    $row_delete = mysqli_fetch_assoc($result_delete);
    $imagentxt = $row_delete["foto"];
    if ($imagentxt !== "") {
        if (file_exists("../../../img/menus/" . $imagentxt)) {
            unlink("../../../img/menus/" . $imagentxt);
        }
    }

    // Subir la nueva foto
    if ($foto !== "") {
        $foto_temp = $_FILES["foto"]["tmp_name"];
        move_uploaded_file($foto_temp, "../../../img/menus/" . $foto);
        $sql_foto = "UPDATE tbl_menu SET foto='$foto' WHERE id = '$id'";
        $result_foto = mysqli_query($conn, $sql_foto);
        if (isset($result_foto)) {
            echo "<script>alert('Registro actualizado correctamente');</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error al actualizar la foto');</script>";
        }
    }
}



?>
<div class="card">
    <div class="card-header">Menu</div>
    <div class="card-body">
        <h4 class="card-title">Editar</h4>
        <form action="editar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label">ID: </label>
                <input
                    type="text"
                    value="<?php echo $id ?>"
                    readonly
                    class="form-control"
                    name="id"
                    id="id"
                    aria-describedby="helpId"
                    placeholder="Escriba el id " required
                />   
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre: </label>
                <input
                    type="text"
                    value="<?php echo $nombre ?>"
                    class="form-control"
                    name="nombre"
                    id="nombre"
                    aria-describedby="helpId"
                    placeholder="Escriba el nombre " required
                />   
            </div>

            <div class="mb-3">
                <label for="ingredientes" class="form-label">Ingredientes: </label>
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo $ingredientes ?>"
                    name="ingredientes"
                    id="ingredientes"
                    aria-describedby="helpId"
                    placeholder="Escriba los ingredientes " required
                />
            </div>

            <div class="mb-3">
                Foto actual: <img src="../../../img/menus/<?php echo $foto ?>" alt="" style="width:40px; height:40px; object-fit:cover; border-radius:50%;">
                <br> 
                <label for="foto" class="form-label">Foto: </label>
                <input
                    type="file"
                    class="form-control"
                    name="foto"
                    id="foto"
                    aria-describedby="helpId"
                    required
                /> 
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio: </label>
                <input
                    type="text"
                    value="<?php echo $precio ?>"
                    class="form-control"
                    name="precio"
                    id="precio"
                    aria-describedby="helpId"
                    placeholder="Escriba el precio" required
                />  
            </div>

            <input type="submit" value="Editar Menu" class="btn btn-success">

            <a
                name=""
                id=""
                class="btn btn-primary"
                href="index.php"
                role="button"
                >Cancelar</a
            >
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include_once("../../templates/footer.php");?>