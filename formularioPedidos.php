<?php
//incluimos y creamos todos los objetos necesarios
include 'seguridad/seguridad.php';
include '/modelo/carta.php';
include '/modelo/pedido.php';
$sesion=new Seguridad();
$carta= new Carta();
$pedido= new Pedido();
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
    <nav>
      <?php
      if (isset($_SESSION["usuario"])) {
        if ($_SESSION["usuario"]=='sudo') {
          echo "<ul>
            <li><a href='index.php'>Inicio</a></li>
            <li><a href='formularioPedidos.php'>Para llevar</a></li>
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
    <!--En el article va todo el cuerpo de la pagina -->
    <article class="article">
      <div class="form-pedidos">


      <form class="" action="formularioPedidos.php" method="post">
        <fieldset>
          <legend>Realiza un pedido</legend>
        <!--Formulario para el registro de los pedidos -->
        <?php
        echo "Fecha: <input type='date' name='fecha' value=".date('Y-m-d')." readonly><br><br>";
          $tabla=$carta->mostrarCarta();
          foreach ($tabla as $fila) {
            echo "<input type='checkbox' name='carta[]' value='".$fila['id']."'> ".$fila['nombre'].": " .$fila['descripcion'] .".";

          }
         ?>

        <br><br>
         <input type="submit" name="Envar pedido" value="Enviar pedido">
         <input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
       </fieldset>

      </form>
      </div>
      <?php
      //comprobamos que los campos estan rellenados
        if (isset($_POST['fecha'])) {
          //llamammos a la funcion de registrar el pedido
          $pedidoregistrado=$pedido->hacerPedido($_COOKIE['id_usuario'], $_POST['fecha']);
          if ($pedidoregistrado==null) {
            //si la funcion falla sacamos el error
            echo "Ha ocurrido un error al hacer el pedido.";
          }else {
            //si la funcion va bien registramos tambien los productos que quiere.
            foreach ($_POST['carta'] as $carta) {
              $cartaregistrada=$pedido->hacerPedido_carta($pedidoregistrado['id'], $carta);
              if ($cartaregistrada==null) {
                //si falla sacamos el error
                echo "Error al registrar los productos de la carta deseados.";
              }
            }
            //si todo va bien sacamos por pantalla la reserva hecha
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
<?php } ?>
