<?php
//incluimos las clases necesarias y creamos los objetos
  include '/seguridad/seguridad.php';
  include '/modelo/reserva.php';
  $sesion=new Seguridad();
  $reserva=new Reserva();
  //comprobamos que la sesion esta iniciada.
  if (isset($_SESSION["usuario"])==false) {
    //si no esta iniciada, lo enviamos a login para que la inicie
    header('Location: login.php');
  }else {
    //si esta registrada sacamos el resto de la pagina
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulario de reservas</title>
    <link rel="stylesheet" href="/css/css.css">
  </head>
  <body>
    <header>
    <div class="banner">
    </a><img class="imagenlogo"src="images/logo.PNG" alt="">

    <a href="login.php">Iniciar sesion</a>
    <a href="registro.php">Registro&nbsp;&nbsp;</a>
    <a href="logout.php">Cerrar sesion&nbsp;&nbsp;</a>

    </div>
    </header>
    <nav>
    <ul>
      <li><a href="index.html">Inicio</a></li>
      <li><a href="formularioPedidos.php">Pedido</a></li>
      <li><a href="mostrarCarta.php">Carta</a></li>
      <li><a href="formularioreservas.php">Reservas</a></li>
      <li><a href="contacto.html">Contacto</a></li>
    </ul>
    </nav>
    <article class="article">

    <!--Formulario de registro de la reserva -->
    <form class="" action="formularioreservas.php" method="post">
      Fecha: <input type="date" name="fecha" value=""><br><br>
      Hora: <input type="time" name="hora" value=""><br><br>
      Numero de personas: <input type="number" name="personas" value="" min="1" max="100">
      <input type="submit" name="Reservar" value="Reservar">
    </form>
    <?php
    //comprobamos que se han rellenado todos los campos
      if (isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['personas'])) {
        //llamamos a la funcion de registro de la reserva.
        $reservaregistrada=$reserva->hacerReserva($_COOKIE['id_usuario'], $_POST['fecha'], $_POST['hora'], $_POST['personas']);
        //si da error, informamos
        if ($reservaregistrada==null) {
          echo "Error al registrar la reserva.";
        }else {
          //si ha salido bien lo sacamos por pantalla
          echo "Reserva registrada. <br><br>";
          echo "Usuario: " .$_SESSION['usuario'] ."<br><br>";
          echo "Fecha: " .$_POST['fecha'] ."<br><br>";
          echo "Hora: " .$_POST['hora'] ."<br><br>";
          echo "Numero de personas: " .$_POST['personas'] ."<br><br>";
        }
      }
     ?>
   </article>
   <footer>
     <div class="text">
     <p class="text-footer">Derechos reservados a FoodyFood©</p>
     <a href="https://www.facebook.com/FoodyFood-1205351362909040/" target="nueva"><img class="footer-icon" src="images/facebook.png" alt=""></a>
     <a href="https://www.instagram.com/foodyfood.florida/" target="nueva"><img class="footer-icon" src="images/insta.png" alt=""></a>
       <a href="https://www.twitter.com/foodyfood_flori" target="nueva"><img class="footer-icon" src="images/tuiter.png" alt=""></a>
     </div>
   </footer>
  </body>
</html>
<?php } ?>
