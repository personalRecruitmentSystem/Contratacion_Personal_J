<?php
include("../conexion.php");

$ID_Postulante = isset($_GET['enviar']) ? $_GET['enviar'] : null;
// INFORMACIÓN PERSONAL
// Unir las tablas postulante y detalle_postulacion de acuerdo al ID_Postulante

// Nombre                postulante.Apellido_Paterno + postulante.Apellido_Materno + postulante.Nombres
// Cargo                 detalle_postulacion.ID_Cargo               que está asociado al ID_Postulante
// Convocatoria          detalle_postulacion.Fecha_de_Postulacion   un poco complejo de transformar!!!
// Fecha_de_Postulacion  detalle_postulacion.Fecha_de_Postulacion
// Fecha_de_Nacimiento   postulante.Fecha_Nacimiento
// Celular o Telefono    postulante.Celular_Telefono
// Correo                postulante.Correo
// Sexo                  postulante.Sexo
// Direccion             postulante.Direccion
// Documento             postulante.Tipo_Documento + postulante.Nro_Documento

$sql = "SELECT CONCAT(postulante.Apellido_Paterno, ' ', postulante.Apellido_Materno, ' ', postulante.Nombres) AS Nombre,
               cargo.Nombre AS Cargo,
               detalle_postulacion.Fecha_de_Postulacion AS Fecha_de_Postulacion,
               postulante.Fecha_Nacimiento AS Fecha_de_Nacimiento,
               postulante.Celular_Telefono AS Celular_o_Telefono,
               postulante.Correo AS Correo,
               postulante.Sexo AS Sexo,
               postulante.Direccion AS Direccion,
               CONCAT(postulante.Tipo_Documento, ' ', postulante.Nro_Documento) AS Documento,
               CONCAT('../', postulante.Foto) AS Foto
        FROM detalle_postulacion
        JOIN postulante ON detalle_postulacion.ID_Postulante = postulante.ID_Postulante
        JOIN cargo ON detalle_postulacion.ID_Cargo = cargo.ID_Cargo
        JOIN convocatoria ON detalle_postulacion.ID_Cargo = convocatoria.ID_convocatoria
        WHERE detalle_postulacion.ID_Postulante = $ID_Postulante
        ORDER BY postulante.Apellido_Paterno";

$resultado = $con->query($sql);

// if ($resultado->num_rows > 0) {
//     while($fila = $resultado->fetch_assoc()) {
//         echo "Nombre: " . $fila["Nombre"]. "<br>";
//         echo "Cargo: " . $fila["Cargo"]. "<br>";
//         echo "Fecha de Postulación: " . $fila["Fecha_de_Postulacion"]. "<br>";
//         echo "Fecha de Nacimiento: " . $fila["Fecha_de_Nacimiento"]. "<br>";
//         echo "Celular o Teléfono: " . $fila["Celular_o_Telefono"]. "<br>";
//         echo "Correo: " . $fila["Correo"]. "<br>";
//         echo "Sexo: " . $fila["Sexo"]. "<br>";
//         echo "Dirección: " . $fila["Direccion"]. "<br>";
//         echo "Documento: " . $fila["Documento"]. "<br>";
//         echo "Foto: " . $fila["Foto"]. "<br>";
//     }
// } else {
//     echo "0 resultados";
// }
// $con->close();

$sql_experiencia = "SELECT Cargo, Descripcion, Fecha_Inicio, Fecha_FIn
FROM experiencia
WHERE ID_Postulante = $ID_Postulante";

$resultado_experiencia = $con->query($sql_experiencia);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experiencia</title>
    <link rel="stylesheet" href="experiencia_Estilos.css">
