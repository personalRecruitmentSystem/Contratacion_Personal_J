<?php
$conv = isset($_GET['conv']) ? intval($_GET['conv']) : 0;

$convocatoriaTexto = '';
switch ($conv) {
    case 1:
        $convocatoriaTexto = 'CONVOCATORIA 04-2023';
        break;
    case 2:
        $convocatoriaTexto = 'CONVOCATORIA 07-2023';
        break;
    case 3:
        $convocatoriaTexto = 'CONVOCATORIA 11-2023';
        break;
    case 4:
        $convocatoriaTexto = 'CONVOCATORIA 03-2024';
        break;
    default:
        $convocatoriaTexto = 'Convocatoria Desconocida';
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Trabajo</title>
    <link rel="stylesheet" href="SolicitudTrabajo_Estilos.css">
</head>
<body>
    <form id="solicitudForm" method="post" class="todo">
        <div class="mitadIzq">
            <div class="mitadIzq__Foto">
                <div class="mitadIzq__Foto__Titulo">Foto</div>
                <input type="file" name="foto" accept="image/*" id="inputFoto" class="mitadIzq__Foto__Archivo">
                <img id="imagenUsuario" src="#" alt="Imagen de usuario" class="mitadIzq__Foto__Imagen">
            </div>
        </div>
        <div class="mitadDer">
            <div class="mitadDer__Solicitud">
                <div class="mitadDer__Solicitud__Titulo">
                    <!-- -------------------------------------------------------------------------------------------------------------- -->
                    <div class="mitadDer__Solicitud__Titulo__Texto"><?php echo $convocatoriaTexto; ?> | SOLICITUD DE EMPLEO</div>
                    
                    <!-- -------------------------------------------------------------------------------------------------------------- -->
                    <div class="mitadDer__Solicitud__Titulo__Volver" onclick="window.location.href='../PáginaPrincipal.php'">< Volver</div>
                </div>
                <div class="mitadDer__Solicitud__Info">
                    <div class="mitadDer__Solicitud__Info__Fecha">
                        Fecha de Postulación <br>
                        <input type="date" name="Fecha_Postulacion" id="fecha_actual" readonly>
                    </div>
                    <div class="mitadDer__Solicitud__Info__Puesto">
                        Cargo Solicitado <br>
                        <input type="text" name="Cargo" id="" value="<?php
                            if(isset($_GET['puesto'])) {
                                $puesto = $_GET['puesto'];
                                switch($puesto) {
                                    case 1:
                                        $cargo = "Desarrollo";
                                        break;
                                    case 2:
                                        $cargo = "Gerente";
                                        break;
                                    case 3:
                                        $cargo = "Administrativo";
                                        break;
                                    case 4:
                                        $cargo = "Analista";
                                        break;
                                    case 5:
                                        $cargo = "Sistemas";
                                        break;
                                    default:
                                        $cargo = "Cargo no especificado";
                                }
                            } else {
                                $cargo = "Cargo no especificado";
                            }
                            echo $cargo;
                        ?>" readonly>   
                    </div>
                </div>
            </div>
            <div class="mitadDer__Datos">
                <div class="mitadDer__Datos__Titulo1">Datos Personales</div>
                <div class="mitadDer__Datos__Fila1">
                    <!-- -------------------------------------------------------------------------------------------------------------- -->
                    <!-- <div class="base_formulario">Apellidos <input type="text" name="Apellidos" id=""></div> -->
                    <div class="base_formulario">Apellido Paterno <input type="text" name="Apellido_Paterno" id=""></div>
                    <div class="base_formulario">Apellido Materno <input type="text" name="Apellido_Materno" id=""></div>
                    <!-- -------------------------------------------------------------------------------------------------------------- -->
                    <div class="base_formulario">Nombres <input type="text" name="Nombres" id=""></div>
                    <div class="base_formulario cambio1">Fecha de Nacimiento <input type="date" name="Fecha_Nacimiento" id=""></div>
                </div>
                <div class="mitadDer__Datos__Fila2">
                    <!-- -------------------------------------------------------------------------------------------------------------- -->
                    <!-- <div class="base_formulario cambio2">Nacionalidad <input type="text" name="Nacionalidad" id=""></div> -->
                    <!-- -------------------------------------------------------------------------------------------------------------- -->
                    <div class="base_formulario cambio2">Sexo <input type="text" name="Sexo" id=""></div>
                    <div class="base_formulario">Celular o Teléfono <input type="number" name="Celular_Telefono" id=""></div>
                    <div class="base_formulario cambio1">Correo <input type="text" name="Correo" id=""></div>
                    <div class="base_formulario">Dirección <input type="text" name="Direccion" id=""></div>
                </div>
                <div class="mitadDer__Datos__Fila3">
                    <!-- -------------------------------------------------------------------------------------------------------------- -->
                    <!-- <div class="base_formulario">Nº de Carnet o Pasaporte <input type="number" name="CI_Pasaporte" id=""></div> -->
                    <div class="base_formulario cambio7">
                    <div>Tipo de Documento: </div>
                    <div><input type="radio" name="tipo_documento" class="radio1" value="CI"> CI</div> 
                    <div><input type="radio" name="tipo_documento" class="radio1" value="Pasaporte"> Pasaporte</div>
                    </div>
                    <div class="base_formulario">Nº de Documento <input type="number" name="CI_Pasaporte" id=""></div>
                </div>
            </div>
            <div class="mitadDer__Resumen">
                <div class="mitadDer__Resumen__Titulo">Formación</div>
                <div class="mitaDer__Resumen__Info">
                    <div class="cambio8">
                        <div class="mostraVentanaEmergente" id="btnAgregarFormacion" onclick="mostrarVentanaEmergente()">Agregar Formación</div>
                        <div class="mostraVentanaEmergente" id="btnLimpiarFormacion" onclick="limpiarVentanaEmergente()">Limpiar</div>
                    </div>
                    <!-- <button>Limpiar</button> -->
                    <div class="mitaDer__Resumen__Info__ListaDinamica" id="listaDinamica">
                        <div class="mitaDer__Resumen__Info__ListaDinamica__Titulo">
                            <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__Nivel Titulo1">Nivel de Formación</div>
                            <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__Institucion Titulo1">Instituto</div>
                            <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__anioInicio Titulo1">Año de Inicio</div>
                            <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__anioFin Titulo1">Año de Fin</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Div para la ventana emergente .................º......º.........º..............º..............-->
            <div class="mitadDer__Experiencia">
                <div class="mitadDer__Experiencia__Titulo">Experiencia</div>
                <div class="mitadDer__Experiencia__Info">
                    <div class="cambio8">
                        <div class="mostraVentanaEmergente" id="btnAgregarExperiencia" onclick="mostrarVentanaEmergenteExperiencia()">Agregar Formación</div>
                        <div class="mostraVentanaEmergente" id="btnLimpiarExperiencia" onclick="limpiarVentanaEmergenteExperiencia()">Limpiar</div>
                    </div>
                    <div class="mitadDer__Experiencia__Info__ListaDinamica" id="listaDinamicaExperiencia">
                        <div class="mitadDer__Experiencia__Info__ListaDinamica__Titulo">
                            <div class="mitadDer__Experiencia__Info__ListaDinamica__Elemento__Base Titulo1">Cargo</div>
                            <div class="mitadDer__Experiencia__Info__ListaDinamica__Elemento__Base Titulo1">Descripción</div>
                            <div class="mitadDer__Experiencia__Info__ListaDinamica__Elemento__Base Titulo1 cambio9">Fecha Inicio</div>
                            <div class="mitadDer__Experiencia__Info__ListaDinamica__Elemento__Base Titulo1 cambio9">Fecha Fin</div>
                        </div>
                        <!-- <div class="mitaDer__Experiencia__Info__ListaDinamica__Elemento">
                            <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__Base">Cargo</div>
                            <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__Base">Descripción</div>
                            <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__Base cambio9">Fecha Inicio</div>
                            <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__Base cambio9">Fecha Fin</div>
                        </div> -->
                    </div>
                </div>
            </div>
            <input type="submit" value="Enviar" class="mitadDer__Enviar">
        </div>
        <!-- --------------------------------------------------------------------------------------------------------------------------- -->
        <div id="ventanaEmergente">
            <div class="mitadDer__Datos__Fila3">    
                <div class="base_formulario">Nivel de Educación <input type="text" name="" id="nivelEducacion"></div>
                <div class="base_formulario">Institución <input type="text" name="" id="institucion"></div>
                <div class="base_formulario cambio2">Año de Inicio<input type="number" id="añoInicio" min="1900" max="9999" step="1" placeholder="Año"></div>
                <div class="base_formulario cambio2">Año de Fin<input type="number" id="añoFin" min="1900" max="9999" step="1" placeholder="Año"></div>
            </div>
            <div class="ventanaEmergente__Botones">
                <div class="ventanaEmergente__Botones__Agregar" onclick="" id="btnAgregar">Agregar</div>
                <div class="ventanaEmergente__Botones__Cerrar" onclick="cerrarVentanaEmergente()">Cerrar</div>
            </div>
        </div>

        <!-- --------------------------------------------------------------------------------------------------------------------------- -->
        <div id="ventanaEmergenteExperiencia">
            <div class="mitadDer__Datos__Fila3">    
                <div class="base_formulario">Cargo <input type="text" name="" id="cargo"></div>
                <div class="base_formulario">Descripción <input type="text" name="" id="descripcion"></div>
                <div class="base_formulario cambio2">Fecha de Inicio <input type="date" name="" id="fechaInicio"></div>
                <div class="base_formulario cambio2">Fecha de Fin <input type="date" name="" id="fechaFin"></div>
            </div>
            <div class="ventanaEmergente__Botones">
                <div class="ventanaEmergente__Botones__Agregar" onclick="" id="btnAgregarExperienciaExperiencia">Agregar</div>
                <div class="ventanaEmergente__Botones__Cerrar" onclick="cerrarVentanaEmergenteExperiencia()">Cerrar</div>
            </div>
        </div>
        <!-- --------------------------------------------------------------------------------------------------------------------------- -->
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script>
        //--------------------------------------------------------------------------------------
        // BOTON AGREGAR FORMACIÓN
        // Declarar un array para almacenar todas las filas
        var filasParaGuardar = [];
        // Agregar evento de click al botón "Agregar" fuera de la función mostrarVentanaEmergente
        document.getElementById("btnAgregar").addEventListener("click", function() {
            // Obtener los valores de los inputs
            var nivelEducacion = document.getElementById("nivelEducacion").value;
            var institucion = document.getElementById("institucion").value;
            var añoInicio = document.getElementById("añoInicio").value;
            var añoFin = document.getElementById("añoFin").value;

            // Crear un objeto con los datos de la fila
            var nuevaFila = {
                nivelEducacion: nivelEducacion,
                institucion: institucion,
                añoInicio: añoInicio,
                añoFin: añoFin
            };

            // Agregar la nueva fila al array
            filasParaGuardar.push(nuevaFila);

            // Obtener el contenedor de la lista dinámica
            var listaDinamica = document.getElementById("listaDinamica");

            // Crear un nuevo elemento div para almacenar los datos
            var nuevoElemento = document.createElement("div");
            nuevoElemento.classList.add("mitaDer__Resumen__Info__ListaDinamica__Elemento");

            // Agregar los datos al nuevo elemento
            nuevoElemento.innerHTML = `
                <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__Nivel">${nivelEducacion}</div>
                <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__Institucion">${institucion}</div>
                <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__anioInicio">${añoInicio}</div>
                <div class="mitaDer__Resumen__Info__ListaDinamica__Elemento__anioFin">${añoFin}</div>
            `;

            // Agregar el nuevo elemento a la lista dinámica
            listaDinamica.appendChild(nuevoElemento);

            // Limpiar los inputs
            document.getElementById("nivelEducacion").value = "";
            document.getElementById("institucion").value = "";
            document.getElementById("añoInicio").value = "";
            document.getElementById("añoFin").value = "";

            // Cerrar la ventana emergente
            cerrarVentanaEmergente();
        });

        function mostrarVentanaEmergente () {
            var ventanaEmergente = document.getElementById("ventanaEmergente");
            ventanaEmergente.style.display = "block";
        }

        // Función para cerrar la ventana emergente
        function cerrarVentanaEmergente() {
            var ventanaEmergente = document.getElementById("ventanaEmergente");
            ventanaEmergente.style.display = "none";
        }
        // -------------------------------------------------------------------------------
        // BOTON LIMPIAR DE FORMACIÓN
        // Función para limpiar la ventana emergente y el arreglo de datos
        function limpiarVentanaEmergente() {
            // Limpiar el arreglo de datos
            filasParaGuardar = [];

            // Obtener el contenedor de la lista dinámica
            var listaDinamica = document.getElementById("listaDinamica");

            // Eliminar todos los elementos hijos excepto el primero del contenedor
            while (listaDinamica.children.length > 1) {
                listaDinamica.removeChild(listaDinamica.lastChild);
            }
        }

        // Función para cerrar la ventana emergente
        function cerrarVentanaEmergente() {
            var ventanaEmergente = document.getElementById("ventanaEmergente");
            ventanaEmergente.style.display = "none";
        }

        //--------------------------------------------------------------------------------------
        //--------------------------------------------------------------------------------------
        // BOTON AGREGAR EXPERIENCIA
        // Declarar un array para almacenar todas las filas de experiencia
        var experienciasParaGuardar = [];
        // Agregar evento de click al botón "Agregar" fuera de la función mostrarVentanaEmergenteExperiencia
        document.getElementById("btnAgregarExperienciaExperiencia").addEventListener("click", function() {
            // Obtener los valores de los inputs de experiencia
            var cargo = document.getElementById("cargo").value;
            var descripcion = document.getElementById("descripcion").value;
            var fechaInicio = document.getElementById("fechaInicio").value;
            var fechaFin = document.getElementById("fechaFin").value;

            // Crear un objeto con los datos de la fila de experiencia
            var nuevaExperiencia = {
                cargo: cargo,
                descripcion: descripcion,
                fechaInicio: fechaInicio,
                fechaFin: fechaFin
            };

            // Agregar la nueva fila de experiencia al array
            experienciasParaGuardar.push(nuevaExperiencia);

            // Obtener el contenedor de la lista dinámica de experiencia
            var listaDinamicaExperiencia = document.getElementById("listaDinamicaExperiencia");

            // Crear un nuevo elemento div para almacenar los datos de la experiencia
            var nuevoElementoExperiencia = document.createElement("div");
            nuevoElementoExperiencia.classList.add("mitaDer__Experiencia__Info__ListaDinamica__Elemento");

            // Agregar los datos al nuevo elemento de experiencia
            nuevoElementoExperiencia.innerHTML = `
                <div class="mitadDer__Experiencia__Info__ListaDinamica__Elemento__Base">${cargo}</div>
                <div class="mitadDer__Experiencia__Info__ListaDinamica__Elemento__Base">${descripcion}</div>
                <div class="mitadDer__Experiencia__Info__ListaDinamica__Elemento__Base cambio9">${fechaInicio}</div>
                <div class="mitadDer__Experiencia__Info__ListaDinamica__Elemento__Base cambio9">${fechaFin}</div>
            `;

            // Agregar el nuevo elemento de experiencia a la lista dinámica de experiencia
            listaDinamicaExperiencia.appendChild(nuevoElementoExperiencia);

            // Limpiar los inputs de experiencia
            document.getElementById("cargo").value = "";
            document.getElementById("descripcion").value = "";
            document.getElementById("fechaInicio").value = "";
            document.getElementById("fechaFin").value = "";

            // Cerrar la ventana emergente de experiencia
            cerrarVentanaEmergenteExperiencia();
        });

        function mostrarVentanaEmergenteExperiencia () {
            var ventanaEmergenteExperiencia = document.getElementById("ventanaEmergenteExperiencia");
            ventanaEmergenteExperiencia.style.display = "block";
        }

        // Función para cerrar la ventana emergente de experiencia
        function cerrarVentanaEmergenteExperiencia() {
            var ventanaEmergenteExperiencia = document.getElementById("ventanaEmergenteExperiencia");
            ventanaEmergenteExperiencia.style.display = "none";
        }

        // BOTON LIMPIAR DE EXPERIENCIA
        // Función para limpiar la ventana emergente de experiencia y el arreglo de datos de experiencia
        function limpiarVentanaEmergenteExperiencia() {
            // Limpiar el arreglo de datos de experiencia
            experienciasParaGuardar = [];

            // Obtener el contenedor de la lista dinámica de experiencia
            var listaDinamicaExperiencia = document.getElementById("listaDinamicaExperiencia");

            // Eliminar todos los elementos hijos excepto el primero del contenedor de experiencia
            while (listaDinamicaExperiencia.children.length > 1) {
                listaDinamicaExperiencia.removeChild(listaDinamicaExperiencia.lastChild);
            }
        }
        //--------------------------------------------------------------------------------------
        //FECHA

        document.getElementById('fecha_actual').valueAsDate = new Date();
        const form = document.getElementById('solicitudForm');

        // ------------------------------------------------------------------------------------------------
        //FOTO DE PERFIL

        document.getElementById('inputFoto').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Obtener el archivo seleccionado
        const imagenUsuario = document.getElementById('imagenUsuario');

        // Verificar si se seleccionó un archivo
        if (file) {
            // Crear un objeto URL para la imagen seleccionada
            imagenUsuario.src = URL.createObjectURL(file);

            // Mostrar la imagen
            imagenUsuario.style.display = 'block';
        } else {
            // Mostrar la imagen por defecto cuando no se selecciona ninguna nueva
            imagenUsuario.src = 'Imagenes\foto de perfil sin persona-Photoroom.png-Photoroom.png';
        }
        });


        // ------------------------------------------------------------------------------------------------
        // Agregar un evento de escucha para el envío del formulario
        form.addEventListener('submit', function(event) {
            // Prevenir el envío del formulario
            event.preventDefault();

            // Mostrar una confirmación al usuario
            const confirmacion = confirm("Revise si su información es correcta. ¿Está seguro que quiere postularse?");

            // Si el usuario confirma
            if (confirmacion) {
                // Crear un objeto FormData con los datos del formulario
                var formData = new FormData(document.getElementById('solicitudForm'));
                
                // Agregar los datos de las filas al objeto FormData
                for (var i = 0; i < filasParaGuardar.length; i++) {
                    var fila = filasParaGuardar[i];
                    formData.append('nivelEducacion[]', fila.nivelEducacion);
                    formData.append('institucion[]', fila.institucion);
                    formData.append('anio_inicio1[]', fila.añoInicio);
                    formData.append('anio_fin1[]', fila.añoFin);
                }
                // Agregar los datos de las filas de experiencia al objeto FormData
                for (var i = 0; i < experienciasParaGuardar.length; i++) {
                    var experiencia = experienciasParaGuardar[i];
                    formData.append('cargo1[]', experiencia.cargo);
                    formData.append('descripcion1[]', experiencia.descripcion);
                    formData.append('fechaInicio1[]', experiencia.fechaInicio);
                    formData.append('fechaFin1[]', experiencia.fechaFin);
                }

                // Crear una instancia de XMLHttpRequest para enviar los datos a PHP
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'SolicitudTrabajo_Creada.php');
                xhr.send(formData);

                // Mostrar mensaje de éxito o error
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Mostrar mensaje de éxito
                        alert("Se logró su registro");
                    } else {
                        alert("Error al guardar los datos.");
                    }
                };
            }
        });
    </script>
</body>
</html>