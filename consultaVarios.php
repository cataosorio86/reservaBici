<?php 
header('content-type: application/json; charset=utf-8');
//en caso de json en vez de jsonp habría que habilitar CORS:
header("access-control-allow-origin: *");
include ("conexion.php");

$marca=$_POST["marca"];
$color=$_POST["color"];
$capacidad=$_POST["capacidad"];
$precio=$_POST["precio"];

$sentencia= " select marca, color, capacidad, precio, estado from bicicleta 
 WHERE marca = '".$marca."'  or color = '".$color."' or capacidad = '".$capacidad."'  or precio = '".$precio."'                      ";
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
      
      </tr>
    </thead>
    <tbody>';
while($row = mysqli_fetch_array($query)){
	// array_push($arr, array("titulo"=>$row["titulo"], 
	// "tipo"=>$row["tipo"], 
	// "zona"=>$row["zona"], 
	// "oferta"=>$row["tipo_oferta"], 
	// "cliente"=>$row["id_cliente"]));
	$cadena = $cadena."<tr>";
	$cadena = $cadena."<td>".$row["marca"]."</td>";
	$cadena = $cadena."<td>".$row["color"]."</td>";
    $cadena = $cadena."<td>".$row["capacidad"]."</td>";
	$cadena = $cadena."<td>".$row["precio"]."</td>";
	$cadena = $cadena."</tr>";

}
$cadena=$cadena."</tbody></table>";
echo json_encode(array("resultados"=>$cadena));


}else{
	echo "No hay registros";
}


mysqli_close($conexion);
 ?>