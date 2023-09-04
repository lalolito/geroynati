<?php
$conn = new mysqli("localhost","root","","hndcs");
 if($conn->connect_error)
{
    echo "No hay conexion:(" .$conn->connect_error . ")" .  $conn->connect_error;

}

?>