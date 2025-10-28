<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("location: http://localhost/restaurant/admin/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="shortcut icon" href="../../../img/icon.svg" type="image/x-icon"">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/restaurant/admin/modules/inicio/index.php">Administrador</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor03">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../banners/index.php">Banners
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../colaboradores/index.php">Colaboradores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../testimonios/index.php">Testimonios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../menu/index.php">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../comentarios/index.php">comentarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../usuarios/index.php">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../cerrar.php">Cerrar Sesion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="container">
            