<?php

//Incluyo db para la conexion a la base de datos

require_once 'db.php';

//Creamos la clase que extiende de db

class Reserva extends db
{

  function __construct()
  {
    parent::__construct();
  }

  //funcion insertar reserva en la bd
  function hacerReserva($usuario, $fecha, $hora, $personas){
    $sql="INSERT INTO reserva(id, user, fecha, hora, personas) VALUES (NULL, ".$usuario.", '".$fecha."', '".$hora."', ".$personas.")";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      //Recogemos el ultimo pedido insertado
      $sql="SELECT * from reserva ORDER BY id DESC";
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

}





 ?>
