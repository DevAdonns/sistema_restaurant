<?php include_once("../../templates/header.php"); ?>
<?php include_once("../../connection/conexion.php"); ?>

<?php

if ($_GET) {
    // Recuperar los datos del colaborador
    $txtid = (isset($_GET["txtID"])) ? $_GET["txtID"] : '';
    $sql = "SELECT * FROM tbl_colaboradores WHERE id = '$txtid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];
        $titulo = $row["titulo"];
        $descripcion = $row["descripcion"];
        $facebook = $row["linkfacebook"];
        $instagram = $row["linkinstagram"];
        $linkedin = $row["linklinkedin"];
        $foto = $row["foto"];
    }
}

if ($_POST) {
    // Recoger los datos del formulario
    $id = (isset($_POST["id"])) ? $_POST["id"] : '';
    $titulo = (isset($_POST["titulo"])) ? $_POST["titulo"] : '';
    $descripcion = (isset($_POST["descripcion"])) ? $_POST["descripcion"] : '';
    $facebook = (isset($_POST["facebook"])) ? $_POST["facebook"] : '';
    $instagram = (isset($_POST["instagram"])) ? $_POST["instagram"] : '';
    $linkedin = (isset($_POST["linkedIn"])) ? $_POST["linkedIn"] : '';
    $foto = (isset($_FILES["foto"]["name"])) ? $_FILES["foto"]["name"] : '';

    // Actualizar los datos del colaborador
    $sql = "UPDATE tbl_colaboradores SET titulo='$titulo', descripcion='$descripcion', linkfacebook='$facebook', linkinstagram='$instagram', linklinkedin='$linkedin' WHERE id = '$id'";
    mysqli_query($conn, $sql);

    // Eliminar la foto anterior
    $sql_delete = "SELECT * FROM tbl_colaboradores WHERE id = '$id'";
    $result_delete = $conn->query($sql_delete);
    $row_delete = mysqli_fetch_assoc($result_delete);
    $imagentxt = $row_delete["foto"];
    if ($imagentxt !== "") {
        if (file_exists("../../../img/colaboradores/" . $imagentxt)) {
            unlink("../../../img/colaboradores/" . $imagentxt);
        }
    }

    // Subir la nueva foto
    if ($foto !== "") {
        $foto_temp = $_FILES["foto"]["tmp_name"];
        move_uploaded_file($foto_temp, "../../../img/colaboradores/" . $foto);
        $sql_foto = "UPDATE tbl_colaboradores SET foto='$foto' WHERE id = '$id'";
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

<!-- Formulario para editar el colaborador -->
<div class="card text-primary" style="color: black;">
    <div class="card-header">Colaboradores</div>
    <div class="card-body">
        <h4 class="card-title text-primary">Editar Registro</h4>
        <form action="editar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label">id: </label>
                <input
                    type="text"
                    value="<?php echo $id ?>"
                    readonly
                    class="form-control text-primary"
                    name="id"
                    id="id"
                    aria-describedby="helpId"
                    placeholder="Escriba el id " required
                />
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo: </label>
                <input
                    type="text"
                    value="<?php echo $titulo ?>"
                    class="form-control text-primary"
                    name="titulo"
                    id="titulo"
                    aria-describedby="helpId"
                    placeholder="Escriba el titulo " required
                />
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion: </label>
                <input
                    type="text"
                    value="<?php echo $descripcion ?>"
                    class="form-control text-primary"
                    name="descripcion"
                    id="descripcion"
                    aria-describedby="helpId"
                    placeholder="Escriba la descripcion " required
                />
            </div>

            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook: </label>
                <input
                    type="text"
                    value="<?php echo $facebook ?>"
                    class="form-control"
                    name="facebook"
                    id="facebook"
                    aria-describedby="helpId"
                    placeholder="Escriba el Facebook" required
                />
            </div>

            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram: </label>
                <input
                    type="text"
                    value="<?php echo $instagram ?>"
                    class="form-control"
                    name="instagram"
                    id="instagram"
                    aria-describedby="helpId"
                    placeholder="Escriba el Instagram" required
                />
            </div>

            <div class="mb-3">
                <label for="linkedIn" class="form-label">LinkedIn: </label>
                <input
                    type="text"
                    value="<?php echo $linkedin ?>"
                    class="form-control"
                    name="linkedIn"
                    id="linkedIn"
                    aria-describedby="helpId"
                    placeholder="Escriba el LinkedIn " required
                />
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto: </label>
                <input
                    type="file"
                    class="form-control"
                    name="foto"
                    id="foto"
                    aria-describedby="helpId"
                    required
                />
                Foto actual:
                <img src="../../../img/colaboradores/<?php echo $foto ?>" alt="" style="width:40px; height:40px; object-fit:cover; border-radius:50%;">
            </div>

            <input type="submit" value="Editar Registro" class="btn btn-success">

            <a
                name=""
                id=""
                class="btn btn-primary"
                href="index.php"
                role="button"
            >Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include_once("../../templates/footer.php"); ?>