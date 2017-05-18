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

      <a href="login.php">Iniciar sesion</a>
      <a href="registro.php">Registro&nbsp;&nbsp;&nbsp;&nbsp;</a>

      </div>
    </header>
    <nav>
      <ul>
        <li><a href="index.html">Carta</a></li>
        <li><a href="news.asp">Reservas</a></li>
        <li><a href="contacto.html">Contacto</a></li>
      </ul>
    </nav>
    <!--En el article va todo el cuerpo de la pagina -->
    <article class="article">
      <form class="" action="formularioPedidos.php" method="post">
        <!--Formulario para el registro de los pedidos -->
        Fecha: <input type="date" name="fecha" value=""><br><br>
        <?php
          $tabla=$carta->mostrarCarta();
          foreach ($tabla as $fila) {
            echo "<input type='checkbox' name='carta[]' value='".$fila['id']."'> ".$fila['nombre'].": " .$fila['descripcion'] .".";

          }
         ?>
         <input type="submit" name="Envar edido" value="Enviar pedido">
      </form>
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
            echo "Pedido registrado <br><br>";
            echo "Usuario: " .$_SESSION['usuario'] ."<br><br>";
            echo "Fecha: " .$pedidoregistrado['fecha'] ."<br><br>";
          }

        }
      ?>
  </article>
  <!--Footer de la pagina -->
  <footer>
    <div class="text">
    <p class="text-footer">Derechos reservados a FoodyFood©</p>
    <a href="https://www.facebook.com/FoodyFood-1205351362909040/"><img class="footer-icon" src="images/facebook.png" alt=""></a>
    </div>
  </footer>

  </body>
</html>
<?php } ?>
