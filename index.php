<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pagina de inicio</title>
    <link rel="stylesheet" href="css/css.css">
  </head>
  <body>
<header>
  <div class="banner">
  <img class="imagenlogo"src="images/logo.PNG" alt="">
<div class="enlaceBanner">
  <ul>
  <?php
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
<!-- Dentro de la etiqueta nav tenemos una lista del menu con los enlaces -->
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
<div class="centrar">
  <article class="article">
    <table>
          <tr>
            <td><p>De la mano de nuestro chef Massamune os traemos la
                Comida más tradicional japonesa en Catarroja</p>
            </td>
          </tr>
      <tr>
        <td><img src="images/comida3.jpg" alt=""></td>
      </tr>
      <tr>
        <tr>
          <td><p>Tras años trabajando en el Izakaya familiar Massamune
              Quiere ofrecernos la experiencia de comer los ingredientes
              más frescos y de la mejor calidad. Para ello ha contado con el</p>
          </td>
        </tr>
        <td><img src="images/postre.jpg" alt=""></td>
      </tr>
      <tr>
        <td> <p>  mejor equipo posible, grande productos de nuestra tierra y
                  magníficos trabajadores .
                  Nuestra carta cuenta siempre con productos de temporada
                  Y pescado fresco del día, el cual es mimado y cocinado con amor
                  Para así sacarle el mejor sabor
              </p>
        </td>
      </tr>
      <tr>
        <td><img src="images/comida2.jpg" alt=""></td>
      </tr>
      <tr>
        <td><p>SI, como nuestro chef sientes pasión por la gastronomía japonesa
          o meramente deseas descubrirla de verdad, este es tu lugar.
          Este es tu restaurante, FoodyFood.
            </p>
      </td>
      </tr>
      <tr>
        <td><img src="images/comida1.jpg" alt=""></td>
      </tr>
    </table>
  </article>
</div>
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
