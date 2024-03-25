<?php
include("../conexion.php");

$fecha = $_POST['fecha_entrevista'];
$hora = $_POST['hora_entrevista'];
$id_postulante = $_POST['id_hidden'];


//$fecha = date('Y-m-d', strtotime($fecha));
//$hora = date('H:i:s', strtotime($hora));


echo "Fecha formateada: " . $fecha . "<br>";
echo "Hora formateada: " . $hora . "<br>";
$consulta = "INSERT INTO Entrevista (Fecha, Hora, ID_Postulante) VALUES ('$fecha','$hora','$id_postulante') ";


$resultado =$con->query($consulta);



header("Location: listado_entrevista.php");



?>