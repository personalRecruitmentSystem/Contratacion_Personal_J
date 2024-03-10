<?php
include("../conexion.php");

// $sql1 = "SELECT p.Nombres, p.Apellido_Paterno, p.Apellido_Materno, dp.ID_Cargo, dp.Fecha_de_Postulacion
//          FROM postulante p
//          INNER JOIN detalle_postulacion dp ON p.ID_Postulante = dp.ID_Postulante";

$sql1 = "SELECT p.Nombres, p.Apellido_Paterno, p.Apellido_Materno, dp.ID_Cargo, dp.Fecha_de_Postulacion
         FROM postulante p
         INNER JOIN detalle_postulacion dp ON p.ID_Postulante = dp.ID_Postulante
         WHERE dp.Estado = 'Aceptado'";


$resultado1 = $con->query($sql1);

$sql2 = "SELECT ID_Cargo, Nombre FROM sub_cargo";

$resultado2 = $con->query($sql2);


// Guardar los resultados de la consulta 2 en un array asociativo con el ID_Cargo como clave
$subcargos = array();
if ($resultado2->num_rows > 0) {
    while ($fila = $resultado2->fetch_assoc()) {
        $subcargos[$fila['ID_Cargo']][] = $fila;
    }
}

//---------------------------------------------------------------------------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recuperar los datos del formulario
  // Recuperar los datos del formulario
  $nombres = $_POST['nombres'];
  $apellido_paterno = $_POST['apellido_paterno'];
  $apellido_materno = $_POST['apellido_materno'];
  $id_cargo = $_POST['id_cargo'];
  $id_convocatoria = $_POST['id_convocatoria'];
  $fk_subcargo_id = $_POST['subcargo'];

  // Insertar los datos en la tabla empleado
  $sql_insert = "INSERT INTO empleado (Nombres, Apellido_Paterno, Apellido_Materno, ID_Cargo, ID_convocatoria, fk_SubCargoID)
              VALUES ('$nombres', '$apellido_paterno', '$apellido_materno', $id_cargo, $id_convocatoria, $fk_subcargo_id)";

  if ($con->query($sql_insert) === TRUE) {
      // Mostrar una alerta en JavaScript
      echo "<script>alert('Nuevo empleado insertado correctamente');</script>";
  } else {
      // Mostrar una alerta en JavaScript con el mensaje de error
      echo "<script>alert('Error al insertar empleado: " . $con->error . "');</script>";
  }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
    <title>Lista Personal asignado al cargo</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A300%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C700"/>
  <link rel="stylesheet" href="pantalla_personal_asignado_cargo_Estilos.css"/>
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
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion" onclick="window.location.href='../3. Lista Nomina de Sueldos/Lista.php'">Nómina de Sueldos</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion" onclick="window.location.href='../4. Lista de Vacantes/vacantes.php'">Lista de Vacantes</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Asignar Sub-Cargos</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Opción 5</div>
    </div>
  </div>
  <div class="pantallaPrincipal__ContDer"  id="generarPDF_deEsto">
    <div class="pantallaPrincipal__ContDer__Titulo">
      <div class="pantallaPrincipal__ContDer__Titulo__Texto">Lista de Personal para asignar Sub-Cargos</div>
      <div class="pantallaPrincipal__ContDer__Titulo__Volver" onclick="window.location.href='../PáginaPrincipal.php'"><  Volver</div>
    </div>
    <div class="pantallaPrincipal__ContDer__Listas">
        <div class="pantallaPrincipal__ContDer__Listas__BusqBotones">
          <input type="text" name="busqueda" id="id_busqueda" class="pantallaPrincipal__ContDer__Listas__BusqBotones__Busqueda">
          <button class="pantallaPrincipal__ContDer__Listas__BusqBotones__BotonBuscar">Buscar</button>
          <button class="pantallaPrincipal__ContDer__Listas__BusqBotones__BotonLimpiar" id="limpiarBusqueda">Limpiar</button>
    </div>
  </div>
  <div class="pantallaPrincipal__ContDer__Listas__Lista">
    <table>
      <thead>
        <tr>
          <th>Nombre Completo</th>
          <th>Cargo</th>
          <th>Subcargo</th>
          <th>Gestión de Postulacion</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Iterar sobre el resultado de la primera consulta para llenar la tabla HTML
        if ($resultado1->num_rows > 0) {
            while ($fila = $resultado1->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='tabla__Contenido'>" . $fila['Nombres'] . " " . $fila['Apellido_Paterno'] . " " . $fila['Apellido_Materno'] . "</td>";
                echo "<td class='tabla__Contenido'>";
                  switch ($fila['ID_Cargo']) {
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
                          echo "Cargo no especificado";
                  }
                echo "</td>";
                //---------------------------------------------------------------------------
                echo "<td class='tabla__Contenido'>";




                echo "<form method='post'>";
                echo "<input type='hidden' name='nombres' value='" . $fila['Nombres'] . "'>";
                echo "<input type='hidden' name='apellido_paterno' value='" . $fila['Apellido_Paterno'] . "'>";
                echo "<input type='hidden' name='apellido_materno' value='" . $fila['Apellido_Materno'] . "'>";
                echo "<input type='hidden' name='id_cargo' value='" . $fila['ID_Cargo'] . "'>";
                echo "<input type='hidden' name='id_convocatoria' value='1'>"; // Aquí puedes establecer cualquier convocatoria





                  echo "<select name='subcargo' class='cambio3'>";

                  if (isset($subcargos[$fila['ID_Cargo']])) {
                      foreach ($subcargos[$fila['ID_Cargo']] as $subcargo) {
                          echo "<option value='" . $subcargo['ID_Cargo'] . "'>" . $subcargo['Nombre'] . "</option>";
                      }
                  }
                  echo "</select>";
                echo "</td>";
                //---------------------------------------------------------------------------
                echo "<td class='tabla__Contenido'>" . date('m - Y', strtotime($fila['Fecha_de_Postulacion'])) . "</td>";
                echo "<td class='tabla__Contenido'>";
                //---------------------------------------------------------------------------
                // echo "<div class='cambio2'>Enviar</div>";
                echo "<button type='submit' class='cambio2'>Enviar</button>";
                echo "</form>";
                //---------------------------------------------------------------------------
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
      </tbody>
    </table>
  </div>
  <div class="guardarDatos"></div>


  <!--generar pdf-->
  <!-- <div  class="pantallaPrincipal__ContDer__Titulo__Volver cambio1" id="crearPDF">
    Generar Reporte PDF
  </div> -->
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    ctrl_listavacante.mostrarListaVacante(); 
  });

  document.addEventListener('DOMContentLoaded', function() {
    const botonBuscar = document.querySelector('button');
    const inputBusqueda = document.getElementById('id_busqueda');

    botonBuscar.addEventListener('click', function() {
      const valorBusqueda = inputBusqueda.value.trim().toLowerCase();

      const filas = document.querySelectorAll('tbody tr');
      filas.forEach(function(fila) {
        const Nombre= fila.querySelector('.tabla__Contenido').textContent.toLowerCase();
        if (Nombre.includes(valorBusqueda)) {
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