<?php
include ('hndc.php');
$Correo = $_POST["Correo"];

$queryusuario =  mysqli_query($conexion,"SELECT * FROM  registrarse  where Correo = '$Correo'");
$nr = mysqli_num_rows($queryusuario);

if($nr == 1)

$mostrar     = mysqli_fetch_array($queryusuario);
$enviarpass  =  $mostrar['$pass'];

$paracorreo     = $Correo;
$titulo         = "Recuperar Password";
$mensaje        = "Tu Password es:".$enviarpass;
$tucorreo       ="From: xxxx@gmail.com";


  if (mail($paracorreo, $titulo, $mensaje, $tucorreo)) {
        echo "<script>alert('Contraseña enviada'); window.location = 'index.html'; </script>";
    } else {
        echo "<script>alert('Error al enviar contraseña'); window.location = 'index.html'; </script>";
 }
else {
    echo "<script>alert('Este correo no existe'); window.location = 'index.html'; </script>";
}
?>