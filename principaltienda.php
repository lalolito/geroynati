<?php
session_start();

require_once("carro_de_compras/tiendageroynatis.php");

$usar_db = new DBcontrol();

if (!empty($_GET["accion"])) {
    switch ($_GET["accion"]) {
        case "agregar":
            if (!empty($_POST["txtcantidad"])) {
                $codigoproducto = $usar_db->vaiQuery("SELECT * FROM carrito WHERE codigo='" . $_GET["codigo"] . "'");
                $items_array = array(
                    $codigoproducto[0]["codigo"] => array(
                        'vai_nombre' => $codigoproducto[0]["nombre"],
                        'vai_codigo' => $codigoproducto[0]["codigo"],
                        'txtcantidad' => $_POST["txtcantidad"],
                        'vai_precio' => $codigoproducto[0]["precio"],
                        'vai_img' => $codigoproducto[0]["img"]
                    )
                );

                if (!empty($_SESSION["items_carrito"])) {
                    if (in_array($codigoproducto[0]["codigo"], array_keys($_SESSION["items_carrito"]))) {
                        foreach ($_SESSION["items_carrito"] as $i => $j) {
                            if ($codigoproducto[0]["codigo"] == $i) {
                                if (empty($_SESSION["items_carrito"][$i]["txtcantidad"])) {
                                    $_SESSION["items_carrito"][$i]["txtcantidad"] = 0;
                                }
                                $_SESSION["items_carrito"][$i]["txtcantidad"] += $_POST["txtcantidad"];
                            }
                        }
                    } else {
                        $_SESSION["items_carrito"] = array_merge($_SESSION["items_carrito"], $items_array);
                    }
                } else {
                    $_SESSION["items_carrito"] = $items_array;
                }
            }
            break;
        case "eliminar":
            if (!empty($_SESSION["items_carrito"])) {
                foreach ($_SESSION["items_carrito"] as $i => $j) {
                    if ($_GET["eliminarcode"] == $i) {
                        unset($_SESSION["items_carrito"][$i]);
                    }
                    if (empty($_SESSION["items_carrito"])) {
                        unset($_SESSION["items_carrito"]);
                    }
                }
            }
            break;
        case "vacio":
            unset($_SESSION["items_carrito"]);
            break;
        case "pagar":
            echo "<script> alert('Gracias por su compra - tiendageroynatis');window.location= 'principaltienda.php' </script>";
            unset($_SESSION["items_carrito"]);
            break;
    }
}
?>
<html>
<meta charset="UTF-8">

<head>
    <title>Tienda Gero y Natis</title>
    <link href="carro_de_compras/estilorevista.css" rel="stylesheet" />
    
</head>
<header>
        <div class="container-hero">
            <div class="container hero">
                <div class="customer-support">
                    <i class="fa-solid fa-envelope"></i>
                    <div class="content-customer-support">
                        <span class="text">Correo</span>
                   <span class="number">geroynatis@gmail.com</span>
                    </div>
                    </div>
                    <div class="container-logo">
                        <i class="fa-solid fa-store"></i>
                    <h1 class="logo"><a href="index.html">Gero y Natis</a></h1>
                </div>
<div class="container-user">

    <i class="fa-solid fa-shirt"></i>
<h1 class="logo"><a href="">ropa</a></h1>
</div>

             </div>
            </div>
          <div class="container-navbar">
            
          <nav class="navbar container">
            <ul class="menu">

                
               <li><a href="index.html">Inicio</a></li>
       
               <li><a href="comen.php">Comentarios</a></li>
              
               
             </ul>
             
          </nav>
        </div>
    </header>
<body>
    <div align="center">
        <h1>Tiendita "Gero y Natis"</h1>
    </div>
    <div>
        <div>
            <h2>Lista de productos a comprar</h2>
        </div>

        <?php
        if (isset($_SESSION["items_carrito"])) {
            $totcantidad = 0;
            $totprecio = 0;
        ?>

            <table>
                <tr>
                    <th style="width:30%">Descripción</th>
                    <th style="width:10%">Código</th>
                    <th style="width:10%">Cantidad</th>
                    <th style="width:10%">Precio x unidad</th>
                    <th style="width:10%">Precio</th>
                    <th style="width:10%"><a href="principaltienda.php?accion=vacio">Limpiar</a></th>
                </tr>

                <?php
                foreach ($_SESSION["items_carrito"] as $item) {
                    $item_price = $item["txtcantidad"] * $item["vai_precio"];
                ?>
                    <tr>
                        <td><img src="<?php echo $item["vai_img"]; ?>" class="imagen_peque" /><?php echo $item["vai_nombre"]; ?></td>
                        <td><?php echo $item["vai_codigo"]; ?></td>
                        <td><?php echo $item["txtcantidad"]; ?></td>
                        <td><?php echo "$ " . $item["vai_precio"]; ?></td>
                        <td><?php echo "$ " . number_format($item_price, 4); ?></td>
                        <td><a href="principaltienda.php?accion=eliminar&eliminarcode=<?php echo $item["vai_codigo"]; ?>">Eliminar</a></td>
                    </tr>
                <?php
                    $totcantidad += $item["txtcantidad"];
                    $totprecio += ($item["vai_precio"] * $item["txtcantidad"]);
                }
                ?>

                <tr style="background-color:#f3f3f3">
                    <td colspan="2"><b>Total de productos:</b></td>
                    <td><b><?php echo $totcantidad; ?></b></td>
                    <td colspan="2"><strong><?php echo "$ " . number_format($totprecio, 4); ?></strong></td>
                    <td><a href="principaltienda.php?accion=pagar">Pagar</a></td>
                </tr>

            </table>

        <?php
        } else {
        ?>
            <div align="center">
                <h3>¡El carrito está vacío!</h3>
            </div>
        <?php
        }
        ?>
    </div>

    <div>
        <div>
            <h2>Productos</h2>
        </div>
        <div class="contenedor_general">
            <?php
            $productos_array = $usar_db->vaiquery("SELECT * FROM carrito ORDER BY id ASC");
            if (!empty($productos_array)) {
                foreach ($productos_array as $i => $k) {
            ?>
                    <div class="contenedor_productos">
                        <form method="POST" action="principaltienda.php?accion=agregar&codigo=<?php echo $productos_array[$i]["codigo"]; ?>">
                            <div><img src="<?php echo $productos_array[$i]["img"]; ?>"></div>
                            <div>
                                <div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["nombre"]; ?></div>
                                <div style="padding-top:10px;font-size:20px;"><?php echo "$" . $productos_array[$i]["precio"]; ?></div>
                                <div><input type="text" name="txtcantidad" value="1" size="2" /><input type="submit" value="Agregar" /></div>
                            </div>
                        </form>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</body>

</html>