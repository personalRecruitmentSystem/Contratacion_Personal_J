<?php
include("../conexion.php");

$sql = 'SELECT ID_Postulante, Nombres, Apellidos, `Cargo a postular`, Foto, Nacionalidad, `CI o pasaporte`, `Fecha de nacimiento`, Sexo, Direccion, `Celular o telefono`, Idiomas, Correo, Fotos, `PDF de la postulación`, Estado, `Fecha de postulacion` FROM postulante ORDER BY Apellidos';

$resultado = $con->query($sql);
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Listas</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A300%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C700"/>
  <link rel="stylesheet" href="pantalla_RCargos.css"/>
</head>

<body>
  <div class="pantallaPrincipal">
    <div class="pantallaPrincipal__MenuIzq">
      <div class="pantallaPrincipal__MenuIzq__Titulo">
        <div class="pantallaPrincipal__MenuIzq__Titulo__Imagen"></div>
        <div class="pantallaPrincipal__MenuIzq__Titulo__Texto">Technology</div>
      </div>
      <div class="pantallaPrincipal__MenuIzq__Opciones">
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Lista de Postulantes</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Opción 2</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">lista de trabajos</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Opción 4</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Opción 5</div>
      </div>
    </div>

    <div class="pantallaPrincipal__ContDer">
      <div class="pantallaPrincipal__ContDer__Titulo">
        <div class="pantallaPrincipal__ContDer__Titulo__Texto">registro de trabajo </div>
        <div class="pantallaPrincipal__ContDer__Titulo__Volver" onclick="window.location.href='../PáginaPrincipal.html'">  Volver</div>
      </div>
      <div class="pantallaPrincipal__ContDer__Listas">
        <div class="pantallaPrincipal__ContDer__Listas__BusqBotones">
          <input type="text" name="busqueda" id="id_busqueda" class="pantallaPrincipal__ContDer__Listas__BusqBotones__Busqueda">
          <button class="pantallaPrincipal__ContDer__Listas__BusqBotones__BotonBuscar">Buscar</button>
          <button class="pantallaPrincipal__ContDer__Listas__BusqBotones__BotonLimpiar" id="limpiarBusqueda">Limpiar</button>


          <button class="pantalla_RCargos__ConDer__Listas__BusqBotones__BotonAgregar" id="agregarALaLista" > Agregar</button>
          <button class="pantalla_RCargos__ConDer__Listas__BusqBotones__BotonConvertirPDF" id="ConvertirPDF" > Generar Reporte PDF</button>


          
        </div>
        <div class="pantallaPrincipal_registro_de_trabajo">
          <table>
            <thead>
              
              <tr>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>D laborales</th>
                <th>D feriados</th>
                <th>D vacaciones</th>
                <th>D no trabajados</th>
                <th>sueldo/mensual</th>
              </tr>

              
              
            </thead>
            <tr>
              <td>juan</td>
              <td>programador</td>
              <td>30</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>1000</td>
              
            </tr>

          </table>
        </div>
      </div>
    </div>
  </div>
<!-- ------------------------------------------------------------------------------------------------------------- -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    ctrl_postulante.mostrarPostulante(); 
  });

  document.addEventListener('DOMContentLoaded', function() {
    const botonBuscar = document.querySelector('button');
    const inputBusqueda = document.getElementById('id_busqueda');

    botonBuscar.addEventListener('click', function() {
      const valorBusqueda = inputBusqueda.value.trim().toLowerCase();

      // Filtrar las filas de la tabla según el valor de búsqueda
      const filas = document.querySelectorAll('tbody tr');
      filas.forEach(function(fila) {
        const apellido = fila.querySelector('.tabla__Contenido').textContent.toLowerCase();
        if (apellido.includes(valorBusqueda)) {
          fila.style.display = 'table-row';
        } else {
          fila.style.display = 'none';
        }
      });
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
  const botonLimpiar = document.getElementById('limpiarBusqueda');
  const inputBusqueda = document.getElementById('id_busqueda');

  botonLimpiar.addEventListener('click', function() {
    // Limpiar el valor del input de búsqueda
    inputBusqueda.value = '';

    // Mostrar todas las filas de la tabla
    const filas = document.querySelectorAll('tbody tr');
      filas.forEach(function(fila) {
        fila.style.display = 'table-row';
      });
    });
  });
  </script>
</body>
</html>