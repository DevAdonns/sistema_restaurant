<?php include_once("../../templates/header.php");?>
<?php include_once("../../connection/conexion.php"); ?>

<?php
if($_GET){
    $txtid = (isset($_GET["txtID"])) ? $_GET["txtID"] : '';
    $sql= "SELECT * FROM tbl_testimonios where id = '$txtid'";
    $result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row= mysqli_fetch_assoc($result);
        $id= $row["id"];
        $opinion= $row["opinion"];
        $usuario= $row["nombre"];
    }
}

if($_POST){
    $id=$_POST["id"];
    $opinion=$_POST["opinion"];
    $nombre=$_POST["nombre"];
    $sql="UPDATE tbl_testimonios SET opinion = '$opinion', nombre = '$nombre' WHERE id = '$id'";
    $result=$conn->query($sql);
    if(isset($result)){
        echo "<script>alert('Registro actualizado correctamente');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}



?>


<div class="card">
    <div class="card-header">Testimonios</div>
    <div class="card-body">
        <h4 class="card-title">Editar Registro</h4>
        <form action="editar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label">ID: </label>
                <input
                    type="text"
                    value="<?php echo $id; ?>"
                    readonly
                    class="form-control"
                    name="id"
                    id="id"
                    aria-describedby="helpId"
                    placeholder="Escriba el id " required
                />   
            </div>

            <div class="mb-3">
                <label for="opinion" class="form-label">Opinion: </label>
                <input
                    type="text"
                    value="<?php echo $opinion; ?>"
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
                    value="<?php echo $usuario; ?>"
                    class="form-control"
                    name="nombre"
                    id="nombre"
                    aria-describedby="helpId"
                    placeholder="Escriba su nombre " required
                />
            </div>


            <input type="submit" value="Editar Testimonio" class="btn btn-success">

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














<?php include_once("../../templates/footer.php");?>