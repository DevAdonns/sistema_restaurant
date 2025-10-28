<?php include_once("../../templates/header.php");?>


<?php
if($_POST){
    function agregar_colaborador($titulo,$descripcion,$facebook,$instagram,$linkedin,$foto){
        include_once("../../connection/conexion.php");
        $foto= $_FILES["foto"]["name"];
        $foto_temp= $_FILES["foto"]["tmp_name"];
        move_uploaded_file($foto_temp, "../../../img/colaboradores/".$foto);
        $sql="INSERT INTO `tbl_colaboradores` (`id`, `titulo`, `descripcion`, `linkfacebook`, `linkinstagram`, `linklinkedin`, `foto`) VALUES (NULL, '$titulo', '$descripcion', '$facebook', '$instagram', '$linkedin', '$foto')";
        $resultado= mysqli_query($conn, $sql);
        if(isset($resultado)){
            echo "<script>alert('Registro agregado correctamente');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    } 
    agregar_colaborador($_POST["titulo"], $_POST["descripcion"], $_POST["facebook"], $_POST["instagram"], $_POST["linkedIn"], $_FILES["foto"]["name"]);
}
?>

<div class="card">
    <div class="card-header">Colaboradores</div>
    <div class="card-body">
        <h4 class="card-title">Registro</h4>
        <form action="crear.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo: </label>
                <input
                    type="text"
                    class="form-control"
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
                    class="form-control"
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
            </div>

            <input type="submit" value="Agregar Colaborador" class="btn btn-success">

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