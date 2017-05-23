<?php

//Incluyo db para la conexion a la base de datos

require_once 'db.php';

//Creamos la clase que extiende de db

class Carta extends db
{

  function __construct()
  {
    parent::__construct();
  }

  function mostrarCarta(){
        //Construimos la consulta
        $sql="SELECT * from carta ";
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
  function mostrarCartatipo($tipo){
        //Construimos la consulta
        $sql="SELECT * from carta  WHERE tipo='".$tipo."'";
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
      function mostrarTipo(){
            //Construimos la consulta
            $sql="SELECT DISTINCT (tipo) from carta";
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
