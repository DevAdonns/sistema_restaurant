<?php include_once("../../connection/conexion.php"); ?>
<?php include_once("../../templates/header.php");?>
<?php

if($_GET){
    $txtID = $_GET["txtID"];
    $sql= "SELECT * FROM `tbl_banner` WHERE `id` = $txtID";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];
        $titulo = $row["titulo"];
        $descripcion = $row["descripcion"]; 
        $link = $row["link"];
    }   

}
?>

<?php

if($_POST){
    $banner_id = (isset($_POST["id"])) ? $_POST["id"] : '';
    $banner_titulo = (isset($_POST["titulo"])) ? $_POST["titulo"] : '';
    $banner_descripcion = (isset($_POST["descripcion"])) ? $_POST["descripcion"] : '';
    $banner_link = (isset($_POST["link"])) ? $_POST["link"] : '';
    $sql_editar = "UPDATE `tbl_banner` SET `titulo` = '$banner_titulo', `descripcion` = '$banner_descripcion', `link` = '$banner_link' WHERE `tbl_banner`.`id` = $banner_id";
    $result_sql = $conn->query($sql_editar);
    if (isset($result_sql)) {
        echo "<script>alert('Actualizado correctamente')</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Error al actualizar')</script>";
    }
}
?>
<br>
<div class="card">
    <div class="card-header">Banners</div>
    <div class="card-body">
        <h4 class="card-title">Editar</h4>
        <form action="editar.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="id"  class="form-label">ID: </label>
                <input
                    readonly
                    value="<?php echo $id ?>"
                    type="text"
                    class="form-control"
                    name="id"
                    id="id"
                    aria-describedby="helpId"
                    placeholder="Escriba el id del banner"
                />   
            </div>

            <div class="mb-3">
                <label for="titulo"  class="form-label">Titulo: </label>
                <input
                    value="<?php echo $titulo ?>"
                    type="text"
                    class="form-control"
                    name="titulo"
                    id="titulo"
                    aria-describedby="helpId"
                    placeholder="Escriba el titulo del banner"
                />   
            </div>

            <div class="mb-3">
                <label for="descripcion"  class="form-label">Descripcion: </label>
                <input
                    value="<?php echo $descripcion ?>"
                    type="text"
                    class="form-control"
                    name="descripcion"
                    id="descripcion"
                    aria-describedby="helpId"
                    placeholder="Escriba la descripcion del banner"
                />
            </div>

            <div class="mb-3">
                <label for="link"  class="form-label">Link</label>
                <input
                    value="<?php echo $link ?>"
                    type="text"
                    class="form-control"
                    name="link"
                    id="link"
                    aria-describedby="helpId"
                    placeholder="Escriba el enlace del banner"
                />  
            </div>

            <input type="submit" value="Editar Banner" class="btn btn-success">
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