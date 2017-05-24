<?php
include 'db.php';
/**
 * Clase productos
 */
class Productos extends db
{

  function __construct()
  {
    parent::__construct();
  }

  function MostrarProductos(){
    //Construimos la consulta
    $sql="SELECT * from producto ";
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
}

 ?>
