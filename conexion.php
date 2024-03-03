<?php 
$con =new mysqli("localhost", "root", "","cargo");
if ($con->connect_error){
    die ("conexion fallida".$con->connect_error);

}else {
    echo"conectado";
}

// echo "Funciona!... supongo<br>";
 ?>
