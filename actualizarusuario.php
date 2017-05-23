<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar usuario</title>
  </head>
  <body>
    <article class="article">
    <form class="" action="actualizarusuario.php" method="post">
      <fieldset>
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
  </body>
</html>
