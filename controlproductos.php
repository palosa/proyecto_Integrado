<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Menu</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <style>
* {
  box-sizing: border-box;
}
.myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}
#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}
#myTable tr {
  border-bottom: 1px solid #ddd;
}
#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
        <ul class="nav nav-pills">
          <li class="active"><a data-toggle="pill" href="#home">Pedido</a></li>
          <li><a data-toggle="pill" href="#menu1">Pedidos Realizados</a></li>
        </ul>
        <div class="tab-content">

          <div id="home" class="tab-pane fade in active">

            <form  action="controlproductos.php" method="post">
              <label for="">Producto</label><br>
              <input type="text" name="" value=""><br>

              <label for="">Proveedor</label><br>
              <input type="text" name="" value=""><br>

              <label for="">Fecha</label><br>
              <input type="text" name="" value="">

              <input type="submit" name="" value="Enviar">
            </form>
            <?php
            if (isset($_POST['producto']) && isset($_POST['proveedor']) && isset($_POST['fecha'])){
              include '\modelo\productos.php';
             $producto = new Productos();
              //llamada a la funcion de insertar usuario en la db
              $resultado=$producto->insertarproducto($_POST['producto'], $_POST['proveedor'], $_POST['fecha']);
            }
             ?>
          </div>

          <div id="menu1" class="tab-pane fade">
            <h2>Pedidos Realizados</h2>

              <input type="text" class="myInput" id="productoInput" onkeyup="filter()" placeholder="Busca por producto..." title="Type in a producto">
              <input type="text" class="myInput" id="proveedorInput" onkeyup="filter()" placeholder="Busca por proveedor..." title="Type in a proveedor">
              <input type="text" class="myInput" id="fechaInput" onkeyup="filter()" placeholder="Busca por fecha..." title="Type in a fecha">


              <table id="productos">
                <tr class="header">
                  <th style="width:33.33%;">Producto</th>
                  <th style="width:33.33%;">Proveedor</th>
                  <th style="width:33.33%;">Fecha</th>
                </tr>

                <?php

              include "modelo/productos.php";
               $producto = new Productos();
               $tabla=$producto->MostrarProductos();
               foreach ($tabla as $fila) {
               ?>
               <tr>
                 <td><?php echo $fila['producto']; ?></td>
                 <td><?php echo $fila['proveedor']; ?></td>
                 <td><?php echo $fila['fecha']; ?></td>
               </tr>
               <?php
             }
                ?>
              </table>
          </div>
        </div>

<script >
  //Creamos las variables
  var productoInput, proveedorInput, fechaInput, table, trs, tds, i;
  var data;
  var result;

  function getData(){
    table = document.querySelector("#producto");
    trs = table.querySelectorAll("tr");
    data = { rows: [] };
    for(i = 1; i < trs.length; i++) {
     tds = trs[i].querySelectorAll("td");
  data.rows.push({
         el: trs[i],
            producto: tds[0].innerHTML.trim(),
            proveedor: tds[1].innerHTML.trim(),
            fecha: tds[2].innerHTML.trim(),
        });
    }
  }
  function filter() {
    productoInput = document.querySelector("#productoInput");
    proveedorInput = document.querySelector("#proveedorInput");
    fechaInput = document.querySelector("#fechaInput");
    var containsproducto;
    var containsproveedor;
    var containsfecha;
    result = { matches: [] }
    for(i = 0; i < data.rows.length; i++) {
  containsproducto = data.rows[i]
        .producto.toLowerCase().includes(productoInput.value.toLowerCase());
        containsproveedor = data.rows[i]
        .proveedor.toLowerCase().includes(proveedorInput.value.toLowerCase());
        containsfecha = data.rows[i]
        .fecha.toLowerCase().includes(fechaInput.value.toLowerCase());
      if(containsproducto && containsproveedor && containsfecha) {
        data.rows[i].el.style.display = "";
        // Store result for ajax request
        result.matches.push( {
         producto: data.rows[i].producto,
            proveedor: data.rows[i].proveedor,
            fecha: data.rows[i].fecha,
        });
      }else {
       data.rows[i].el.style.display = "none";
      }
    }
   // Print result for debug purposes
    console.dir(result);
  }
  // Initialize data
  getData();
</script>
  </body>
</html>
