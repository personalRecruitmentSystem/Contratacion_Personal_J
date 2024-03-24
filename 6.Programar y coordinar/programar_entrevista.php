
<?php
        include("../conexion.php");

$idPostulante = $_GET['id_postulante'];

//echo "<input type='hidden' name='id' value='$id'>";
?>
<DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pantalla_entrevista_Estilos.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A300%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C700"/>
    <title>Entrevista </title>
</head>
<body>
    
    <br>

    <br>
    <!--<form class="contenedor_entrevista"  action="listado_entrevista.php" method="POST"> -->
    <form class="contenedor_entrevista"  action="consulta_programa_entrevista.php" method="POST">
    <h2> CRONOGRAMA DE ENTREVISTA </h2><br><br>
        <label for="">SELECCIONAR LA FECHA DE LA ENTREVISTA:</label>

        <input type="date" id="fecha_entrevista" name="fecha_entrevista" value="2018-07-22" min="2000-01-01" max="2050-12-31" required/><br>

        <br>
        <br>

        <label for="appt">INTRODUZCA LA HORA DE LA ENTREVISTA:</label>

        <input type="time" id="hora_entrevista" name="hora_entrevista" min="08:00:00" max="19:00:00" required />

        <br>
        <!--<input type="hidden" name="id" value='$id_postulante'> -->
        <br>


        <input type="hidden" name="id_hidden" value="<?php echo $idPostulante; ?>">
       
        <br>
         <button  class ='cambio2' type='submit'> guardar programacion</button><br>

       
</form>

      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" integrity="sha512-234m/ySxaBP6BRdJ4g7jYG7uI9y2E74dvMua1JzkqM3LyWP43tosIqET873f3m6OQ/0N6TKyqXG4fLeHN9vKkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="jspdf.plugin.autotable.min.js"></script>
</body>
</html>
