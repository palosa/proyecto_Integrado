<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar usuario</title>
    <link rel="stylesheet" href="css/css.css">
  </head>
  <body>
    <!--Header de la pagina con el banner y el logo -->
    <header>
      <div class="banner">
      <img class="imagenlogo"src="images/logo.PNG" alt="">
    <div class="enlaceBanner">
      <ul>
      <?php
      //enlaces de cerrar/iniciar sesion. El de cerrar sesion solo sale si estas iniciado y al reves.
      include 'seguridad/seguridad.php';
      $sesion=new Seguridad();

        if (isset($_SESSION['usuario'])) {
          echo "<li><a href='logout.php'>Cerrar sesion</a>";
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
      <?php
      if (isset($_SESSION["usuario"])) {
        if ($_SESSION["usuario"]=='sudo') {
          echo "<ul>
            <li><a href='index.php'>Inicio</a></li>
            <li><a href='formularioPedidos.php'>Pedido</a></li>
            <li><a href='mostrarcarta.php'>Carta</a></li>
            <li><a href='formularioreservas.php'>Reservas</a></li>
            <li><a href='contacto.php'>Contacto</a></li>
            <li><a href='controlproductos.php'>Control productos</a></li>
          </ul>";
        }else {
          echo "<ul>
            <li><a href='index.php'>Inicio</a></li>
            <li><a href='formularioPedidos.php'>Pedido</a></li>
            <li><a href='mostrarcarta.php'>Carta</a></li>
            <li><a href='formularioreservas.php'>Reservas</a></li>
            <li><a href='contacto.php'>Contacto</a></li>
            <li><a href='miPerfil.php'>Mi perfil</a></li>
          </ul>";
        }
      }else {
        echo "<ul>
          <li><a href='index.php'>Inicio</a></li>
          <li><a href='formularioPedidos.php'>Pedido</a></li>
          <li><a href='mostrarcarta.php'>Carta</a></li>
          <li><a href='formularioreservas.php'>Reservas</a></li>
          <li><a href='contacto.php'>Contacto</a></li>
        </ul>";
      }

       ?>
    </nav>
    <!--Cuerpo de la pagina -->
    <article class="article">
    <form class="" action="actualizarusuario.php" method="post">
      <fieldset>
        <!--Formulario de actualizar los datos de tu usuario -->
      <legend>Actualizar datos</legend>
      Usuario: <input type="text" name="user" value="<?=$_GET["usuario"]?>" readonly> <br><br>
      Nombre: <input type="text" name="nombre" value="<?=$_GET["nombre"]?>"><br><br>
      Apellidos: <input type="text" name="apellidos" value="<?=$_GET["apellidos"]?>"><br><br>
      DNI: <input type="text" name="dni" value="<?=$_GET["dni"]?>"><br><br>
      Telefono: <input type="text" name="telefono" value="<?=$_GET["telefono"]?>"><br><br>
      Direccion: <input type="text" name="direccion" value="<?=$_GET["direccion"]?>"><br><br>
      <input type="submit" name="Actualizar" value="Actualizar">
    </fieldset>
    </form>
    <?php
    //incluimos usuario.php y llamamos a la funcion de actualizar los datos
    include '/modelo/usuario.php';
    $usuario=new Usuario();
    if (isset($_POST['user']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['dni']) && isset($_POST['telefono']) && isset($_POST['direccion'])) {
      $actualizarPerfil=$usuario->ActualizarMiPerfil($_POST['user'], $_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['dni'], $_POST['direccion']);
      var_dump($actualizarPerfil);
      if ($actualizarPerfil==true) {
        header('Location: miPerfil.php');
      }
    }
     ?>
    </article>
    <!--Footer de la pagina con enlaces a las redes sociales -->
    <footer>
      <div class="text">
      <p class="text-footer">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
      <a href="https://www.facebook.com/FoodyFood-1205351362909040/" target="nueva"><img class="footer-icon" src="images/facebook.png" alt=""></a>
      <a href="https://www.instagram.com/foodyfood.florida/" target="nueva"><img class="footer-icon" src="images/insta.png" alt=""></a>
      <a href="https://www.twitter.com/foodyfood_flori" target="nueva"><img class="footer-icon" src="images/tuiter.png" alt=""></a>
      </div>
    </footer>
  </body>
</html>
