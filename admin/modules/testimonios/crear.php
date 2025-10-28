<?php include_once("../../templates/header.php");?>

<?php

if($_POST){
    // Function para agregar un testimonio
    // Recibe los datos del formulario y los inserta en la base de datos
    function agregar_testimonio($opinion,$nombre){
        include_once("../../connection/conexion.php");
        $sql= "INSERT INTO tbl_testimonios (opinion, nombre) VALUES ('$opinion', '$nombre')";
        $result = mysqli_query($conn, $sql);
        // Verifica si la inserción fue exitosa
        if(isset($result)){
            echo "<script>alert('Testimonio agregado correctamente');</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error al agregar el testimonio');</script>";
        }


    }
    // Llama a la función para agregar el testimonio con los datos del formulario
    agregar_testimonio($_POST["opinion"], $_POST["nombre"]);
    

}

?>

<div class="card">
    <div class="card-header">Testimonios</div>
    <div class="card-body">
        <h4 class="card-title">Registro</h4>
        <form action="crear.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="opinion" class="form-label">Opinion: </label>
                <input
                    type="text"
                    class="form-control"
                    name="opinion"
                    id="opinion"
                    aria-describedby="helpId"
                    placeholder="Escriba la opinion " required
                />   
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre: </label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre"
                    id="nombre"
                    aria-describedby="helpId"
                    placeholder="Escriba su nombre " required
                />
            </div>


            <input type="submit" value="Agregar Testimonio" class="btn btn-success">

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