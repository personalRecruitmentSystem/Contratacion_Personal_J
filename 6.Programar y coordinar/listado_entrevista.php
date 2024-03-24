<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
    <title>Lista Entrevista</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A300%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C700"/>
  <link rel="stylesheet" href="pantalla_entrevista_Estilos.css"/>
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
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion" onclick="window.location.href='../5. Lista personal asignado cargo/personal_asignado_cargo.php'">Asignar Sub-Cargos</div>
        <div class="pantallaPrincipal__MenuIzq__Opciones__Opcion">Lista de Entrevista</div>
    </div>
  </div>
  <div class="pantallaPrincipal__ContDer"  id="generarPDF_deEsto">
    <div class="pantallaPrincipal__ContDer__Titulo">
      <div class="pantallaPrincipal__ContDer__Titulo__Texto">Lista de entrevista </div>
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
          <th>Cargo </th>
          
          <th>Fecha Postulacion </th>
          <th>Estado </th>
          <th>Experiencia</th>
          <th>Programacion Entrevista </th>
          </tr>
      </thead>
      <tbody>
      <?php
          include("../conexion.php");
          include("consulta_entrevista.php");
          if($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
        ?>
        <tr>
        <?php
              echo "<th class='tabla__Contenido'>".$row["Nombre_Completo"]."</th>";
              echo "<th class='tabla__Contenido'>".$row["Cargo"]."</th>";
              echo "<th class='tabla__Contenido'>".$row["Fecha_de_Postulacion"]."</th>";
              echo "<th class='tabla__Contenido'>".$row["Estado"]."</th>";
              //echo "<th class='tabla__Contenido'>".$row["ID_Postulante"]."</th>";
              // echo "<th class='tabla__Contenido'>".$row["ID_Postulante"]."</th>";
              echo "
    <th class='tabla__Contenido'>
        <div class='cambio9' onclick=\"window.location.href='../2. Listas/experiencia.php?enviar=".$row["ID_Postulante"]."'\">Experiencia</div>
    </th>";


            //  if(array_intersect_assoc($row['Estado'],'Aceptado') || array_intersect_assoc($row['Estado'],'Revisado')){
             if(($row["Estado"]=='Aceptado') ||($row["Estado"]=='Revisado')){
            
               echo "
               <th class='tabla__Contenido'>
                  <button  class='cambio2' type='submit' >
                    <a class='entrevista'  href='programar_entrevista.php?id_postulante=".$row['ID_Postulante'] . "'>Programar Entrevista</a>
                  </button>
               </th>";
              
              
              }else{
                echo "<th class='tabla__Contenido'>No cumple requisitos para la entrevista</th>";
               

            }

        

        
          echo "</tr>";
        ?>
        </tr>
        <?php
          }
        }
        ?>
      <button type='submit'></button>
      </tbody>
    </table>
  </div>
  <!--generar pdf-->
  <!-- <div  class="pantallaPrincipal__ContDer__Titulo__Volver cambio1" id="crearPDF">
    Generar Reporte PDF
  </div> -->
</div>
<!-- ----------------------------------------------------------------------------------------------------------------- -->
<!-- <script src="html2pdf.bundle.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" integrity="sha512-234m/ySxaBP6BRdJ4g7jYG7uI9y2E74dvMua1JzkqM3LyWP43tosIqET873f3m6OQ/0N6TKyqXG4fLeHN9vKkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="jspdf.plugin.autotable.min.js"></script>
  <script>
    const botonGenerarPDF = document.getElementById('crearPDF');

    botonGenerarPDF.addEventListener('click', () => {
      const doc = new jsPDF();
      doc.text('Lista de Vacantes', 10, 10);
      
      const elementoTabla = document.getElementById('generarPDF_deEsto');
      doc.autoTable({ html: elementoTabla });
      
      doc.save('documento.pdf');
    });
  </script>

<!-- ----------------------------------------------------------------------------------------------------------------- -->
<script>
// -------------------------------------------------------------------------------------
// Generar PDF

// -------------------------------------------------------------------------------------
  document.addEventListener('DOMContentLoaded', function() {
    ctrl_listavacante.mostrarListaEntrevista(); 
  });

  document.addEventListener('DOMContentLoaded', function() {
    const botonBuscar = document.querySelector('button');
    const inputBusqueda = document.getElementById('id_busqueda');

    botonBuscar.addEventListener('click', function() {
      const valorBusqueda = inputBusqueda.value.trim().toLowerCase();

      // Filtrar las filas de la tabla según el valor de búsqueda
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