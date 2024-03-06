<?php
    // Incluir la conexión a la base de datos
    include("../conexion.php");
    // //ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo
    // // en tabla diferente
    // $cargoPostular = $_POST['Cargo'];

    // // este tambien ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo
    // // Recuperar la screenshot del formulario
    // $screenshotData = $_POST['screenshot'];
    // $screenshot = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $screenshotData));

    // // Construir el nombre del archivo de la screenshot
    // $nombreArchivoScreenshot = $apellidos . '_' . $nombres . '.png';

    // // Guardar la screenshot en la carpeta 'screenshots'
    // $rutaScreenshot = 'screenshots/' . $nombreArchivoScreenshot;
    // file_put_contents($rutaScreenshot, $screenshot);

    // // Guardar la ruta de la screenshot en la base de datos
    // $pdfPostulacion = $rutaScreenshot;

    // // este tambien ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo
    // $estado = 'Por Revisar';           // Siempre es "Por Revisar"
    // $fechaPostulacion = $_POST['Fecha_Postulacion'];
    // //ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo
    // //ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo
    // //ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo
    // //ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo

    // Recuperar los datos del formulario
    $nombres = $_POST['Nombres'];
    $apellido_paterno = $_POST['Apellido_Paterno'];
    $apellido_materno = $_POST['Apellido_Materno'];
    $tipo_documento = $_POST['tipo_documento'];
    $nro_documento = $_POST['CI_Pasaporte'];
    $fechaNacimiento = $_POST['Fecha_Nacimiento'];
    $sexo = $_POST['Sexo'];
    $direccion = $_POST['Direccion'];
    $celularTelefono = $_POST['Celular_Telefono'];
    $correo = $_POST['Correo'];

    // Recuperar la foto del formulario
    $nombreArchivo = $_FILES['foto']['name'];
    $nombreTempArchivo = $_FILES['foto']['tmp_name'];
    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

    // Cambiar el nombre de la foto
    $nombreFoto = $apellido_paterno . '_' . $apellido_materno . '_' . $nombres . '.' . $extension;
    $rutaDestino = '../uploads/' . $nombreFoto;

    // Mover la foto del directorio temporal al directorio de destino
    move_uploaded_file($nombreTempArchivo, $rutaDestino);

    // Guardar la ruta de la foto en la base de datos
    $foto = $rutaDestino;

    // Query SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO postulante (Nombres, Apellido_Paterno, Apellido_Materno, Foto, Tipo_Documento, Nro_Documento, Fecha_Nacimiento, Sexo, Direccion, Celular_Telefono, Correo) 
            VALUES ('$nombres', '$apellido_paterno', '$apellido_materno', '$foto', '$tipo_documento', '$nro_documento', '$fechaNacimiento', '$sexo', '$direccion', '$celularTelefono', '$correo')";

    // Ejecutar la consulta SQL
    if ($con->query($sql) === TRUE) {
        // Obtener el ID recién insertado
        $id_postulante = $con->insert_id;

        // Recuperar los datos de las filas dinámicas
        $nivelesEducacion = $_POST['nivelEducacion'];
        $instituciones = $_POST['institucion'];
        $añosInicio = $_POST['anio_inicio1'];
        $añosFin = $_POST['anio_fin1'];

        // Procesar los datos de las filas dinámicas (por ejemplo, agregarlos a la base de datos)
        for ($i = 0; $i < count($nivelesEducacion); $i++) {
            // Aquí puedes insertar cada fila en la base de datos
            $nivelEducacion = $nivelesEducacion[$i];
            $institucion = $instituciones[$i];
            $añoInicio = $añosInicio[$i];
            $añoFin = $añosFin[$i];

            // Ejecutar la consulta SQL para insertar los datos en la tabla 'formacion'
            $sql_formacion = "INSERT INTO formacion (Nivel_Educacion, Institucion, Anio_Inicio, Anio_Fin, ID_Postulante) 
                    VALUES ('$nivelEducacion', '$institucion', '$añoInicio', '$añoFin', '$id_postulante')"; // Asegúrate de tener el ID del postulante aquí

            // Ejecutar la consulta SQL para insertar los datos de formación
            if ($con->query($sql_formacion) !== TRUE) {
                // Manejar errores si es necesario
                echo 'Error al insertar los datos en la tabla formacion: ' . $con->error;
            }
        }

        // Recuperar los datos de experiencia del formulario
        $cargos = $_POST['cargo1'];
        $descripciones = $_POST['descripcion1'];
        $fechasInicio = $_POST['fechaInicio1'];
        $fechasFin = $_POST['fechaFin1'];

        // Procesar los datos de experiencia (por ejemplo, agregarlos a la base de datos)
        for ($i = 0; $i < count($cargos); $i++) {
            // Aquí puedes insertar cada fila de experiencia en la base de datos
            $cargo = $cargos[$i];
            $descripcion = $descripciones[$i];
            $fechaInicio = $fechasInicio[$i];
            $fechaFin = $fechasFin[$i];

            // Ejecutar la consulta SQL para insertar los datos en la tabla de experiencia
            $sql_experiencia = "INSERT INTO experiencia (Cargo, Descripcion, Fecha_Inicio, Fecha_Fin, ID_Postulante) 
                    VALUES ('$cargo', '$descripcion', '$fechaInicio', '$fechaFin', '$id_postulante')";

            // Ejecutar la consulta SQL para insertar los datos de experiencia
            if ($con->query($sql_experiencia) !== TRUE) {
                // Manejar errores si es necesario
                echo 'Error al insertar los datos en la tabla experiencia: ' . $con->error;
            }
        }
        // Mostrar mensaje de éxito después de procesar todas las filas de experiencia
        echo 'Se han insertado los datos de experiencia correctamente';

        // Mostrar mensaje de éxito después de procesar todas las filas dinámicas
        echo 'Se han insertado los datos correctamente';
    } else {
        // Mostrar mensaje de error si no se pueden insertar los datos del postulante
        echo 'Error al insertar los datos en la tabla postulante: ' . $con->error;
    }
    // Cerrar la conexión a la base de datos
    $con->close();

    // // Ejecutar la consulta SQL
    // if ($con->query($sql) === TRUE) {
    //     echo 'Se han insertado los datos correctamente';
    // } else {
    //     echo 'Error al insertar los datos: ' . $con->error;
    // }

    // // Cerrar la conexión a la base de datos
    // $con->close();
?>
