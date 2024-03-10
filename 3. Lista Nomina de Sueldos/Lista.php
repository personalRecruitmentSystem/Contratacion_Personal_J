<?php
include("../conexion.php");

$sql = 'SELECT cargo.Nombre AS Nombre_Cargo, cargo.Sueldo AS Sueldo, empleado.nombres AS Nombres, empleado.apellido_paterno AS Apellido_Paterno, empleado.apellido_materno AS Apellido_Materno, registro_de_trabajo.Dias_No_Trabajados, registro_de_trabajo.Dias_Trabajados, registro_de_trabajo.Dias_Feriado, registro_de_trabajo.Dias_Vacaciones
FROM cargo
JOIN empleado ON cargo.ID_Cargo = empleado.ID_Cargo
JOIN registro_de_trabajo ON empleado.ID_Empleado = registro_de_trabajo.ID_Empleado
ORDER BY empleado.apellido_paterno';

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
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion" onclick="window.location.href='../2. Listas/pantalla_principal.php'">Lista de Postulantes</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Nómina de Sueldos</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion" onclick="window.location.href='../4. Lista de Vacantes/vacantes.php'">Lista de Vacantes</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion" onclick="window.location.href='../5. Lista personal asignado cargo/personal_asignado_cargo.php'">Asignar Sub-Cargos</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Opción 5</div>
      </div>
    </div>

    <div class="pantallaPrincipal__ContDer">
      <div class="pantallaPrincipal__ContDer__Titulo">
        <div class="pantallaPrincipal__ContDer__Titulo__Texto">Nómina de Sueldos</div>
        <div class="pantallaPrincipal__ContDer__Titulo__Volver" onclick="window.location.href='../PáginaPrincipal.php'">< Volver</div>
      </div>
      <div class="pantallaPrincipal__ContDer__Listas">
        <div class="pantallaPrincipal__ContDer__Listas__BusqBotones">
          <input type="text" name="busqueda" id="id_busqueda" class="pantallaPrincipal__ContDer__Listas__BusqBotones__Busqueda">
          <button class="pantallaPrincipal__ContDer__Listas__BusqBotones__BotonBuscar">Buscar</button>
          <button class="pantallaPrincipal__ContDer__Listas__BusqBotones__BotonLimpiar" id="limpiarBusqueda">Limpiar</button>

          <!-- -------------------------------------------------------------------------------------------------------------------- -->
          <button class="pantalla_RCargos__ConDer__Listas__BusqBotones__BotonAgregar" id="agregarALaLista" > Agregar</button>
          <button class="pantalla_RCargos__ConDer__Listas__BusqBotones__BotonConvertirPDF" id="ConvertirPDF" > Convertir a PDF</button>
          <!-- -------------------------------------------------------------------------------------------------------------------- -->

        </div>
        <div class="pantallaPrincipal_registro_de_trabajo">
          <table>
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>D. Laborales</th>
                <th>D. Feriados</th>
                <th>D. Vacaciones</th>
                <th>D. no Trabajados</th>
                <th>Sueldo</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if($resultado->num_rows > 0){
                    while($row = $resultado->fetch_assoc()){
                        ?>
                        <tr>
                          <td class='tabla__Contenido'><?php echo $row["Apellido_Paterno"]." ".$row["Apellido_Materno"]." ".$row["Nombres"]; ?></td>
                          <td class='tabla__Contenido'><?php echo $row["Nombre_Cargo"]; ?></td>
                          <td class='tabla__Contenido'><?php echo $row["Dias_Trabajados"]; ?></td>
                          <td class='tabla__Contenido'><?php echo $row["Dias_Feriado"]; ?></td>
                          <td class='tabla__Contenido'><?php echo $row["Dias_Vacaciones"]; ?></td>
                          <td class='tabla__Contenido'><?php echo $row["Dias_No_Trabajados"]; ?></td>
                          <!-- Aquí necesitarás obtener el sueldo del empleado y reemplazar "1000" con el valor correspondiente -->
                          <td class='tabla__Contenido'><?php echo $row["Sueldo"]; ?></td>
                        </tr>
                        <?php
                    }
                }
              ?>
            </tbody>
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
