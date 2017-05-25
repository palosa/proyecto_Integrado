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

  //funcion para insertar el producto
  function insertarProducto($producto, $proveedor, $fecha){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO producto(id, producto, proveedor, fecha) VALUES (NULL, '".$producto."', '".$proveedor."', '".$fecha."')";
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
