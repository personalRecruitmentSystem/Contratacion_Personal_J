<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Trabajo</title>
    <link rel="stylesheet" href="SolicitudTrabajo.css">
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
                    <div class="mitadDer__Solicitud__Titulo__Texto">SOLICITUD DE EMPLEO</div>
                    <div class="mitadDer__Solicitud__Titulo__Volver" onclick="window.location.href='pantalla_inicio/PáginaPrincipal.html'">< Volver</div>
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
                                
                                // Dependiendo del valor de 'puesto', asignar el nombre del cargo
                                switch($puesto) {
                                    case 1:
                                        $cargo = "Administración";
                                        break;
                                    case 2:
                                        $cargo = "Secretaria";
                                        break;
                                    case 3:
                                        $cargo = "Gerente";
                                        break;
                                    case 4:
                                        $cargo = "RRHH";
                                        break;
                                    case 5:
                                        $cargo = "Sistemas";
                                        break;
                                    default:
                                        $cargo = "Cargo no especificado";
                                }
                            } else {
                                // Si no se recibió la variable 'puesto', asignar un valor predeterminado
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
                    <div class="base_formulario">Apellidos <input type="text" name="Apellidos" id=""></div>
                    <div class="base_formulario">Nombres <input type="text" name="Nombres" id=""></div>
                    <div class="base_formulario cambio1">Fecha de Nacimiento <input type="date" name="Fecha_Nacimiento" id=""></div>
                    <div class="base_formulario">Nº de Carnet o Pasaporte <input type="number" name="CI_Pasaporte" id=""></div>
                </div>
                <div class="mitadDer__Datos__Fila2">
                    <div class="base_formulario cambio2">Nacionalidad <input type="text" name="Nacionalidad" id=""></div>
                    <div class="base_formulario cambio2">Sexo <input type="text" name="Sexo" id=""></div>
                    <div class="base_formulario">Celular o Teléfono <input type="text" name="Celular_Telefono" id=""></div>
                    <div class="base_formulario cambio1">Correo <input type="text" name="Correo" id=""></div>
                    <div class="base_formulario">Dirección <input type="text" name="Direccion" id=""></div>
                </div>
                <div class="mitadDer__Datos__Fila3">
                    <div class="base_formulario">
                        <div>Idiomas</div>
                        <div class="cambio6">
                            <div class="cambio5">
                                <label for="nivel-ingles">Inglés:</label>
                                <input type="range" id="nivel-ingles" name="nivel-ingles" min="0" max="6" step="1">
                                <output for="nivel-ingles" id="nivel-ingles-value">Ninguno</output>
                            </div>
                            <div class="cambio5">
                                <label for="nivel-frances">Francés:</label>
                                <input type="range" id="nivel-frances" name="nivel-frances" min="0" max="6" step="1">
                                <output for="nivel-frances" id="nivel-frances-value">Ninguno</output>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
            <div class="mitadDer__Resumen">
                <div class="mitadDer__Resumen__Titulo">Resumen</div>
                <div class="mitaDer__Resumen__Info"><textarea name="descripcion" id="" cols="30" rows="10" class="resumen"></textarea><br></div>
                
            </div>
            <div class="mitadDer__Experiencia">
                <div class="mitadDer__Experiencia__Titulo">Experiencia</div>
                <div class="mitadDer__Experiencia__Info">
                <div class="mitadDer__Experiencia__Info__Base cambio4">
                        <div class="mitadDer__Experiencia__Info__Base__Fecha">
                            Fecha de Inicio <br>
                            <input type="date" name="" id=""> <br>
                            Fecha de Fin <br>
                            <input type="date" name="" id="">
                        </div>
                        <div class="mitadDer__Experiencia__Info__Base__Texto">Cargo <br> <textarea name="" id="" class="experiencia"></textarea></div>
                    </div>
                    <div class="mitadDer__Experiencia__Info__Base">
                        <div class="mitadDer__Experiencia__Info__Base__Fecha">
                            Fecha de Inicio <br>
                            <input type="date" name="" id=""> <br>
                            Fecha de Fin <br>
                            <input type="date" name="" id="">
                        </div>
                        <div class="mitadDer__Experiencia__Info__Base__Texto">Cargo <br> <textarea name="" id="" class="experiencia"></textarea></div>
                    </div>
                </div>
                <div class="mitadDer__Experiencia__Info">
                    <div class="mitadDer__Experiencia__Info__Base cambio4 cambio3">
                        <div class="mitadDer__Experiencia__Info__Base__Fecha">
                            Fecha de Inicio <br>
                            <input type="date" name="" id=""> <br>
                            Fecha de Fin <br>
                            <input type="date" name="" id="">
                        </div>
                        <div class="mitadDer__Experiencia__Info__Base__Texto">Cargo <br> <textarea name="" id="" class="experiencia"></textarea></div>
                    </div>
                    <div class="mitadDer__Experiencia__Info__Base cambio3">
                        <div class="mitadDer__Experiencia__Info__Base__Fecha">
                            Fecha de Inicio <br>
                            <input type="date" name="" id=""> <br>
                            Fecha de Fin <br>
                            <input type="date" name="" id="">
                        </div>
                        <div class="mitadDer__Experiencia__Info__Base__Texto">Cargo <br> <textarea name="" id="" class="experiencia"></textarea></div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Enviar" class="mitadDer__Enviar">
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script>
        //--------------------------------------------------------------------------------------
        // IDIOMAS
        
        const nivelIngles = document.getElementById('nivel-ingles');
        const nivelFrances = document.getElementById('nivel-frances');
        const outputIngles = document.getElementById('nivel-ingles-value');
        const outputFrances = document.getElementById('nivel-frances-value');

        // Agregar eventos de cambio a los controles de rango
        nivelIngles.addEventListener('input', function() {
            outputIngles.textContent = convertirNivel(parseInt(this.value));
        });

        nivelFrances.addEventListener('input', function() {
            outputFrances.textContent = convertirNivel(parseInt(this.value));
        });

        // Función para convertir el valor del rango en el nivel correspondiente
        function convertirNivel(valor) {
            switch (valor) {
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
        // CAPTURA DE PANTALLA

        // Función para capturar la pantalla y enviarla al archivo PHP
        function captureScreen() {
            html2canvas(document.body).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');

                // Crear un objeto FormData con los datos del formulario y la captura de pantalla
                var formData = new FormData(document.getElementById('solicitudForm'));
                formData.append('screenshot', imgData);

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
            }).catch(function(error) {
                console.error('Error al capturar la pantalla:', error);
            });
        }


        // Agregar un evento de escucha para el envío del formulario
        form.addEventListener('submit', function(event) {
            // Prevenir el envío del formulario
            event.preventDefault();

            // Mostrar una confirmación al usuario
            const confirmacion = confirm("Revise si su información es correcta. ¿Está seguro que quiere postularse?");

            // Si el usuario confirma
            if (confirmacion) {
                // Capturar la pantalla y enviarla al archivo PHP
                captureScreen();
            }
        });


    </script>
</body>
</html>