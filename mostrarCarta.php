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

      <?php
      include 'seguridad/seguridad.php';
      $sesion=new Seguridad();
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
