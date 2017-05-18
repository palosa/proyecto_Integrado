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

      <a href="login.php">Iniciar sesion</a>
      <a href="registro.php">Registro&nbsp;&nbsp;&nbsp;&nbsp;</a>

      </div>
    </header>
    <nav>
      <ul>
        <li><a href="index.html">Carta</a></li>
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
          <th>Tipo</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Precio</th>
        </tr>
        <?php foreach ($carta as  $fila):?>
        <tr>
          <td><?= $fila['tipo'] ?></td>
          <td><?= $fila['nombre'] ?></td>
          <td><?= $fila['descripcion'] ?></td>
          <td><?= $fila['precio']."€" ?></td>
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
