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

      <a href="login.php">Iniciar sesion</a><a>&nbsp;&nbsp;</a>
      <a href="registro.php">Registro</a><a>&nbsp;&nbsp;</a>
      <a href="logout.php">Cerrar sesion</a><a>&nbsp;&nbsp;</a>

      </div>
    </header>
    <!--MENU-->
    <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="formularioPedidos.php">Pedido</a></li>
        <li><a href="mostrarCarta.php">Carta</a></li>
        <li><a href="formularioreservas.php">Reservas</a></li>
        <li><a href="contacto.html">Contacto</a></li>
      </ul>
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
      //incluimos el archivo de la bd y el de las sesiones
      include '\modelo\usuario.php';
      include '\seguridad\seguridad.php';
      $usuario=new Usuario();
      $sesion= new Seguridad();
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
     ?>
   </article>
   <!--footer de la pagina -->
   <footer>
     <div class="text">
     <p class="text-footer">Derechos reservados a FoodyFood©</p>
     <a href="https://www.facebook.com/FoodyFood-1205351362909040/" target="nueva"><img class="footer-icon" src="images/facebook.png" alt=""></a>
     <a href="https://www.instagram.com/foodyfood.florida/" target="nueva"><img class="footer-icon" src="images/insta.png" alt=""></a>
       <a href="https://www.twitter.com/foodyfood_flori" target="nueva"><img class="footer-icon" src="images/tuiter.png" alt=""></a>
     </div>
   </footer>

  </body>
</html>
