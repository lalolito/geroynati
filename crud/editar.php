<?php
include_once("conexion.php");
include_once("index.php");
$codigo= $_GET[ 'cod'];

$querybuscar =mysqli_query($conn,"SELECT * FROM crud WHERE cod=$codigo");

while($mostrar = mysqli_fetch_array($querybuscar))
{
$codigo = $mostrar ['cod'];
$nombre = $mostrar ['nombre'];
$correo = $mostrar ['correo'];
$telefono =$mostrar ['tel'];
}
?>
<html>
<head>
   
    <title>CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilo.css">

</head>
<body>
    <div class="caja_popup2" id="formmodificar">
        <form method="POST" class="contenedor_popup">
            <table>
                <tr><th colspan="2">Modificar usuario</th></tr>
            <tr>
            <td>Codigo</td>
            <td><input type="text" name="txtcod" value="<?php echo $codigo;?>"required></td>
        
            </tr>
            <tr>

            <td>Nombre</td>
            <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>"required></td>
        
            </tr>
            <tr>
               
            <td>Correo</td>
            <td><input type="email" name="txtcorreo" value="<?php echo $correo;?>"required></td>
        
            </tr>
            
            <tr>

<td>Telefono</td>
<td><input type="text" name="txttelefono" value="<?php echo $telefono;?>"required></td>

</tr>
        <tr>
            <td colspan="2">
                <a href="index.php">Cancelar</a>
                <input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
            </td>
        </tr>
            </table>
        </form>
    </div>
    </body>
</html>
<?php
if(isset($_POST[ 'btnmodificar']))
{
    $codigo1 = $_POST[ 'txtcod'];

    $nombre1 = $_POST[ 'txtnombre'];
     $correo1 = $_POST[ 'txtcorreo'];
     $telefono1 = $_POST[ 'txttelefono'];

     $querymodificar = mysqli_query($conn, "UPDATE crud SET nombre='$nombre1',correo='$correo1',tel='$telefono1' WHERE cod=$codigo1");

     echo"<script>window.location= 'index.php'</script>";


    
}
?>