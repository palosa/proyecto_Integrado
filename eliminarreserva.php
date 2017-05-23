<?php

include '/modelo/reserva.php';

$reserva=new Reserva();

$borrarreserva=$reserva->borrarReserva($_GET["id"]);
if($borrarreserva==true){
  header('Location: miPerfil.php');
}else{
  echo "Error al borrar";
}



 ?>
