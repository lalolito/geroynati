<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentario</title>
  <link rel="stylesheet" href="Vista\css\comen.css">
  <link rel="icon" href="vista/img/logos.ico">
</head>
<body>
   
    <header class="header">
    <div class="container-hero">
            <div class="container hero">
                <div class="customer-support">
                    <i class="fa-solid fa-phone"></i> 
                    <div class="content-customer-support">
                        <span class="text">Soporte al cliente</span>
                   <span class="number">123234</span>
                    </div>
                    </div>
                    <div class="container-logo">
                        <i class="fa-solid fa-store"></i>
                    <h1 class="logo"><a href="">Gero y Natis</a></h1>
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
               <li><a href="">Revista</a></li>
              
               
             </ul>
             
          </nav>
        </div>
    </header>
   <form method="post" action="enviarcomen.php">
         <section id="contact">
            <div class="containerpx-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <h1>Comentarios</h1>
                        <br>
                        <p class="lead">Introduce un comentario </p>
                        <br>
                        <div class="col-xs-12">
                            <h2> Haz un comentaio</h2>
                            <br>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre</label>
                              <input class="form-control" name="nombre" type="text" id="nombre" placeholder="Escribe tu nombre" required>
                            </div>
                         <br>
                            <div class="form-group">
                                <label for="anotacion"class="form-label">Comentario:</label>
                                <textarea name="anotacion" id="anotacion" cols="30" rows="5" type="text" placeholder="escribe tu comentario........"> </textarea>
                            </div>
                          <br>
                          <input class="btn btn-primary" type="submit" value="Enviar comentario ">
                          <br>
                          <br>
                               <?php
$conexion=mysqli_connect("localhost","root","","hndcs");
$resultado=mysqli_query($conexion,'select * from comentario');
 
while($anotacion = mysqli_fetch_object($resultado)){
?>
<b> <?php echo($anotacion->nombre); ?></b>(<?php echo($anotacion->fecha); ?>) dijo:
<br>
<?php echo($anotacion->anotacion);?>
<br>
<hr>
 


<?php
}                        ?>
                            
                        </div>
                    </div>
                </div>
            </div>
         </section>
   </form>
   <script src="https://kit.fontawesome.com/81581fb069.js"
    crossorigin="anonymous">
        
    </script>

    
</body>
</html>