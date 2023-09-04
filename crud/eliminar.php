<?php
include_once("conexion.php");

$cod = $_GET ['cod'];

mysqli_query($conn,"DELETE FROM  crud WHERE cod=$cod");

header("location:index.php" );
?>