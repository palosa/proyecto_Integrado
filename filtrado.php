<?php
//incluimos y creamos todos los objetos necesarios
include 'seguridad/seguridad.php';
include '/modelo/filtro.php';

$sesion=new Seguridad();
$filtro= new Filtro();

//comprobamos si la sesion esta iniciada.
  if (isset($_SESSION["usuario"])==false) {
    //si no esta iniciada lo enviamos a login para que la inicie
    header('Location: login.php');
  }else {
    //si esta iniciada seguimos con la pagina
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pedidos</title>
    <link rel="stylesheet" href="css/css.css">
  </head>
  <body>
    <!--Header de la pagina con banner y logo y el menu. -->
    <header>
      <div class="banner">
      <img class="imagenlogo"src="images/logo.PNG" alt="">
      <div class="enlaceBanner">
        <ul>
      <?php
        if (isset($_SESSION['usuario'])) {
          echo "<li><a href='logout.php'>Cerrar sesion</a></li>";
        }else {
          echo "<li><a href='login.php'>Iniciar sesion</a>
          <a href='registro.php'>Registro</a></li>";
        }
       ?>
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
<footer>
  <div class="text">
  <p class="text-footer">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
  <a href="https://www.facebook.com/FoodyFood-1205351362909040/" target="nueva"><img class="footer-icon" src="images/facebook.png" alt=""></a>
  <a href="https://www.instagram.com/foodyfood.florida/" target="nueva"><img class="footer-icon" src="images/insta.png" alt=""></a>
    <a href="https://www.twitter.com/foodyfood_flori" target="nueva"><img class="footer-icon" src="images/tuiter.png" alt=""></a>
  </div>
</footer>
</body>
</html>
