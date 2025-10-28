<?php include_once("../../templates/header.php");?>

<?php

if($_POST){
   
    function agregar_banner($nombre,$descripcion,$link){
        include_once("../../connection/conexion.php");
        $sql="INSERT INTO `tbl_banner` (`id`, `titulo`, `descripcion`, `link`) VALUES (NULL, '$nombre', '$descripcion', '$link');";
        $result_crear_banner= $conn->query($sql);
        if(isset($result_crear_banner)){
            echo "<script>alert('Registrado Correctamente');</script>";
            echo "<script>window.location='index.php';</script>";
        }
    }
    agregar_banner($_POST["titulo"],$_POST["descripcion"],$_POST["link"]);
}
?>

<br>
<div class="card">
    <div class="card-header">Banners</div>
    <div class="card-body">
        <h4 class="card-title">Registro</h4>
        <form action="crear.php" method="post">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo: </label>
                <input
                    type="text"
                    class="form-control"
                    name="titulo"
                    id="titulo"
                    aria-describedby="helpId"
                    placeholder="Escriba el titulo del banner" required
                />   
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion: </label>
                <input
                    type="text"
                    class="form-control"
                    name="descripcion"
                    id="descripcion"
                    aria-describedby="helpId"
                    placeholder="Escriba la descripcion del banner" required
                />
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input
                    type="text"
                    class="form-control"
                    name="link"
                    id="link"
                    aria-describedby="helpId"
                    placeholder="Escriba el enlace del banner" required
                />  
            </div>

            <input type="submit" value="Crear Banner" class="btn btn-success">

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