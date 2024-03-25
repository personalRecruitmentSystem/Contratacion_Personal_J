<?php
include("../conexion.php");

$consulta = "SELECT ID_Cargo, Nombre, Nro_Empleados_Debe_Tener - COALESCE(EMPLEADOS_OCUPANTES, 0) AS cargosvacantes
FROM(
SELECT cargo.ID_Cargo, cargo.Nombre, cargo.Nro_Empleados_Debe_Tener, COUNT(empleado.ID_Empleado) as EMPLEADOS_OCUPANTES
FROM empleado
RIGHT JOIN cargo 
ON cargo.ID_Cargo = empleado.ID_Cargo
GROUP BY cargo.ID_Cargo, cargo.Nombre, cargo.Nro_Empleados_Debe_Tener, cargo.Codigo_Cargo) As cargosOcuados;";
$resultado =$con->query($consulta);

?>