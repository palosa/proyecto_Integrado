<?php

//Incluyo db para la conexion a la base de datos

require_once 'db.php';

//Creamos la clase que extiende de db

class Pedido extends db
{

  function __construct()
  {
    parent::__construct();
  }


//funcion insertar pedido en la bd
function hacerPedido($usuario, $fecha){
  $sql="INSERT INTO pedido(id, id_user, fecha) VALUES (NULL, ".$usuario.", '".$fecha."')";
  //Realizamos la consulta
  $resultado=$this->realizarConsulta($sql);
  if($resultado!=false){
    //Recogemos el ultimo pedido insertado
    $sql="SELECT * from pedido ORDER BY id DESC";
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

//funcion para insertar el pedido con lo que quiere en la tabla pedido_carta
function hacerPedido_carta($pedido, $carta){
  //realizamos la consuta y la guardamos en $sql
  $sql="INSERT INTO carta_pedido(id_pedido, id_carta) VALUES (".$pedido.", ".$carta.")";
  //Realizamos la consulta
  $resultado=$this->realizarConsulta($sql);
  if($resultado!=false){
    return true;
  }else{
    return null;
  }
}

}


 ?>
