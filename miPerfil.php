<?php
include 'seguridad/seguridad.php';
include '/modelo/reserva.php';
include '/modelo/usuario.php';
$sesion=new Seguridad();
$usario=new Usuario();
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
         <table border="1">
           <tr>
             <th>Fecha</th>
             <th>Hora</th>
             <th>Nº personas</th>
           </tr>
           <?php foreach ($reserva as  $fila):?>
           <tr>
             <td><?= $fila['fecha'] ?></td>
             <td><?= $fila['hora'] ?></td>
             <td><?= $fila['personas'] ?></td>
           </tr>
         <?php endforeach; ?>
         </table>
         </article>

   </body>
 </html>
<?php
}
 ?>
