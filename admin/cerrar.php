<?php
session_start();
session_destroy();
echo "<script>alert('Seccion Cerrada');</script>";
echo "<script>window.location.href='./login.php';</script>";
?>