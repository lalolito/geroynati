<?php

include 'hndc.php';

$Nombre = $_POST["Nombre"];
$Apellidos = $_POST["Apellidos"];
$Telefono = $_POST["Telefono"];
$Correo = $_POST["Correo"];
$Password = $_POST["Password"];





$insertar = "INSERT INTO registrarse(Nombre, Apellidos, Telefono, Correo, Password ) VALUES ('$Nombre','$Apellidos','$Telefono ','$Correo','$Password')";

$verificar_Correo = mysqli_query($conexion, "SELECT * FROM  registrarse WHERE Correo = '$Correo'");



if(mysqli_num_rows($verificar_Correo) > 0){
    echo'<script>
    alert("El correo ya esta registrado");
    window.location.href="iniciar_sesion.html";
    </script>';
    exit;
}

$resultado = mysqli_query($conexion, $insertar);




if  (!$resultado){
    echo'Error al registrarse';
}else{
    echo'<script>
    alert(" Ha sido registrado correctamente");
  window.location.href="iniciar_sesion.html";
    </script>';

}
mysqli_close($conexion);
?>
