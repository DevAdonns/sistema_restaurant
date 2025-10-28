<?php
$conn = new mysqli("localhost","root","","restaurante");
if(mysqli_connect_error()){
    die("Error al conectar").$conn->connect_error();
}else {
    return $conn;
}
?>