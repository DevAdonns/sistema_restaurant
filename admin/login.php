<?php

if($_POST){
    $usuario=(isset($_POST["usuario"])) ? $_POST["usuario"] :"";
    $clave=(isset($_POST["contraseña"])) ? hash('sha256',$_POST["contraseña"]) :"";
    include_once("connection/conexion.php");
    $sql="SELECT * FROM tbl_usuarios WHERE usuario = '$usuario' AND password = '$clave'";
    $result= $conn->query($sql);

    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["logueado"] = TRUE;
        header("location: modules/inicio/index.php");

    }else{
        $msj="Usuario o Contraseña incorrectos";
    } 

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../img/icon.svg" type="image/x-icon"">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<main>
    <section class="container text-center">
        <div class="card text-center" style="width: 30rem; margin-top: 5rem; margin-bottom: 5rem; margin-left: auto; margin-right: auto; border-radius: 10px;border: 4px solid #627988ff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <br>
            <?php
            if(isset($msj)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong><?php echo $msj ?></strong>
            </div>
            <?php } ?>
            <br>
            <br>
    <div class="card-header"><strong>Iniciar Seccion</strong></div>
    <div class="card-body text-center">
        <h4 class="card-title">Login</h4>
        <form action="login.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="usuario" class="form-label"><strong>Usuario: </strong></label>
                <input
                    type="text"
                    class="form-control text-center"
                    name="usuario"
                    id="usuario"
                    aria-describedby="helpId"
                    placeholder="Escriba el usuario " required
                />   
            </div>

            <div class="mb-3">
                <label for="contraseña" class="form-label"><strong>Contraseña: </strong></label>
                <input
                    type="password"
                    class="form-control text-center"
                    name="contraseña"
                    id="contraseña"
                    aria-describedby="helpId"
                    placeholder="Escriba su contraseña" required
                />
            </div>

            <input type="submit" value="Entrar" class="btn btn-success">

            <a
                name=""
                id=""
                class="btn btn-primary"
                href="login.php"
                role="button"
                >Cancelar</a
            >
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

    
    </section>
  </main>
  <footer>
    
  </footer>
  </body>
</html>
