<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login FoodyFood</title>
    <link rel="stylesheet" href="css/css.css">
  </head>
  <body>
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
    <!--MENU-->
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
    <!--Cuerpo de toda la paguina-->
    <article class="article">
      <!--Formulario de login-->
      <form class="registro" action="login.php" method="post">
        <fieldset>
          <legend>LOGIN</legend>
          Usuario:<input type="text" name="usuario" value=""><br><br>
          Contraseña:<input type="password" name="pass" value=""><br><br>
        </fieldset>
        <input type="submit" name="Iniciar sesion" value="Iniciar sesion">
      </form>
    <?php
    //login contra la base de datos
    if (isset($_POST['usuario']) && isset($_POST['pass'])) {
      if ($_POST['usuario']=='sudo') {
        header('Location: modelo/sistemas.php');
      }else {
        //incluimos el archivo de la bd y el de las sesiones
        include '\modelo\usuario.php';
        $usuario=new Usuario();
        //llamada a la funcion de login de la db
        $registrado=$usuario->LoginUsuario($_POST['usuario']);
        if ($registrado!=null) {
          //comprobación de la contraseña
          if ($registrado['pass']==sha1($_POST['pass'])) {
            //si el usuario es correcto, creamos la sesion.
            echo "Usuario logueado";
            $sesion->addUsuario($registrado['usuario']);
            setcookie("id_usuario", $registrado['id'], time()+86400);
            header('Location: index.php');
          }else {
            echo "Las contraseñas no coinciden";
          }
        }else {
          echo "Usuario no encontrado";
        }
      }
    }
     ?>
   </article>
   <!--footer de la pagina -->
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
