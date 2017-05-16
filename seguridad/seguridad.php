<?php
/**
 * Clase seguridad.
 */
class Seguridad
{
  private $usuario=null;
  //en el construct hacemos el session start para no tener que hacerlo cada vez.
  function __construct()
  {
    session_start();
    if(isset($_SESSION["usuario"])) $this->usuario=$_SESSION["usuario"];
  }
  public function getUsuario(){
    return $this->usuario;
  }
  //addUsuario para gusrdar el usuario en la sesion.
  public function addUsuario($usuario){
    $_SESSION["usuario"]=$usuario;
    $this->usuario=$usuario;
  }
  //logout para destruir la sesion.
  public function logOut(){
    $_SESSION=[];
    session_destroy();
  }
}
 ?>
