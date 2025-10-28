<?php include_once("../../templates/header.php");?>

<?php
if($_POST){
    function agregar_menu($nombre,$ingredientes,$foto,$precio){
        include_once("../../connection/conexion.php");

        $foto=$_FILES["foto"]["name"];
        $foto_temp=$_FILES["foto"]["tmp_name"];
        move_uploaded_file($foto_temp, "../../../img/menus/".$foto);

        $sql="INSERT INTO tbl_menu(id,nombre,ingredientes,foto,precio) VALUES(NULL,'$nombre','$ingredientes','$foto','$precio')";
        $result=$conn->query($sql);
        if(isset($result)){
            echo "<script>alert('Menu agregado correctamente');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    }
    agregar_menu($_POST["nombre"],$_POST["ingredientes"],$_FILES["foto"]["name"],$_POST["precio"]);
}

?>

<div class="card">
    <div class="card-header">Menu</div>
    <div class="card-body">
        <h4 class="card-title">Registro</h4>
        <form action="crear.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre: </label>
                <input
                    type="text"
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
                    name="ingredientes"
                    id="ingredientes"
                    aria-describedby="helpId"
                    placeholder="Escriba los ingredientes " required
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

            <div class="mb-3">
                <label for="precio" class="form-label">Precio: </label>
                <input
                    type="text"
                    class="form-control"
                    name="precio"
                    id="precio"
                    aria-describedby="helpId"
                    placeholder="Escriba el precio" required
                />  
            </div>

            <input type="submit" value="Crear Menu" class="btn btn-success">

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