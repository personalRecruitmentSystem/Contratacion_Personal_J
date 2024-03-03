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
  <link rel="stylesheet" href="../2. Listas/pantalla_principal_Estilos.css"/>
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
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Opción 3</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Opción 4</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Opción 5</div>
      </div>
    </div>

    <div class="pantallaPrincipal__ContDer">
      <div class="pantallaPrincipal__ContDer__Titulo">
        <div class="pantallaPrincipal__ContDer__Titulo__Texto">Lista de Postulantes</div>
        <div class="pantallaPrincipal__ContDer__Titulo__Volver" onclick="window.location.href='../PáginaPrincipal.html'">< Volver</div>
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
                <th>Cargo
                    <br>
                    <select name="opciones" id="opciones">
                        <option value="desarrolo">desarrollo</option>
                        <option value="administracion">administracion</option>
                        <option value="marketing">marketing</option>
                        <option value="ventas">ventas</option>
                    </select>
                </th>
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
                        echo "<th class='tabla__Contenido'>".$row["Apellidos"]."<br>".$row["Nombres"]."</th>";
                        echo "<th class='tabla__Contenido'>".$row["Cargo a postular"]."</th>";
                        echo "<th class='tabla__Contenido'>".$row["Fecha de postulacion"]."</th>";
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
//*********************************************************************** */
    // esto deberia de hacer que funcione el select

    document.addEventListener('DOMContentLoaded', function() {
    const selectOpciones = document.getElementById('opciones');
    const filas = document.querySelectorAll('tbody tr');

    selectOpciones.addEventListener('change', function() {
      const valorSeleccionado = selectOpciones.value;

      // Mostrar u ocultar las filas según el valor seleccionado
      filas.forEach(function(fila) {
        const cargo = fila.querySelector('.tabla__Contenido').textContent.toLowerCase();
        if (valorSeleccionado === 'todos' || cargo.includes(valorSeleccionado)) {
          fila.style.display = 'table-row';
        } else {
          fila.style.display = 'none';
        }
      });
    });
  });

//**************************************************************************** */

  </script>
</body>
</html>
