<head>
  <meta charset="utf-8">
  <title>Pagina de inicio</title>
  <link rel="stylesheet" href="css/css.css">
</head>
<body>
<header>
<div class="banner">
</a><img class="imagenlogo"src="images/logo.PNG" alt="">

<?php
include 'seguridad/seguridad.php';
$sesion=new Seguridad();
  if (isset($_SESSION['usuario'])) {
    echo "<a href='logout.php'>Cerrar sesion</a><a>&nbsp;&nbsp;</a>";
  }else {
    echo "<a href='login.php'>Iniciar sesion</a><a>&nbsp;&nbsp;</a>
    <a href='registro.php'>Registro</a><a>&nbsp;&nbsp;</a>";
  }
 ?>

</div>
</header>
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

<div class="nosotros">



<strong>Sobre nosotros</strong><br>

<p>Somos un restaurante Japonés tradicional.<br>
Todos nuesros platos son Japoneses originales.<br>
Nos encanta la cultura japonesa y lo hacemos por vocación.<br>
<br><br>
<strong>COMO LLEGAR:</strong><p>

<br><div class="encuentranos">


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3082.99964968449!2d-0.4154526848698376!3d39.401513979496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604e82a8672a35%3A0xed578f5f80fed685!2sFlorida+Universitaria!5e0!3m2!1ses!2ses!4v1495094353089" width="375px" height="250px" frameborder="0" style="border:0" allowfullscreen></iframe>
  <img class="foto-comida" src="images/barbaro.png" alt="">
</div>
</div>
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