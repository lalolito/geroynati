<?php
include_once("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="stilo.css">
</head>
<body>
     <table>
    
               
           
        <div id="barrabuscar">
            <form method="post">
                <input type="submit" value="Buscar" name="btnbuscar"> <input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
            </form>
        </div>
        <tr><th colspan="5"><h1>LISTA USUARIOS</h1><th><a style="font-weight:normal;font-size:43x;"onclick="abrirform()">Agregar</a></th></tr>
        <th>Nro </th>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Telefono</th>
        <TH>Accion</TH>
        </tr>
        <?php
        if(isset($_POST['btnbuscar']))
        {
            $buscar = $_POST ['txtbuscar'];
            $queryusuarios = mysqli_query($conn, "SELECT cod,nombre,correo,tel FROM crud where nombre like'".$buscar. "%'");
        }
        else
        {
            $queryusuarios= mysqli_query($conn, "SELECT * FROM crud ORDER BY cod asc");
        }
        $numerofila= 0 ;
        while($mostrar = mysqli_fetch_array($queryusuarios))
        { $numerofila++;
           
            echo "<tr>";
            echo "<td>" .$numerofila."</td>";
            echo "<td>" .$mostrar ['cod']. "</td>";
            echo "<td>" .$mostrar ['nombre']. "</td>";
            echo "<td>" .$mostrar ['correo']. "</td>";
            echo "<td>" .$mostrar ['tel']. "</td>";
            echo "<td style='width:26%'><a href=\"editar.php?cod=$mostrar[cod]\">Modificar</a> | <a href=\"eliminar.php?cod=$mostrar[cod]\" onClick=\"return confirm('¿Estas seguro de eliminar a $mostrar[nombre]?')\">Eliminar</a></td>";
        }
        ?>
     </table>
     <script>
        function abrirform(){
            document.getElementById("formregistrar").style.display = "block";

        }
        function cancelarform(){
            document.getElementById("formregistrar").style.display = "none";

        }
       
        </Script>
        <div class="caja_poup" id="formregistrar">
            <form action="agregar.php" class="contenedor_popup" method="POST">

             <table>
                <tr><th colspan="2">Nuevo usuario</th></tr>

               
                <tr>
                    <td>Nombre</td>
                    <td><input type=" text" name="txtnombre" required></td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td><input type="email" name="txtcorreo" required></td>
                </tr>
                <tr>
                    <td>Telefono</td>
                    <td><input type="number" name="txttelefono" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="button" onclick="cancelarform()">Cancelar</button>
                        <input type="submit" name="btnregistrar" value="Registrar" onclick="javascript: return confirm('¿Deseas registrar a este usuario?');">

                    </td>
                </tr>
                

             </table>
            </form>
           
        </div>
        <form action="inicio.html">
            <input  class="boton2" type="submit" name="btnCancelar" id="btnCancelar" value="Inicio">
        </form>
</body>
</html>
