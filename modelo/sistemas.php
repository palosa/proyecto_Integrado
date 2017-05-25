<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conexion por windows server</title>
  </head>
  <body>
    <?php
      $adServer="ldap://10.2.72.182";

      $ldap=ldap_connect($adServer);
      $username="sudo";
      $password="7sec121.K";

      $ldaprdn='Ana120' ."\\" .$username;

      ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
      ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

      $bind= @ldap_bind($ldap, $ldaprdn, $password);

      if ($bind) {
        include '../seguridad/seguridad.php';
        $sesion=new Seguridad();
        $sesion->addUsuario($username);
        setcookie("id_usuario", 0, time()+86400);
        header('Location: ../index.php');
      }else {
        echo "Usuario o contraseña incorrectos";
      }

     ?>
  </body>
</html>
