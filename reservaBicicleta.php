<?php 
header('content-type: application/json; charset=utf-8');
//en caso de json en vez de jsonp habrÃ­a que habilitar CORS:
header("access-control-allow-origin: *");

include("conexion.php");

$id=$_POST["id_bicicleta"];


$sentencia = "update bicicleta SET estado ='reservado' where id = '".$id."'";

$query = mysqli_query($conexion,$sentencia);

if ($query){
	echo "<script type='text/javascript'>alert('Â¡Se creo la reserva Ãxitosamente!');</script>";

}else{
echo "<script type='text/javascript'>alert('No fue posible crear la reserva');</script>";
}

mysqli_close($conexion);
 ?>
