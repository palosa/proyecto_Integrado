<?php
include 'seguridad/seguridad.php';
$sesion=new Seguridad();
  if (isset($_SESSION["usuario"])==false) {
    header('Location: login.php');
  }else {
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pedidos</title>
    <link rel="stylesheet" href="css/css.css">
  </head>
  <body>
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
    <article class="article">
      <form class="" action="formulario" method="post">
        Fecha: <input type="date" name="fecha" value="">
        <?php
          include '/modelo/carta.php';
          $carta= new Carta();

         ?>
      </form>
  </article>
  <footer>
    <div class="text">
    <p class="text-footer">Derechos reservados a FoodyFood©</p>
    <a href="https://www.facebook.com/FoodyFood-1205351362909040/"><img class="footer-icon" src="images/facebook.png" alt=""></a>
    </div>
  </footer>
  </body>
</html>
<?php } ?>
