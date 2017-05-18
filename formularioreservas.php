<?php
  include '/seguridad/seguridad.php';
  include '/modelo/reserva.php';
  $sesion=new Seguridad();
  $reserva=new Reserva();
  if (isset($_SESSION["usuario"])==false) {
    header('Location: login.php');
  }else {
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulario de reservas</title>
    <link rel="stylesheet" href="/css/css.css">
  </head>
  <body>
    <form class="" action="formularioreservas.php" method="post">
      Fecha: <input type="date" name="fecha" value=""><br><br>
      Hora: <input type="time" name="hora" value=""><br><br>
      Numero de personas: <input type="number" name="personas" value="" min="1" max="100">
      <input type="submit" name="Reservar" value="Reservar">
    </form>
    <?php
      if (isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['personas'])) {
        $reservaregistrada=$reserva->hacerReserva($_COOKIE['id_usuario'], $_POST['fecha'], $_POST['hora'], $_POST['personas']);
        if ($reservaregistrada==null) {
          echo "Error al registrar la reserva.";
        }else {
          echo "Reserva registrada. <br><br>";
          echo "Usuario: " .$_SESSION['usuario'] ."<br><br>";
          echo "Fecha: " .$_POST['fecha'] ."<br><br>";
          echo "Hora: " .$_POST['hora'] ."<br><br>";
          echo "Numero de personas: " .$_POST['personas'] ."<br><br>";
        }
      }
     ?>
  </body>
</html>
<?php } ?>
