<?php
include("../conexion.php");

$sql = 'SELECT detalle_postulacion.ID_Cargo, detalle_postulacion.ID_Postulante, detalle_postulacion.Fecha_de_Postulacion, detalle_postulacion.Estado,
postulante.Nombres, postulante.Apellido_Paterno, postulante.Apellido_Materno
FROM detalle_postulacion
JOIN postulante ON detalle_postulacion.ID_Postulante = postulante.ID_Postulante
ORDER BY postulante.Apellido_Paterno;';

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
  <link rel="stylesheet" href="pantalla_principal_Estilos.css"/>
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
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion" onclick="window.location.href='../3. Lista Nomina de Sueldos/Lista.php'">Nómina de Sueldos</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion" onclick="window.location.href='../4. Lista de Vacantes/vacantes.php'">Lista de Vacantes</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion" onclick="window.location.href='../5. Lista personal asignado cargo/personal_asignado_cargo.php'">Asignar Sub-Cargos</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion" onclick="window.location.href='../6.Programar y coordinar/listado_entrevista.php'">Lista de Entrevista</div>
      </div>
    </div>

    <div class="pantallaPrincipal__ContDer">
      <div class="pantallaPrincipal__ContDer__Titulo">
        <div class="pantallaPrincipal__ContDer__Titulo__Texto">Lista de Postulantes</div>
        <div class="pantallaPrincipal__ContDer__Titulo__Volver" onclick="window.location.href='../PáginaPrincipal.php'">< Volver</div>
      </div>
      <div class="pantallaPrincipal__ContDer__Listas">
        <div class="pantallaPrincipal__ContDer__Listas__BusqBotones">
          <input type="text" name="busqueda" id="id_busqueda" class="pantallaPrincipal__ContDer__Listas__BusqBotones__Busqueda">
          <button class="pantallaPrincipal__ContDer__Listas__BusqBotones__BotonBuscar">Buscar</button>
          <button class="pantallaPrincipal__ContDer__Listas__BusqBotones__BotonLimpiar" id="limpiarBusqueda">Limpiar</button>
        </div>
        <div class="pantallaPrincipal__ContDer__Listas__Lista">
          <table>
            <thead>
              <tr>
                <th>Nombre</th>
                <th onclick='abrirVentanaEmergente()'>Cargo</th>
                <th>Fecha de Postulación</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if($resultado->num_rows > 0){
                    while($row = $resultado->fetch_assoc()){
                        ?>
                        <tr>
                        <?php
                        echo "<th class='tabla__Contenido'>".$row["Apellido_Paterno"]." ".$row["Apellido_Materno"]." ".$row["Nombres"]."</th>";
                        echo "<th class='tabla__Contenido'>";
                        switch ($row["ID_Cargo"]) {
                            case 1:
                                echo "Desarrollo";
                                break;
                            case 2:
                                echo "Gerente";
                                break;
                            case 3:
                                echo "Administrativo";
                                break;
                            case 4:
                                echo "Analista";
                                break;
                            default:
                                echo "Desconocido";
                        }
                        echo "</th>";
                        echo "<th class='tabla__Contenido'>".$row["Fecha_de_Postulacion"]."</th>";
                        echo "<th class='tabla__Contenido'>".$row["Estado"]."</th>";
                        ?>
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

  <!-- ----------------------------------------------------------------------------------------- -->
  <?php
  include("../conexion.php");

  $sql = 'SELECT detalle_postulacion.ID_Cargo, detalle_postulacion.ID_Postulante, detalle_postulacion.Fecha_de_Postulacion, detalle_postulacion.Estado,
  postulante.Nombres, postulante.Apellido_Paterno, postulante.Apellido_Materno
  FROM detalle_postulacion
  JOIN postulante ON detalle_postulacion.ID_Postulante = postulante.ID_Postulante
  ORDER BY postulante.Apellido_Paterno;';

  $resultado = $con->query($sql);

  // Almacenar los resultados en un array
  $cargos = array();
  if ($resultado->num_rows > 0) {
      while ($row = $resultado->fetch_assoc()) {
          $cargos[] = $row;
      }
  }
  ?>

<!-- Código HTML -->
<div id="ventanaEmergente" style='display: none'>
  <div class="ventanaEmergente__Checkboxes">
    <?php foreach ($cargos as $cargo) : ?>
      <div><input type="checkbox" id="cargo_<?php echo $cargo["ID_Cargo"]; ?>" name="cargos[]" value="<?php echo $cargo["ID_Cargo"]; ?>">
      <label for="cargo_<?php echo $cargo["ID_Cargo"]; ?>">
        <?php
        switch ($cargo["ID_Cargo"]) {
          case 1:
            echo "Desarrollo";
            break;
          case 2:
            echo "Gerente";
            break;
          case 3:
            echo "Administrativo";
            break;
          case 4:
            echo "Analista";
            break;
          default:
            echo "Desconocido";
        }
        ?>
      </label></div>
    <?php endforeach; ?>
  </div>
  <div class="ventanaEmergente__Botones">
    <div class="ventanaEmergente__Botones__Aceptar" onclick="filtrarRegistros()" id="btnAceptar">Aceptar</div>
    <div class="ventanaEmergente__Botones__Cerrar" onclick="cerrarVentanaEmergente()">Cerrar</div>
  </div>
</div>

<!-- ------------------------------------------------------------------------------------------------------------- -->
  <script>
  // document.addEventListener('DOMContentLoaded', function() {
  //   ctrl_postulante.mostrarPostulante(); 
  // });
  function abrirVentanaEmergente() {
    document.getElementById('ventanaEmergente').style.display = 'block';
  }
  function cerrarVentanaEmergente() {
    document.getElementById('ventanaEmergente').style.display = 'none';
  }

  function filtrarRegistros() {
    // Obtener los checkboxes seleccionados
    const checkboxes = document.querySelectorAll('.ventanaEmergente__Checkboxes input[type="checkbox"]:checked');
    const valoresCargos = Array.from(checkboxes).map(checkbox => checkbox.nextSibling.textContent.trim());

    // Ocultar todas las filas de la tabla
    const filas = document.querySelectorAll('tbody tr');
    filas.forEach(fila => fila.style.display = 'none');

    // Mostrar solo los registros que corresponden a los cargos seleccionados
    filas.forEach(fila => {
      const cargo = fila.querySelector('.tabla__Contenido:nth-child(2)').textContent.trim(); // Obtener el valor del cargo de la fila
      if (valoresCargos.includes(cargo)) {
        fila.style.display = 'table-row';
      }
    });
    cerrarVentanaEmergente(); // Cerrar la ventana emergente después de filtrar los registros
  }

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