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

      <a href="login.php">Iniciar sesion</a>
      <a href="registro.php">Registro&nbsp;&nbsp;&nbsp;&nbsp;</a>

      </div>
    </header>
    <!--MENU-->
    <nav>
      <ul>
        <li><a href="formulariopedidos.php">Pedido</a></li>
        <li><a href="">Reservas</a></li>
        <li><a href="contacto.html">Contacto</a></li>
      </ul>
    </nav>
    <!--Cuerpo de toda la paguina-->
    <article class="article">
      <!--Formulario de login-->
      <form class="" action="login.php" method="post">
        <fieldset>
          <legend>LOGIN</legend>
          Usuario:<input type="text" name="usuario" value=""><br><br>
          Contraseña:<input type="password" name="pass" value=""><br><br>
        </fieldset>
        <input type="submit" name="login" value="login">
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
          //header('Location: index.php');
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
     <p>Derechos reservados a FoodyFood©</p>
     </div>
   </footer>
  </body>
</html>
