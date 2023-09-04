 <?php 
 $nombre = $_POST['nombre'];
 $anotacion = $_POST['anotacion'];
 $conexion=mysqli_connect("localhost","root","","hndcs");
$nombre= mysqli_real_escape_string($conexion,$nombre);
$anotacion =mysqli_real_escape_string($conexion, $anotacion);
$resultado=mysqli_query($conexion,'INSERT INTO comentario(nombre, anotacion) values ("'.$nombre.'","'.$anotacion.'")');
if ($resultado) {
    mysqli_close($conexion);
    echo '<script>alert("Comentario publicado"); window.location.href = "comen.php";</script>';
    exit;
} else {
    echo '<script>alert("Error al insertar en la base de datos: ' . mysqli_error($conexion) . '"); window.history.back();</script>';
}

?>
