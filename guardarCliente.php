<?php 
header('content-type: application/json; charset=utf-8');
//en caso de json en vez de jsonp habrÃ­a que habilitar CORS:
header("access-control-allow-origin: *");
include("conexion.php");
$nombre=$_POST["nombre"];
$telefono=$_POST["telefono"];
$direccion=$_POST["direccion"];


$sentencia = "insert into usuario (nombre, telefono, direccion)
values ('".$nombre."', '".$telefono."', '".$direccion."')";

$query = mysqli_query($conexion,$sentencia);

if ($query){
	echo "Cliente creado correctamente: " .$nombre;

}else{
	echo "No fue posible crear el cliente";
}

mysqli_close($conexion);
 ?>