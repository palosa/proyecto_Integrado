<?php
  //añadimos el archivo seguridad porque es donde esta todo sobre las sesiones
  include '/seguridad/seguridad.php';
  $sesion=new Seguridad();
  //llamamos a la funcion de logout para que destruya la sesion
  $sesion->logOut();
  header('Location: index.php');
 ?>
