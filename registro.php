<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Club Catarroja</title>
    <link rel="stylesheet" href="./css/estilos.css">
  </head>
  <body>

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

    <?php
    if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['usuario']) && isset($_POST['telefono']) && isset($_POST['dni']) && isset($_POST['pass']) && isset($_POST['direccion'])) {
      include '\modelo\usuario.php';
      $usuarios=new Usuario();
      $resultado=$usuarios->insertarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['usuario'], $_POST['telefono'], $_POST['dni'], $_POST['pass'], $_POST['direccion']);
      if ($resultado==null) {
        echo "Error";
      }else {
        echo "Usuario registrado. <br><br>";
        echo "<form>Nombre: <input type='text' name='oferta' value=".$resultado['nombre']." readonly><br><br>";
        echo "Apellidos: <input type='text' name='oferta' value=".$resultado['apellidos']." readonly><br><br>";
        echo "Usuario: <input type='text' name='oferta' value=".$resultado['usuario']." readonly><br><br>";
        echo "Telefono: <input type='text' name='oferta' value=".$resultado['telefono']." readonly><br><br>";
        echo "Direccion: <input type='text' name='oferta' value=".$resultado['direccion']." readonly><br><br>";
        echo "DNI: <input type='text' name='oferta' value=".$resultado['dni']." readonly><br><br></form>";
        }
    }else {
     ?>
    <div class="contenido">
      <form class="" action="registro.php" method="post">
        Nombre: <input type="text" name="nombre" value=""> <br><br>
        Apellidos:<input type="text" name="apellidos" value=""> <br><br>
        Usuario: <input type="text" name="usuario" value=""> <br><br>
        Telefono:<input type="text" name="telefono" value=""> <br><br>
        DNI:<input type="text" name="dni" value=""><br><br>
        Direccion: <input type="text" name="direccion" value=""><br><br>
        Contraseña:<input type="password" name="pass" value=""> <br><br>
        Vuelve a escribir la contraseña:<input type="password" name="pass2" value=""> <br><br>
        <input type="submit" name="Registrarse" value="Registrarse">
      </form>
    </div>
    <?php } ?>
  </body>
</html>
