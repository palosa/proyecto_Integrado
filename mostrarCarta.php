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
        <div class="enlaceBanner">
          <ul>
      <?php
      include 'seguridad/seguridad.php';
      $sesion=new Seguridad();
        if (isset($_SESSION['usuario'])) {
          echo "<li><a href='logout.php'>Cerrar sesion</a></li>";
        }else {
          echo "<li><a href='login.php'>Iniciar sesion</a>
          <a href='registro.php'>Registro</a></li>";
        }
       ?>
     </ul>
     </div>
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

    $tipo = $letter->mostrarTipo();

    if (isset($_POST) && (!empty($_POST))){
      $carta = $letter->mostrarCartaTipo($_POST['tipo']);

      }
      ?>
      <form class="" action="mostrarCarta.php" method="post">
        <p>Selecionar tipo de comida</p>
        <select class="" name="tipo">

          <?php foreach ($tipo as  $value): ?>

          <option value="<?= $value['tipo']; ?>"><?= $value['tipo']; ?></option>
          <?php endforeach; ?>
          </select>
        <input type="submit" name="" value="Buscar">
      </form>
  <article class="article">
      <table>
        <?php if (isset($_POST) && (!empty($_POST))): ?>
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
    <?php endif; ?>
      </table>
      </article>

      <footer>
        <div class="text">
        <p class="text-footer">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
        <a href="https://www.facebook.com/FoodyFood-1205351362909040/"><img class="footer-icon" src="images/facebook.png" alt=""></a>
        <a href="https://www.instagram.com/foodyfood.florida/" target="nueva"><img class="footer-icon" src="images/insta.png" alt=""></a>
        <a href="https://www.twitter.com/foodyfood_flori" target="nueva"><img class="footer-icon" src="images/tuiter.png" alt=""></a>
        </div>
      </footer>
  </body>
</html>
