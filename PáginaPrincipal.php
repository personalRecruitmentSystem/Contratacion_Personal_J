<?php
  // Incluir la conexión a la base de datos
  include("conexion.php");

  // Consulta SQL para obtener todas las convocatorias
  $sqlConvocatorias = "SELECT DISTINCT ID_convocatoria FROM uinion";

  // Ejecutar la consulta para obtener todas las convocatorias
  $resultConvocatorias = $con->query($sqlConvocatorias);

  // Verificar si se obtuvieron resultados
  if ($resultConvocatorias->num_rows > 0) {
    // Crear un string para almacenar la información de los cargos asociados a cada convocatoria
    $convocatoriasInfo = "";
    // Iterar sobre las convocatorias y obtener los cargos asociados a cada una
    while ($rowConvocatoria = $resultConvocatorias->fetch_assoc()) {
      $idConvocatoria = $rowConvocatoria['ID_convocatoria'];
      // Consulta SQL para obtener los cargos asociados a esta convocatoria
      $sqlCargos = "SELECT ID_cargo FROM uinion WHERE ID_convocatoria = $idConvocatoria";
      // Ejecutar la consulta
      $resultCargos = $con->query($sqlCargos);
      // Verificar si se obtuvieron resultados
      if ($resultCargos->num_rows > 0) {
        // Crear un string para almacenar los IDs de los cargos asociados a esta convocatoria
        $cargosInfo = "";
        // Iterar sobre los resultados y agregar cada ID de cargo al string
        while ($rowCargo = $resultCargos->fetch_assoc()) {
          $cargosInfo .= $rowCargo['ID_cargo'] . " ";
        }
        // Agregar la información de esta convocatoria al string principal
        $convocatoriasInfo .= "Convocatoria $idConvocatoria, " . trim($cargosInfo) . " - ";
      }
    }
    // Imprimir el div con la información de todas las convocatorias y sus cargos asociados
    echo '<div id="convocatoria__Info" style="display: none;">' . trim($convocatoriasInfo, " - ") . '</div>';
  } else {
    echo '<p>No hay convocatorias disponibles.</p>';
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Technology</title>
  <link rel="stylesheet" href="PaginaPrincipal_Estilos.css" />
</head>
<body>
  <div class="todo">
    <div class="mitadIzq">
      <img src="Imagenes\ezze-design-image-YsG.png" alt="" class="img__fondo" />
      <div class="mitadIzq__Titulo">
        <div class="mitadIzq__Tiltulo__Imagen">
          <img src="Imagenes\streamline-ai-technology-spark-solid.png" alt="Streamline AI Technology Spark" />
        </div>
        <div class="mitadIzq__Titulo__Nombre">Technology</div>
      </div>
      <div class="mitadIzq__Bienvenido">¡Bienvenido a Technology!</div>
    </div>
    <div class="mitadDer" id="div_mitadDer">
      <img src="Imagenes\ezze-design-image-bg.png" alt="" class="img__fondo2" />
      <div class="mitadDer__Opciones" id="boton_postulante">Postularse</div>
      <div class="mitadDer__Opciones" id="boton_lista" onclick="window.location.href='2. Listas/pantalla_principal.php'">Ver Listas</div>
    </div>
  </div>

  <div class="cargos" id="cargos" style="display: none;">
    <div class="cargos__Titulo">
      <?php
        // Consulta SQL para obtener las convocatorias ordenadas cronológicamente
        $sql = "SELECT DISTINCT DATE_FORMAT(c.Fch_inicio, '%m - %Y') AS Fecha 
                FROM convocatoria c 
                INNER JOIN uinion u ON c.ID_convocatoria = u.ID_convocatoria 
                ORDER BY c.Fch_inicio";

        // Ejecutar la consulta
        $result = $con->query($sql);

        // Verificar si se obtuvieron resultados
        if ($result->num_rows > 0) {
            // Crear el campo de selección
            echo '<select id="convocatorias" name="convocatorias" class="cargos__Titulo__Select">';
            // Iterar sobre los resultados y mostrar cada opción
            while ($row = $result->fetch_assoc()) {
                // Obtener el mes y el año para el formato deseado
                $fecha = explode(" - ", $row["Fecha"]);
                $mes = $fecha[0];
                $anio = $fecha[1];
                $i_convocatoria++;
                // Construir la opción con el formato deseado
                echo '<option value="'.$row["Fecha"].'">Convocatoria ' . $i_convocatoria . ' (' . $mes . ' - ' . $anio . ')</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No hay datos disponibles</p>';
        }
      ?>
      
      <p class="cargos__Titulo__Texto">Cargos Disponibles</p>
    </div>
    <div class="cargos__Botones">
    <div class="cargos__BotonIzq" onclick="window.location.href='1. Formulario de Postulante/SolicitudTrabajo.php?puesto=1'">Desarrollo</div>

      <div class="cargos__BotonDer" onclick="window.location.href='1. Formulario de Postulante/SolicitudTrabajo.php?puesto=2'">Gerente</div>
    <!-- Aquí se mostrarán los ID_Cargo asociados a la convocatoria seleccionada -->
    </div>
  </div>

  <script>
    document.getElementById('boton_postulante').addEventListener('click', function() {
      document.getElementById('div_mitadDer').style.display = 'none';
      document.getElementById('cargos').style.display = 'block';
    });

    document.addEventListener('click', function(event) {
      var cargos = document.getElementById('cargos');
      var div_mitadDer = document.getElementById('div_mitadDer');
      if (!cargos.contains(event.target) && event.target.id !== 'boton_postulante') {
        cargos.style.display = 'none';
        div_mitadDer.style.display = 'flex';
      }
    });
    
    // Evento change para el select de convocatorias
    document.getElementById('convocatorias').addEventListener('change', function() {
    // Obtener el texto seleccionado
    var seleccion = this.options[this.selectedIndex].text;
    // Extraer el número de convocatoria
    var numConvocatoria = seleccion.match(/\d+/)[0];
    // Obtener la información de las convocatorias y sus cargos asociados
    var convocatoriaInfo = document.getElementById('convocatoria__Info').innerText;
    // Buscar todos los cargos asociados a la convocatoria seleccionada
    var regex = new RegExp('Convocatoria ' + numConvocatoria + ', (\\d+(?: \\d+)*)', 'g');
    var cargos = [];
    var match;
    // Iterar sobre todas las coincidencias encontradas y agregar los cargos a la lista
    while ((match = regex.exec(convocatoriaInfo)) !== null) {
        var cargoString = match[1];
        var cargoArray = cargoString.split(' ').map(Number);
        cargos.push(cargoArray);
    }
    // Crear los divs para mostrar los cargos asociados a la convocatoria seleccionada
    var cargosDiv = document.querySelector('.cargos__Botones');
    cargosDiv.innerHTML = '';
    var intercalar = 1;
    cargosDiv.innerHTML = ''; // Limpiar contenido previo
    cargos.forEach(function(cargo) {
        cargo.forEach(function(cargoNumero) {
          var div = document.createElement('div');
          if(intercalar==1){
            div.classList.add('cargos__BotonIzq');
            intercalar=2;
          }else{
            div.classList.add('cargos__BotonDer');
            intercalar=1;
          }
          // Asignar el nombre del cargo basado en el número
          // Asignar el nombre del cargo basado en el número
          switch(cargoNumero) {
            case 1:
                div.innerText = "Desarrollo";
                // Agregar evento de clic para redirigir al formulario con el parámetro adecuado
                div.addEventListener('click', function() {
                    window.location.href = '1. Formulario de Postulante/SolicitudTrabajo.php?puesto=1';
                });
                break;
            case 2:
                div.innerText = "Gerente";
                // Agregar evento de clic para redirigir al formulario con el parámetro adecuado
                div.addEventListener('click', function() {
                    window.location.href = '1. Formulario de Postulante/SolicitudTrabajo.php?puesto=2';
                });
                break;
            case 3:
                div.innerText = "Administrativo";
                // Agregar evento de clic para redirigir al formulario con el parámetro adecuado
                div.addEventListener('click', function() {
                    window.location.href = '1. Formulario de Postulante/SolicitudTrabajo.php?puesto=3';
                });
                break;
            case 4:
                div.innerText = "Analista";
                // Agregar evento de clic para redirigir al formulario con el parámetro adecuado
                div.addEventListener('click', function() {
                    window.location.href = '1. Formulario de Postulante/SolicitudTrabajo.php?puesto=4';
                });
                break;
            default:
                div.innerText = "Cargo Desconocido";
                break;
          }
          cargosDiv.appendChild(div);
        });
      });
    });
  </script>
</body>
</html>
