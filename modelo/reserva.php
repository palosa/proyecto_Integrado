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
      //Recogemos la ultima reserva insertada
      $sql="SELECT * from reserva ORDER BY id DESC";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        //sacamos el resultado con un fetch_assoc
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }

  function mostrarReserva(){
        //Construimos la consulta
        $sql="SELECT fecha, hora, personas from reserva";
        //Realizamos la consulta
        $resultado=$this->realizarConsulta($sql);
        if($resultado!=null){
          //Montamos la tabla de resultado
          $tabla=[];
          while($fila=$resultado->fetch_assoc()){
            $tabla[]=$fila;
          }
          return $tabla;
        }else{
          return null;
        }
      }

}





 ?>
