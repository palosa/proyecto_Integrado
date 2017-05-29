<?php
  include 'seguridad/seguridad.php';
  include 'modelo/reserva.php';

  $sesion=new Seguridad();
  $reserva= new Reserva();
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
    <title>Reservas pendientes</title>
    <link rel="stylesheet" href="css/css.css">
  </head>
  <body>
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
            <li><a href='formularioPedidos.php'>para llevar</a></li>
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
    <?php
      $resultado=$reserva->mostrarReservasSudo(date("Y-m-d"));
      foreach ($resultado as $fila) {
        echo "<h2>".$fila['fecha']."</h2>";
        echo "USUARIO: " .$fila['user'] ."<br><br>";
        echo "HORA: " .$fila['hora'] ."<br><br>";
        echo "PERSONAS: " .$fila['personas'] ."<br><br>";
        echo "<hr>";
      }
     ?>
   </article>
   <footer>
     <div class="text">
     <p class="text-footer">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
     <a href="https://www.facebook.com/FoodyFood-1205351362909040/"><img class="footer-icon" src="images/facebook.png" alt=""></a>
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
