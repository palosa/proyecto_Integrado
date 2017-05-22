<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar usuario</title>
  </head>
  <body>
    <article class="article">
    <form class="" action="actualizarreserva.php" method="post">
      <fieldset>
      <legend>Actualizar datos</legend>
      Fecha: <input type="date" name="fecha" value="<?=$_GET["fecha"]?>"> <br><br>
      Hora: <input type="time" name="hora" value="<?=$_GET["hora"]?>"><br><br>
      Personas: <input type="number" name="personas" value="<?=$_GET["personas"]?>" min="1" max="100"><br><br>
      <input type="submit" name="Actualizar" value="Actualizar">
    </fieldset>
    </form>
    <?php
    include '/modelo/reserva.php';
    $reserva=new Reserva();
    if (isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['personas'])) {
      $actualizarReserva=$reserva->ActualizarReserva($_POST['fecha'], $_POST['hora'], $_POST['personas']);
      var_dump($actualizarReserva);
      if ($actualizarReserva==true) {
        header('Location: miPerfil.php');
      }
    }
     ?>
    </article>
  </body>
</html>
