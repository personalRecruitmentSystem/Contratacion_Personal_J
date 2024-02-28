<?php
include("../conexion.php");

$sql = 'SELECT ID_Postulante, Nombres, Apellidos, `Cargo a postular`, Foto, Nacionalidad, `CI o pasaporte`, `Fecha de nacimiento`, Sexo, Direccion, `Celular o telefono`, Idiomas, Correo, Fotos, `PDF de la postulación`, Estado, `Fecha de postulacion` FROM postulante ORDER BY Apellidos';

$resultado = $con->query($sql);

// En la variable '$row' se guarda toda la información de cada fila y es un vector
//---------------------------------------------------------------------------------------------------------------
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Pantalla principal</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A300%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C700"/>
  <link rel="stylesheet" href="pantalla_principal_style.css"/>

  <script src="postulante.js"></script>
  <script src="Ctrl_postulante.js"></script>
</head>

<body>
  

  <div class="pantalla_principal-dTc">
    <div class="rectangle-3-LN2">
    </div>
    <img class="ezze-design-image-FUz" src="../Imagenes/ezze-design-image.png"/>
    <div class="group-3-kwY">
      <img class="streamline-ai-technology-spark-solid-f2v" src="../Imagenes/streamline-ai-technology-spark-solid-ToL.png"/>
      <p class="technology-mLr">technology</p>
    </div>
    <div class="rectangle-6-68E">Lista de Postulantes</div>
    <div class="rectangle-9-hNv">Opción 2</div>
    <div class="rectangle-10-uUz">Opción 3</div>
    <div class="rectangle-11-MLz">Opción 4</div>
    <div class="rectangle-12-azS">Opción 5</div>
    
    <div id="contenido">
      <div class="todo">
        <div class="todo__Volver">
          <div class="mitadDer__Solicitud__Titulo__Volver" onclick="window.location.href='../pantalla_inicio/PáginaPrincipal.html'">< Volver</div>
        </div>
          <input type="text" name="busqueda" id="id_busqueda" class="todo__Busqueda">
          <button class="BotonBuscar">Buscar</button>
          <button class="BotonLimpiar" id="limpiarBusqueda">Limpiar</button>
      </div>
      
      
      <table>
        
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Fecha de Postulación</th>
            <th>Estado</th>
          </tr>
        </thead>
        <!-- <tbody id="lista-postulantes"></tbody> -->
        <tbody>
          <?php
            if($resultado->num_rows > 0){   // Si tenemos filas que mostrar

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

          <!-- <tr>
            <th class="tabla__Contenido">García López María José</th>
            <th class="tabla__Contenido">Ingeniero de Software</th>
            <th class="tabla__Contenido">2024-02-01</th>
            <th class="tabla__Contenido">Pendiente</th>
          </tr>
          <tr>
            <th class="tabla__Contenido">Jason</th>
            <th class="tabla__Contenido">Desarrollador</th>
            <th class="tabla__Contenido">15-02-2022</th>
            <th class="tabla__Contenido">Pendiente</th>
          </tr>
          <tr>
            <th class="tabla__Contenido">Jason</th>
            <th class="tabla__Contenido">Desarrollador</th>
            <th class="tabla__Contenido">15-02-2022</th>
            <th class="tabla__Contenido">Pendiente</th>
          </tr> -->
        </tbody>
      </table>
    </div>
  </div>

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
