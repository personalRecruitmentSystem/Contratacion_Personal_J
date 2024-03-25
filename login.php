<?php
include('conexion.php');

$nombre=$_POST['usuario'];
$constraseña=$_POST['contraseña'];

$query="SELECT * FROM Usuarios WHERE nombre='$nombre' AND contraseña='$constraseña'";
$resultado=$con->query($query);

if($resultado->num_rows>0){
    echo "Bienvenido";
 header("Location: 2. Listas/pantalla_principal.php");
}else{
    ?>
    <script>
        alert("Datos incorrectos");
        window.location="PáginaPrincipal.php";
    </script>
    <?php

 
}
;
