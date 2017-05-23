<?php 
header('content-type: application/json; charset=utf-8');
//en caso de json en vez de jsonp habría que habilitar CORS:
header("access-control-allow-origin: *");
include("conexion.php");
$marca=$_POST["marca"];
$color=$_POST["color"];
$capacidad=$_POST["capacidad"];
$precio=$_POST["precio"];
$estado=$_POST["estado"];
$cantidad=$_POST["cantidad"];

$sentencia = "insert into bicicleta (marca, color, capacidad, precio, estado, cantidad)
values ('".$marca."', '".$color."', '".$capacidad."', '".$precio."', '".$estado."', '".$cantidad."')";

$query = mysqli_query($conexion,$sentencia);

if ($query){
	echo "Se creo la reserva de la bicicleta   " .$marca; 

}else{
	echo "No fue posible reservar la bicicleta";
}

mysqli_close($conexion);
 ?>