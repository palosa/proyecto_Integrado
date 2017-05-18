<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Carta</title>
    <link rel="stylesheet" href="css/css.css">
  </head>
  <body>
    <!--Header de la pagina con banner y logo y el menu. -->
    <header>
      <div class="banner">
      <img class="imagenlogo"src="images/logo.PNG" alt="">

      <a href="login.php">Iniciar sesion</a><a>&nbsp;&nbsp;</a>
      <a href="registro.php">Registro</a><a>&nbsp;&nbsp;</a>
      <a href="logout.php">Cerrar sesion</a><a>&nbsp;&nbsp;</a>

      </div>
    </header>
    <nav>
      <ul>
        <li><a href="index.php">Carta</a></li>
        <li><a href="news.asp">Reservas</a></li>
        <li><a href="contacto.html">Contacto</a></li>
      </ul>
    </nav>
    <?php include '/modelo/carta.php';
    $letter = new Carta();
      $carta = $letter->mostrarCarta();
      ?>

  <article class="article">
      <table>
        <tr>
          <th>Nombre</th>
          <th>Descripción</th>
        </tr>
        <?php foreach ($carta as  $fila):?>
        <tr>
          <td><?= $fila['nombre'] ?></td>
          <td><?= $fila['descripcion'] ?></td>
        </tr>
      <?php endforeach; ?>
      </table>
      </article>

      <footer>
        <div class="text">
        <p class="text-footer">Derechos reservados a FoodyFood©</p>
        <a href="https://www.facebook.com/FoodyFood-1205351362909040/"><img class="footer-icon" src="images/facebook.png" alt=""></a>
        </div>
      </footer>
  </body>
</html>
