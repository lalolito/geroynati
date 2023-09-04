<?php include_once ("conexion.php");
 $nombre = $_POST [ "txtnombre" ];
 $correo = $_POST ["txtcorreo" ];
$telefono = $_POST [ "txttelefono" ];
mysqli_query($conn, "INSERT INTO crud(nombre,correo,tel) VALUES ('$nombre','$correo','$telefono') ");
header("location:index.php");
?>
