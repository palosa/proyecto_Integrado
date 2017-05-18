<?php
include 'seguridad/seguridad.php';

$sesion=new Seguridad();

if (isset($_SESSION["usuario"])==false) {
  //si no esta iniciada lo enviamos a login para que la inicie
  header('Location: login.php');
}else {
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Mi Perfil</title>
     <link rel="stylesheet" href="css/css.css">
   </head>
   <body>
     <?php









      ?>
   </body>
 </html>
<?php
}
 ?>
