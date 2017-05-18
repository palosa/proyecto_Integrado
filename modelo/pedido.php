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


//funcion insertar equipo en la bd
function hacerPedido($usuario, $fecha){
  $sql="INSERT INTO pedido(id, id_user, fecha) VALUES (NULL, ".$usuario.", '".$fecha."')";
  //Realizamos la consulta
  $resultado=$this->realizarConsulta($sql);
  if($resultado!=false){
    //Recogemos el ultimo usuario insertado
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

function hacerPedido_carta($pedido, $carta){
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
