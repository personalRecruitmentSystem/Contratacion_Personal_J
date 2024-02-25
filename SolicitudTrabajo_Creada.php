<?php
    // Incluir la conexión a la base de datos
    include("conexion.php");

    // Recuperar los datos del formulario
    $nombres = $_POST['Nombres'];
    $apellidos = $_POST['Apellidos'];
    $cargoPostular = $_POST['Cargo'];
    $foto = '';             // Pendiente de llenar
    $nacionalidad = $_POST['Nacionalidad'];
    $ciPasaporte = $_POST['CI_Pasaporte'];
    $fechaNacimiento = $_POST['Fecha_Nacimiento'];
    $sexo = $_POST['Sexo'];
    $direccion = $_POST['Direccion'];
    $celularTelefono = $_POST['Celular_Telefono'];
    $idiomas = 'Ingles';
    $correo = $_POST['Correo'];
    $fotos = '';            // Pendiente de llenar
    $pdfPostulacion = '';   // Pendiente de llenar
    $estado = 'Por Revisar';           // Siempre es "Por Revisar"

    // Query SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO postulante (Nombres, Apellidos, `Cargo a postular`, Foto, Nacionalidad, `CI o pasaporte`, `Fecha de nacimiento`, Sexo, Direccion, `Celular o telefono`, Idiomas, Correo, Fotos, `PDF de la postulación`, Estado) 
            VALUES ('$nombres', '$apellidos', '$cargoPostular', '$foto', '$nacionalidad', '$ciPasaporte', '$fechaNacimiento', '$sexo', '$direccion', '$celularTelefono', '$idiomas', '$correo', '$fotos', '$pdfPostulacion', '$estado')";

    // Ejecutar la consulta SQL
    if ($con->query($sql) === TRUE) {
        echo 'Se han insertado los datos correctamente';
    } else {
        echo 'Error al insertar los datos: ' . $con->error;
    }

    // Cerrar la conexión a la base de datos
    $con->close();
?>
