<?php include_once("../../templates/header.php");?>


<?php

if($_POST){
    function agregar_usuario($usuario,$pass,$correo){
        include_once("../../connection/conexion.php");
        $sql="INSERT INTO tbl_usuarios (usuario,password,correo) VALUES ('$usuario', '$pass', '$correo')";
        $result= $conn->query($sql);
        if(isset($result)){
            echo "<script>alert('Usuario agregado correctamente');</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error al agregar el usuario');</script>";
        }
    }
    agregar_usuario($_POST["usuario"],hash('sha256',$_POST["contraseña"]),$_POST["correo"]);
    
}

?>

<div class="card">
    <div class="card-header">Usuarios</div>
    <div class="card-body">
        <h4 class="card-title">Registro</h4>
        <form action="crear.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario: </label>
                <input
                    type="text"
                    class="form-control"
                    name="usuario"
                    id="usuario"
                    aria-describedby="helpId"
                    placeholder="Escriba el usuario " required
                />   
            </div>

            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña: </label>
                <input
                    type="password"
                    class="form-control"
                    name="contraseña"
                    id="contraseña"
                    aria-describedby="helpId"
                    placeholder="Escriba su contraseña" required
                />
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo: </label>
                <input
                    type="email"
                    class="form-control"
                    name="correo"
                    id="correo"
                    aria-describedby="helpId"
                    placeholder="Escriba su correo" required
                />
            </div>


            <input type="submit" value="Agregar Usuario" class="btn btn-success">

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