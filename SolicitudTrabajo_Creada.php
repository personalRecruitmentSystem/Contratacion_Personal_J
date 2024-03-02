<?php
    // Incluir la conexión a la base de datos
    include("conexion.php");

    // Recuperar los datos del formulario
    $nombres = $_POST['Nombres'];
    $apellidos = $_POST['Apellidos'];
    $cargoPostular = $_POST['Cargo'];
    
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
    
    //---------------------------------------------------------------------------
    // Recuperar los niveles de los idiomas del formulario
    $nivelIngles = convertirNivel($_POST['nivel-ingles']);
    $nivelFrances = convertirNivel($_POST['nivel-frances']);

    // Función para convertir el nivel de idioma al formato deseado
    function convertirNivel($nivel) {
        switch ($nivel) {
            case 0:
                return 'Ninguno';
            case 1:
                return 'A1';
            case 2:
                return 'A2';
            case 3:
                return 'B1';
            case 4:
                return 'B2';
            case 5:
                return 'C1';
            case 6:
                return 'C2';
            default:
                return 'Ninguno';
        }
    }

    // Construir la cadena de idiomas en el formato requerido
    $idiomas = "Ingles_$nivelIngles - Frances_$nivelFrances";
    //---------------------------------------------------------------------------


    $correo = $_POST['Correo'];
    $fotos = '';            // Pendiente de llenar

    //---------------------------------------------------------------------------
    // Recuperar la screenshot del formulario
    $screenshotData = $_POST['screenshot'];
    $screenshot = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $screenshotData));

    // Recuperar los apellidos y nombres del postulante
    $apellidos = $_POST['Apellidos'];
    $nombres = $_POST['Nombres'];

    // Normalizar los apellidos y nombres para asegurar que no haya caracteres especiales en el nombre del archivo
    $apellidos = preg_replace('/[^A-Za-z0-9\-]/', '', $apellidos);
    $nombres = preg_replace('/[^A-Za-z0-9\-]/', '', $nombres);

    // Construir el nombre del archivo de la screenshot
    $nombreArchivoScreenshot = $apellidos . '_' . $nombres . '.png';

    // Guardar la screenshot en la carpeta 'screenshots'
    $rutaScreenshot = 'screenshots/' . $nombreArchivoScreenshot;
    file_put_contents($rutaScreenshot, $screenshot);

    // Guardar la ruta de la screenshot en la base de datos
    $pdfPostulacion = $rutaScreenshot;
    //---------------------------------------------------------------------------


    $estado = 'Por Revisar';           // Siempre es "Por Revisar"
    $fechaPostulacion = $_POST['Fecha_Postulacion'];

    // Query SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO postulante (Nombres, Apellidos, `Cargo a postular`, Foto, Nacionalidad, `CI o pasaporte`, `Fecha de nacimiento`, Sexo, Direccion, `Celular o telefono`, Idiomas, Correo, Fotos, `PDF de la postulación`, Estado, `Fecha de postulacion`) 
        VALUES ('$nombres', '$apellidos', '$cargoPostular', '$foto', '$nacionalidad', '$ciPasaporte', '$fechaNacimiento', '$sexo', '$direccion', '$celularTelefono', '$idiomas', '$correo', '$fotos', '$pdfPostulacion', '$estado', '$fechaPostulacion')";
    
    // Ejecutar la consulta SQL
    if ($con->query($sql) === TRUE) {
        echo 'Se han insertado los datos correctamente';
    } else {
        echo 'Error al insertar los datos: ' . $con->error;
    }

    // Cerrar la conexión a la base de datos
    $con->close();
?>
