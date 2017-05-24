<?php
//incluimos y creamos todos los objetos necesarios
include 'seguridad/seguridad.php';
include '/modelo/producto.php';
$sesion=new Seguridad();
$pedido= new Producto();
//comprobamos si la sesion esta iniciada.
  if (isset($_SESSION["usuario"])==false) {
    //si no esta iniciada lo enviamos a login para que la inicie
    header('Location: login.php');
  }else {
    //si esta iniciada seguimos con la pagina
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pedidos</title>
    <link rel="stylesheet" href="css/css.css">
  </head>
  <body>
    <!--Header de la pagina con banner y logo y el menu. -->
    <header>
      <div class="banner">
      <img class="imagenlogo"src="images/logo.PNG" alt="">
      <div class="enlaceBanner">
        <ul>
      <?php
        if (isset($_SESSION['usuario'])) {
          echo "<li><a href='logout.php'>Cerrar sesion</a></li>";
        }else {
          echo "<li><a href='login.php'>Iniciar sesion</a>
          <a href='registro.php'>Registro</a></li>";
        }
       ?>
     </ul>
     </div>
      </div>
    </header>
    <?php
  private  function InsertarProducto($producto,$proveedor,$fecha){
      $this->conexion->query("INSERT INTO producto (Producto, Proveedor, Fecha) VALUES ('".$producto."','".$proveedor."','".$fecha."')");
    }

    if (isset($_POST)) {
        $this->conexion->InsertarProducto($_POST['producto'],$_POST['proveedor'],$_POST['fecha']);
    }
     ?>
        <form class="" action="controlproductos.php" method="post">
          <label for="Producto">Producto</label>
          <input type="text" name="producto" value="">

          <label for="Proveedor">Proveedor</label>
          <input type="text" name="proveedor" value="">

          <label for="Fecha">Fecha</label>
          <input type="date" name="fecha" value="">

          <input type="submit" name="" value="Añadir Producto">
        </form>
  <!--Footer de la pagina -->
  <footer>
    <div class="text">
    <p class="text-footer">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
    <a href="https://www.facebook.com/FoodyFood-1205351362909040/" target="nueva"><img class="footer-icon" src="images/facebook.png" alt=""></a>
    <a href="https://www.instagram.com/foodyfood.florida/" target="nueva"><img class="footer-icon" src="images/insta.png" alt=""></a>
      <a href="https://www.twitter.com/foodyfood_flori" target="nueva"><img class="footer-icon" src="images/tuiter.png" alt=""></a>
    </div>
  </footer>


  </body>
</html>
<?php } ?>
