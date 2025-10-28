<?php include_once("admin/connection/conexion.php"); ?>

<?php
    if($_POST){
      $nombre=(isset($_POST["nombre"])) ?$_POST["nombre"] : "" ;
      $correo=(isset($_POST["correo"])) ?$_POST["correo"] : "" ;
      $mensaje=(isset($_POST["mensaje"])) ?$_POST["mensaje"] : "" ; 
      
      if(isset($nombre) && isset($correo) && isset($mensaje)){
            $sql_comentario="INSERT INTO `tbl_comentarios` (`id`, `nombre`, `correo`, `mensaje`) VALUES (NULL, '$nombre', '$correo', '$mensaje');";
            $result_comentario = mysqli_query($conn,$sql_comentario);
            if(isset($result_comentario)){
              echo "<script>alert('Comentario agregado correctamente');</script>";
              echo "<script>window.location.href='index.php';</script>";
            }
          }
        }
        
    $sql_banners= "SELECT * FROM `tbl_banner` ORDER BY id DESC LIMIT 1";
    $result_banners= mysqli_query($conn, $sql_banners);

    $sql_colaboradores = "SELECT * FROM tbl_colaboradores ORDER BY id  ASC";
    $resultado_colaboradores = mysqli_query($conn, $sql_colaboradores);

    $sql_testimonio= "SELECT * FROM tbl_testimonios ORDER BY id  DESC LIMIT 2";
    $result_testimonio= $conn->query($sql_testimonio);

    $sql_menus= "SELECT * FROM tbl_menu ORDER BY id DESC LIMIT 4";
    $result_menus= mysqli_query($conn,$sql_menus);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"">
    <link rel="shortcut icon" href="img/icon.svg" type="image/x-icon"">
    
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" > <i class="fas fa-utensils"> </i> Restaurant</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Inicio
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#menus">Menu del Dia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#chefs">Chefs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#testimonios">Testimonio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#comentarios">contacto</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
</header>


<main>
    <section id="banner" class="container-fluid p-0">
        <div class="banner-img kenburns-right" style="position:relative; overflow:hidden; width:100%; height:400px; margin:10px auto; background:url('img/slider-imagen.jpg'); background-size:cover; background-position:center;">
            <div class="banner-text text-center text-black" style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); width:100%;">
                <?php  
                // Mostrar el banner
                    foreach($result_banners as $row){ ?>
                        <h1 class="tracking-in-expand"><?php echo $row["titulo"] ?></h1>
                        <h5><?php echo $row["descripcion"] ?></h5>
                        <a href="#menus" class="btn btn-primary">Ver menus</a>  
                <?php } ?>
            </div>
        </div>
    </section>
    <br>

    <section id="id" class="container mt-4 text-center">
        <div class="jumbotron bg-dark text-black" style="padding: 2rem;border-radius: 10px;">
            <h2>Bienvenido al  Restaurante</h2>
            <br>
            <p>Descubre de una experiencia culinaria única</p>
        </div>
    </section>


    <section id="chefs" class="container mt-4 text-center text-black">
        <h2>Nuestros Chefs</h2>
        <div class="row">
            <?php
                // Mostrar los colaboradores
                foreach($resultado_colaboradores as $row) { ?>
                    <div class="col-md-4">
                        <div class="card" style="border: 5px solid #ccc; margin-bottom: 20px; height: 100%;">
                            <img src="img/colaboradores/<?php echo $row["foto"] ?>" class="card-img-top" alt="Chef 1" style="height: 100%;">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $row["titulo"] ?></h3>
                                <p class="card-text"><?php echo $row["descripcion"] ?></p>
                                <div class="social-icons mt-3">
                                    <a href="<?php echo $row["linkfacebook"] ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                    <a href="<?php echo $row["linkinstagram"] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="<?php echo $row["linklinkedin"] ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </section>


    <section id="testimonios" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Testimonios</h2>
                <div class="row">
                <?php
                    foreach($result_testimonio as $row) { ?>
                        <div class="col-md-6 d-flex">
                            <div class="card mb-4 w-100">
                                <div class="card-body">
                                    <p class="card-text"><strong><?php echo $row["opinion"]; ?></strong></p>
                                </div>
                                <div class="card-footer text-muted">
                                <p><strong><?php echo $row["nombre"]; ?></strong></p>
                                </div>
                            </div>
                        </div>
                <?php } ?>
                </div>
                
        </div>
    
    <section id="menus" class="container mt-4 text-center text-black">
        <h2>Nuestros Menus</h2>
        <div class="row">
            <?php
                // Mostrar los Menus
                foreach($result_menus as $row) { ?>
                    <div class="col-md-4">
                        <div class="card" style="border: 5px solid #ccc; margin-bottom: 20px;height: 100%;">
                            <img src="img/menus/<?php echo $row["foto"] ?>" class="card-img-top" alt="Chef 1" style="height: 100%;">
                            <div class="card-body">
                                <h3 class="card-title"><strong><?php echo $row["nombre"] ?></strong></h3>
                                <p class="card-text"><strong>Ingredientes: <?php echo $row["ingredientes"] ?></strong></p>
                                <p class="card-text"><strong>Precio: <?php echo $row["precio"] ?>$</strong></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </section>
<br>
    <section id="comentarios" class="container mt-4 text-black">
        <h2>Comentarios</h2>
        <p>Estamos aqui para servirle,</p>
        <form action="index.php" method="post" enctype="multipart/form-data">
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

            <div class="mb-3">
                <label for="correo" class="form-label">Correo: </label>
                <input
                    type="email"
                    class="form-control"
                    name="correo"
                    id="correo"
                    aria-describedby="helpId"
                    placeholder="Escriba su correo " required
                />
            </div>
            <div class="mb-3">
              <label for="mensaje">Mensaje: </label><br><br>
                <textarea name="mensaje" id="mensaje" cols="50" rows="6" class="form-control" style="border: 20px; " placeholder="Escribe tu Mensaje">

                </textarea>
            </div>
            


            <input type="submit" value="Enviar Comentario" class="btn btn-success">

            <a
                name=""
                id=""
                class="btn btn-primary"
                href="index.php"
                role="button"
                >Cancelar</a
            >
        </form>
    </section>

</main>
<footer>
    <div class="container text-center mt-4 text-black">
        <p>&copy; 2025 Restaurante. Todos los derechos reservados.</p>
    </div>
</footer>
</body>
</html>
