<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Trabajo</title>
    <link rel="stylesheet" href="SolicitudTrabajo.css">
</head>
<body>
    <form action="SolicitudTrabajo_Creada.php" method="post" class="todo">
        <div class="mitadIzq">
            <div class="mitadIzq__Foto">
                <div class="mitadIzq__Foto__Titulo">Foto</div>
                <img src="Imagenes\foto de perfil sin persona-Photoroom.png-Photoroom.png" alt="" class="mitadIzq__Foto__Archivo">
            </div>
        </div>
        <div class="mitadDer">
            <div class="mitadDer__Solicitud">
                <div class="mitadDer__Solicitud__Titulo">SOLICITUD DE EMPLEO</div>
                <div class="mitadDer__Solicitud__Info">
                    <div class="mitadDer__Solicitud__Info__Fecha">
                        Fecha de Postulación <br>
                        <input type="date" name="Fecha_Postulacion" id="fecha_actual" readonly>
                    </div>
                    <div class="mitadDer__Solicitud__Info__Puesto">
                        Cargo Solicitado <br>
                        <input type="text" name="Cargo" id="" value="Administración" readonly>   
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
                    <div class="base_formulario">Idiomas</div>
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
</body>
<script>
    document.getElementById('fecha_actual').valueAsDate = new Date();
</script>

</html>