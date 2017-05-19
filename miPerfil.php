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
   <?php
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
    <article class="article">
      <fieldset>
        <legend>Datos personales</legend>
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
      <fieldset>
        <legend>Reservas pendientes.</legend>
        <?php
          $reservaspendientes=$reserva->mostrarReserva(date("Y-m-d"), $_COOKIE['id_usuario']);
          foreach ($reservaspendientes as $reserva) {
            echo "Fecha: " .$reserva['fecha'] ."<br><br>";
            echo "Hora: " .$reserva['hora'] ."<br><br>";
            echo "Numero de personas: " .$reserva['personas'] ."<br><br>";
            echo "<a href='actualizarreserva.php?fecha=".$reserva['fecha']."&hora=".$reserva['fecha']."&personas=".$reserva['personas']."'>Cambiar reserva</a>";
            echo "<a>&nbsp;&nbsp;&nbsp;</a>";
            echo "<a href='eliminarreserva.php?id=".$reserva['id']."'>Eliminar reserva</a>";
          }
         ?>
      </fieldset>
    </article>

   </body>
 </html>
<?php
}
 ?>
