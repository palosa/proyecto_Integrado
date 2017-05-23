<?php

//Incluyo db para la conexion a la base de datos

require_once 'db.php';

//Creamos la clase que extiende de db

class Usuario extends db
{
  function __construct()
  {
    parent::__construct();
  }
  //funcion insertar equipo en la bd
  function insertarUsuario($nombre, $apellidos, $usuario, $telefono, $dni, $pass, $direccion){
    $sql="INSERT INTO users (id, nombre, apellidos, usuario, telefono, dni, pass, direccion)
          VALUES (NULL, '".$nombre."', '".$apellidos."', '".$usuario."', ".$telefono.", '".$dni."', '".sha1($pass)."', '".$direccion."')";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      //Recogemos el ultimo usuario insertado
      $sql="SELECT * from users ORDER BY id DESC";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
  function LoginUsuario($usuario){
    //Construimos la consulta
    $sql="SELECT * from users WHERE usuario='".$usuario."'";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
  function MiPerfil($usuario){
    //Construimos la consulta
    $sql="SELECT * from users WHERE usuario='".$usuario."'";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=null){
      //Montamos la tabla de resultados
      $tabla=[];
      while($fila=$resultado->fetch_assoc()){
        $tabla[]=$fila;
      }
      return $tabla;
    }else{
      return null;
    }
  }
  public function ActualizarMiPerfil($usuario, $nombre, $apellidos, $telefono, $dni, $direccion)
  {
    $sql="UPDATE users SET nombre='" .$nombre ."', apellidos='" .$apellidos ."', telefono=".$telefono.", dni='".$dni."', direccion='".$direccion."' WHERE usuario='" .$usuario ."'";
    $actualizarperfil=$this->realizarConsulta($sql);
    if ($actualizarperfil=!false) {
      return true;
    }else {
      return false;
    }
  }
  function Comprobarusuario($usuario){
    //Construimos la consulta
    $sql="SELECT usuario from users WHERE usuario='".$usuario."'";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=null){
      if ($resultado->num_rows>0) {
        return null;
      }else {
        return 1;
      }
    }else{
      return null;
    }
  }
}
 ?>
