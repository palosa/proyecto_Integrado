<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login FoodyFood</title>
    <link rel="stylesheet" href="">
  </head>
  <body>
    <!--MENU-->
    <div class="">
      <nav>
        <ul>
          <li><a href="">Carta</a></li>
          <li><a href="">Productos</a></li>
          <li><a href="">Reserva</a></li>
          <li><a href="">Log out</a></li>
        </ul>
      </nav>
    </div>


      <form class="" action="login.php" method="post">
        Usuario:<input type="text" name="usuario" value=""><br><br>
        Contraseña:<input type="password" name="pass" value=""><br><br>
        <input type="submit" name="login" value="login">
      </form>
    <?php
    if (isset($_POST['usuario']) && isset($_POST['pass'])) {
      include '\modelo\usuario.php';
      include '\seguridad\seguridad.php';
      $usuario=new Usuario();
      $sesion= new Seguridad();
      $registrado=$usuario->LoginUsuario($_POST['usuario']);
      if ($registrado!=null) {
        if ($registrado['pass']==sha1($_POST['pass'])) {
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
  </body>
</html>