</head>
<body>
    <div class="todo">
        <div class="titulo">
            <div class="titulo__Titulo">Experiencia</div>
            <div class="titulo__Volver"  onclick="window.location.href='../6.Programar y coordinar/listado_entrevista.php'">< Volver</div>
        </div>
        <div class="cambio1">Informacion Personal</div>
        <?php
            if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            ?>
            <div class="datos">
                <div class="datos__Informacion">
                    <div class="datos__Informacion__Fila">
                        <div class="datos__Informacion__Fila__Base">Nombre: <?php echo $fila["Nombre"]; ?></div>
                        <div class="datos__Informacion__Fila__Base">Cargo: <?php echo $fila["Cargo"]; ?></div>
                        <!-- <div class="datos__Informacion__Fila__Base">Convocatoria: por cambiar</div> -->
                        <div class="datos__Informacion__Fila__Base">Fecha de Postulación: <?php echo $fila["Fecha_de_Postulacion"]; ?></div>
                    </div>
                    <div class="datos__Informacion__Fila">
                        <div class="datos__Informacion__Fila__Base">Fecha de Nacimiento: <?php echo $fila["Fecha_de_Nacimiento"]; ?></div>
                        <div class="datos__Informacion__Fila__Base">Celular o Telefono: <?php echo $fila["Celular_o_Telefono"]; ?></div>
                        <div class="datos__Informacion__Fila__Base">Correo: <?php echo $fila["Correo"]; ?></div>
                    </div>
                    <div class="datos__Informacion__Fila">
                        <div class="datos__Informacion__Fila__Base">Sexo: <?php echo $fila["Sexo"]; ?></div>
                        <div class="datos__Informacion__Fila__Base">Dirección: <?php echo $fila["Direccion"]; ?></div>
                        <div class="datos__Informacion__Fila__Base">Documento: <?php echo $fila["Documento"]; ?></div>
                    </div>
                </div>
                <div class="datos__Foto">
                    <?php if (!empty($fila['Foto'])): ?>
                        <img src="<?php echo $fila['Foto']; ?>" alt="">
                    <?php else: ?>
                        <p>No hay foto disponible</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        } else {
            echo "0 resultados";
        }
        // $con->close();
        ?>
        <div class="cambio1">Experiencia</div>
        <div class="experiencia">
            <div class="experiencia__Titulo">
                <div class="experiencia__Titulo__Base cambio3">Cargo</div>
                <div class="experiencia__Titulo__Base">Descripción</div>
                <div class="experiencia__Titulo__Base cambio2">Fecha de Inicio</div>
                <div class="experiencia__Titulo__Base cambio2">Fecha de Fin</div>
            </div>
            <?php 
                if ($resultado_experiencia->num_rows > 0) {
                    while ($fila_experiencia = $resultado_experiencia->fetch_assoc()) {
                        echo '<div class="experiencia__Informacion">';
                        echo '<div class="experiencia__Informacion__Base cambio3">' . $fila_experiencia["Cargo"] . '</div>';
                        echo '<div class="experiencia__Informacion__Base">' . $fila_experiencia["Descripcion"] . '</div>';
                        echo '<div class="experiencia__Informacion__Base cambio2">' . $fila_experiencia["Fecha_Inicio"] . '</div>';
                        echo '<div class="experiencia__Informacion__Base cambio2">' . $fila_experiencia["Fecha_FIn"] . '</div>';
                        echo '</div>';
                    }
                }
            ?>
            <!-- <div class="experiencia__Informacion">
                <div class="experiencia__Informacion__Base cambio3">Gerente</div>
                <div class="experiencia__Informacion__Base">Lorem ipsum dolor sitdolor sitdolor sit amet consectetur adipisicing elit. Ipsam ad praesentium rerum quisquam magni neque optio sit eligendi dolor beatae sint, dolore ratione expedita! Nemo alias doloremque architecto distinctio repellat.</div>
                <div class="experiencia__Informacion__Base cambio2">15-03-22</div>
                <div class="experiencia__Informacion__Base cambio2">20-04-22</div>
            </div>
            <div class="experiencia__Informacion">
                <div class="experiencia__Informacion__Base cambio3">Gerente</div>
                <div class="experiencia__Informacion__Base">Lorem ip ad praesentium rerum quisquam magni neque optio sit eligendi dolor beatae sint, dolore ratione expedita! Nemo alias doloremque architecto distinctio repellat.</div>
                <div class="experiencia__Informacion__Base cambio2">15-03-22</div>
                <div class="experiencia__Informacion__Base cambio2">20-04-22</div>
            </div>
            <div class="experiencia__Informacion">
                <div class="experiencia__Informacion__Base cambio3">Gerente</div>
                <div class="experiencia__Informacion__Base">Lorem ip ad sit eligendi dolor beatae sint, dolore ratione expedita! Nemo alias doloremque architecto distinctio repellat.</div>
                <div class="experiencia__Informacion__Base cambio2">15-03-22</div>
                <div class="experiencia__Informacion__Base cambio2">20-04-22</div>
            </div>
            <div class="experiencia__Informacion">
                <div class="experiencia__Informacion__Base cambio3">Gerente</div>
                <div class="experiencia__Informacion__Base">Lorem ip adexpedita! Nemo alias doloremque ardistinctio repellat.</div>
                <div class="experiencia__Informacion__Base cambio2">15-03-22</div>
                <div class="experiencia__Informacion__Base cambio2">20-04-22</div>
            </div> -->
        </div>
    </div>

</body>
</html>