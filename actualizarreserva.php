<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar usuario</title>
    <link rel="stylesheet" href="css/css.css">
  </head>
  <body>
    <header>
      <div class="banner">
      <img class="imagenlogo"src="images/logo.PNG" alt="">
    <div class="enlaceBanner">
      <ul>
      <?php
      //menu de iniciar/cerrar sesion
      include 'seguridad/seguridad.php';
      $sesion=new Seguridad();

        if (isset($_SESSION['usuario'])) {
          echo "<li><a href='logout.php'>Cerrar sesion</a>";
        }else {
          echo "<li><a href='login.php'>Iniciar sesion</a>
          <a href='registro.php'>Registro</a></li>";
        }
       ?>
       </ul>
       </div>
      </div>
    </header>
    <!--MENU -->
    <nav>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="formularioPedidos.php">Pedido</a></li>
        <li><a href="mostrarcarta.php">Carta</a></li>
        <li><a href="formularioreservas.php">Reservas</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="miPerfil.php">Mi Perfil</a></li>
      </ul>
    </nav>
    <!--Cuerpo de la pagina -->
    <article class="article">
    <form class="" action="actualizarreserva.php" method="post">
      <fieldset>
        <!--Formulario de actualizar datos. -->
      <legend>Actualizar datos</legend>
      Fecha: <input type="date" name="fecha" value="<?=$_GET["fecha"]?>"> <br><br>
      Hora: <input type="time" name="hora" value="<?=$_GET["hora"]?>"><br><br>
      Personas: <input type="number" name="personas" value="<?=$_GET["personas"]?>" min="1" max="100"><br><br>
      <input type="hidden" name="id" value="<?=$_GET["id"]?>">
      <input type="submit" name="Actualizar" value="Actualizar">
    </fieldset>
    </form>
    <?php
    //incluimos reserva.php y llamamo a la funcion que nos actualizara los datos.
    include '/modelo/reserva.php';
    $reserva=new Reserva();
    if (isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['personas'])) {
      $actualizarReserva=$reserva->ActualizarReserva($_POST['fecha'], $_POST['hora'], $_POST['personas'], $_POST["id"]);
      var_dump($actualizarReserva);
      if ($actualizarReserva==true) {
        header('Location: miPerfil.php');
      }
    }
     ?>
    </article>
    <!--Footer de la pagina, con enlaces a las redes sociales. -->
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
