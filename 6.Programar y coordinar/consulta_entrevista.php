<?php
include("../conexion.php");

$consulta ="SELECT Entrevista.ID_Entrevista, 
       CONCAT(Postulante.Nombres, ' ', Postulante.Apellido_Paterno, ' ', Postulante.Apellido_Materno) AS Nombre_Completo, 
       Cargo.Nombre AS Cargo, 
       Detalle_Postulacion.Fecha_de_Postulacion, 
       Detalle_Postulacion.Estado,
       Postulante.ID_Postulante
FROM Entrevista 
INNER JOIN Detalle_Postulacion ON Entrevista.ID_Postulante = Detalle_Postulacion.ID_Postulante 
INNER JOIN Postulante ON Entrevista.ID_Postulante = Postulante.ID_Postulante 
INNER JOIN Cargo ON Detalle_Postulacion.ID_Cargo = Cargo.ID_Cargo";
$resultado =$con->query($consulta);

?>