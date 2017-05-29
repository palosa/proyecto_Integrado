<?php
//incluimos y creamos todos los objetos necesarios
include 'seguridad/seguridad.php';
include 'modelo/productos.php';
$sesion=new Seguridad();
$pedido= new Productos();
//comprobamos si la sesion esta iniciada.
  if (isset($_SESSION["usuario"])==false) {
    //si no esta iniciada lo enviamos a login para que la inicie
    header('Location: login.php');
  }else {
    if ($_SESSION["usuario"]=='sudo') {


    //si esta iniciada y es sudo seguimos con la pagina
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
    <!--MENU-->
    <nav>
      <?php
      if (isset($_SESSION["usuario"])) {
        if ($_SESSION["usuario"]=='sudo') {
          echo "<ul>
            <li><a href='index.php'>Inicio</a></li>
            <li><a href='pedidosudo.php'>Mostrar pedido</a></li>
            <li><a href='mostrarcarta.php'>Carta</a></li>
            <li><a href='reservasudo.php'>Reservas</a></li>
            <li><a href='contacto.php'>Contacto</a></li>
            <li><a href='controlproductos.php'>Control productos</a></li>
          </ul>";
        }else {
          echo "<ul>
            <li><a href='index.php'>Inicio</a></li>
            <li><a href='formularioPedidos.php'>Para llevar</a></li>
            <li><a href='mostrarcarta.php'>Carta</a></li>
            <li><a href='formularioreservas.php'>Reservas</a></li>
            <li><a href='contacto.php'>Contacto</a></li>
            <li><a href='miPerfil.php'>Mi perfil</a></li>
          </ul>";
        }
      }else {
        echo "<ul>
          <li><a href='index.php'>Inicio</a></li>
          <li><a href='formularioPedidos.php'>Para llevar</a></li>
          <li><a href='mostrarcarta.php'>Carta</a></li>
          <li><a href='formularioreservas.php'>Reservas</a></li>
          <li><a href='contacto.php'>Contacto</a></li>
        </ul>";
      }

       ?>
    </nav>
    <article class="article">
      <form class="" action="controlproductos.php" method="post">
        <fieldset>
          <legend>Pedido de productos</legend>
          Producto: <br>
          <input type="text" name="producto" value="">

          Proveedor: <br>
          <input type="text" name="proveedor" value="">

          Fecha: <br>
          <input type="date" name="fecha" value="">

          <input type="submit" name="" value="Añadir Producto">
        </fieldset>
      </form>
    <?php
      if (isset($_POST['producto']) && isset($_POST['proveedor']) && isset($_POST['fecha'])) {

        $resultado=$pedido->insertarProducto($_POST['producto'], $_POST['proveedor'], $_POST['fecha']);
        if ($resultado==null) {
          ?>
          <script type="text/javascript">
            alert("Error al registrar el pedido");
          </script>
          <?php
        }else {
          ?>
            <script type="text/javascript">
              alert("Pedido registrado con exito.");
            </script>
          <?php
        }
      }
     ?>
    </article>

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
<?php
    }else {
      header('Location: index.php');
    }
 } ?>
