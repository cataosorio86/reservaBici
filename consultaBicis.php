<?php 
header('content-type: application/json; charset=utf-8');
//en caso de json en vez de jsonp habría que habilitar CORS:
header("access-control-allow-origin: *");
include ("conexion.php");

$sentencia= "select id, marca, color, capacidad, precio, estado from bicicleta";
$query = mysqli_query ($conexion,$sentencia);

$cantidadRegistros = mysqli_num_rows($query);

if($cantidadRegistros > 0){
$arr= array();
$cadena='<table class="table">

<thead>
      <tr>
        <th>Marca</th>
        <th>Color</th>
        <th>Capacidad</th>
		<th>Precio</th>
        <th>Estado</th>
        <th>Reservar</th>
      </tr>
    </thead>
    <tbody>';
while($row = mysqli_fetch_array($query)){
	?><?php
	$cadena = $cadena."<tr>";
	$cadena = $cadena."<td>".$row["marca"]."</td>";
	$cadena = $cadena."<td>".$row["color"]."</td>";
    $cadena = $cadena."<td>".$row["capacidad"]."</td>";
	$cadena = $cadena."<td>".$row["precio"]."</td>";
	$cadena = $cadena."<td>".$row["estado"]."</td>";
    $cadena = $cadena."<td><button class='order' id-bicicleta='".$row["id"]."'>Reservar</button></td>";
	$cadena = $cadena."</tr>";

}
$cadena=$cadena."</tbody></table>";
echo $cadena;


}else{
	echo "No hay registros";
}





mysqli_close($conexion);
 ?>