<?php
require 'hndc.php';
session_start();

if (isset($_POST["Correo"]) && isset($_POST["Password"])) {
    $correo = $_POST["Correo"];
    $password = $_POST["Password"];

    // Consulta preparada para evitar inyección SQL
    $stmt = $conexion->prepare("SELECT COUNT(*) as contar, rol_id FROM registrarse WHERE Correo = ? AND password = ?");
    $stmt->bind_param("ss", $correo, $password);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && $row['contar'] > 0) {
        $rol_id = $row['rol_id'];

        $_SESSION['rol_id'] = $rol_id; // Almacena el ID del rol en una variable de sesión

        if ($rol_id == 1) { // Rol de administrador
            header("Location: crud\index.php");
        } else { // Otros roles (usuario registrado)
            header("Location: inicio.html");
        }
        exit;
    } else {
        echo '
        <script>
        alert("El correo no existe");
        window.location.href = "iniciar_sesion.html";
        </script>';
        exit;
    }

    $stmt->close();
} else {
    echo "Error: Debes proporcionar correo y contraseña.";
}
?>