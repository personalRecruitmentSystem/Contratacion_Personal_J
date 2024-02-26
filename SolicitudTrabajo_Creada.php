<?php
    // Incluir la conexión a la base de datos
    include("conexion.php");

    // Recuperar los datos del formulario
    $nombres = $_POST['Nombres'];
    $apellidos = $_POST['Apellidos'];
    $cargoPostular = $_POST['Cargo'];
    $foto = '';             // Pendiente de llenar
    
    //---------------------------------------------------------------------------
    // Recuperar la foto del formulario
    $nombreArchivo = $_FILES['foto']['name'];
    $nombreTempArchivo = $_FILES['foto']['tmp_name'];
    $rutaDestino = 'uploads/' . $nombreArchivo;

    // Mover la foto del directorio temporal al directorio de destino
    move_uploaded_file($nombreTempArchivo, $rutaDestino);

    // Guardar la ruta de la foto en la base de datos
    $foto = $rutaDestino;
    //---------------------------------------------------------------------------

    $nacionalidad = $_POST['Nacionalidad'];
    $ciPasaporte = $_POST['CI_Pasaporte'];
    $fechaNacimiento = $_POST['Fecha_Nacimiento'];
    $sexo = $_POST['Sexo'];
    $direccion = $_POST['Direccion'];
    $celularTelefono = $_POST['Celular_Telefono'];
    $idiomas = 'Ingles';
    $correo = $_POST['Correo'];
    $fotos = '';            // Pendiente de llenar
    //---------------------------------------------------------------------------
    // Recuperar la screenshot del formulario
    $screenshotData = $_POST['screenshot'];
    $screenshot = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $screenshotData));

    // Guardar la screenshot en la carpeta 'screenshots'
    $rutaScreenshot = 'screenshots/' . uniqid() . '.png'; // Nombre único para la screenshot
    file_put_contents($rutaScreenshot, $screenshot);

    // Guardar la ruta de la screenshot en la base de datos
    $pdfPostulacion = $rutaScreenshot;
    //---------------------------------------------------------------------------

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
