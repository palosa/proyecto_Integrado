<?php
include 'seguridad/seguridad.php';
include '/modelo/reserva.php';
include '/modelo/usuario.php';
$sesion=new Seguridad();
$usuario=new Usuario();
$reserva=new Reserva();

if (isset($_SESSION["usuario"])==false) {
  //si no esta iniciada lo enviamos a login para que la inicie
  header('Location: login.php');
}else {
 ?>
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
         <li><a href='formularioreservas.php'>Reservas</a></li>
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
      <div class="mi-perfil">
        <div class="datos-personales">
      <fieldset>
        <h2>Datos personales</h2>
        <?php
          $datospersonales=$usuario->MiPerfil($_SESSION['usuario']);
          foreach ($datospersonales as $datos) {
            echo "Nombre: " .$datos['nombre'] ."<br><br>";
            echo "Apellidos: ".$datos['apellidos'] ."<br><br>";
            echo "Usuario: ".$datos['usuario'] ."<br><br>";
            echo "Telefono: ".$datos['telefono'] ."<br><br>";
            echo "DNI: ".$datos['dni'] ."<br><br>";
            echo "Dirección: ".$datos['direccion'] ."<br><br>";
            echo "<a href='actualizarusuario.php?nombre=".$datos['nombre']."&apellidos=".$datos['apellidos']."&usuario=".$datos['usuario']."&telefono=".$datos['telefono']."&dni=".$datos['dni']."&direccion=".$datos['direccion']."'>Actualizar tus datos.</a>";
          }
         ?>
      </fieldset>
        </div>
        <div class="reservas-pendientes">
      <fieldset>
        <h2>Reservas pendientes</h2>
        <?php
          $reservaspendientes=$reserva->mostrarReserva(date("Y-m-d"), $_COOKIE['id_usuario']);
          foreach ($reservaspendientes as $reserva) {
            echo "<br>Fecha: " .$reserva['fecha'] ."<br><br>";
            echo "Hora: " .$reserva['hora'] ."<br><br>";
            echo "Numero de personas: " .$reserva['personas'] ."<br><br>";
            echo "<a href='actualizarreserva.php?fecha=".$reserva['fecha']."&hora=".$reserva["hora"]."&personas=".$reserva['personas']."&id=".$reserva['id']."'>Cambiar reserva</a>";
            echo "<a href='eliminarreserva.php?id=".$reserva['id']."'>Eliminar reserva</a><br><br>";
          }
         ?>
         <input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
      </fieldset>
      </div>
    </article>
  </div>
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
}
 ?>
