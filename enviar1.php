<?php
/*====================================================================+
|| # Encuesta Elecciones Valparaiso - Desarrollo Web 2016 - Universidad de Valparaíso
|+====================================================================+
|| # Copyright © 2016 Felipe Allendes. All rights reserved.
|| # https://github.com/allendesfelipe/encuesta_prueba
|+====================================================================*/

// Función para evitar inyecciones
function Filtro($texto) {
  return htmlspecialchars(trim($texto), ENT_QUOTES);
}



// Variables
$directorio = 'C:/wamp/www/FormularioPHP/assets/';
$extension = explode('.', $_FILES['foto']['name']);
$nombre_foto = time() . '.' . $extension[1];

$enviado = isset($_POST['enviado']) ? (int) $_POST['enviado'] : 0;
$contenido = isset($_POST['contenido']) ? (int) $_POST['contenido'] : 0;
$aniona = isset($_POST['aniona']) ? (int) $_POST['aniona'] : 0;
$region = isset($_POST['region']) ? Filtro($_POST['region']) : '';
$candidatoal = isset($_POST['candidatoal']) ? Filtro($_POST['candidatoal']) : '';
$candidatocon = isset($_POST['candidatocon']) ? Filtro($_POST['candidatocon']) : 0;
$terminos = isset($_POST['terminos']) ? (int) $_POST['terminos'] : 0;
$terminos2 = isset($_POST['terminos2']) ? (int) $_POST['terminos2'] : 0;
$comuna = isset($_POST['comuna']) ? Filtro($_POST['comuna']) : '';
$nombre = isset($_POST['nombre']) ? Filtro($_POST['nombre']) : '';
$RUT = isset($_POST['RUT']) ? Filtro($_POST['RUT']) : '';
$correo = isset($_POST['correo']) ? Filtro($_POST['correo']) : '';
$descripcion = isset($_POST['descripcion']) ? Filtro($_POST['descripcion']) : '';
$sexo = isset($_POST['sexo']) ? Filtro($_POST['sexo']) : '';

$error = '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Proyecto para enseñar el funcionamiento de un formulario en PHP">
  <meta name="keywords" content="html, bootstrap, php, formulario, desarrollo, web">
  <meta name="author" content="Felipe Allendes">
  <title>Formulario enviado.</title>
  <!-- CSS -->

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <!--
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css"> -->
</head>
<body>
<div class="container">
  <span style="padding-top: 10px;"></span>

<?php
// Mostrar contenido
if(is_numeric($_POST['RUT']) == 0){
$error = 'Por favor, ingrese RUT correcto';
}
if($enviado == 1 && $contenido == 1) {
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  exit;

} else if(empty($nombre)) {
  $error = 'Por favor, ingrese su nombre.';
} else if(empty($RUT)) {
  $error = 'Por favor, ingrese su RUT.';
} else if(empty($correo)) {
  $error = 'Por favor, ingrese su correo electrónico.';
} else if(empty($aniona)) {
  $error = 'Por favor, ingrese su año de nacimiento.';
} else if(empty($region)) {
  $error = 'Por favor, ingrese su region.';
} else if(empty($comuna)) {
  $error = 'Por favor, ingrese su comuna.';
} else if(empty($candidatoal)) {
  $error = 'Por favor, seleccione su candidato a alcalde.';
} else if(empty($candidatocon)) {
  $error = 'Por favor, seleccione su candidato a concejal.';
} else if(empty($descripcion)) {
  $error = 'Por favor, ingrese su descripcion.';
} else if(empty($sexo)) {
  $error = 'Por favor, ingrese su sexo.';
} else if(empty($terminos)) {
  $error = 'Debe aceptar los términos y condiciones para poder seguir.';
} else if(empty($terminos2)) {
  $error = 'Debe aceptar los términos y condiciones para poder seguir.';
}
// Vista de error
if(!empty($error)) {
?>
<div class="alert alert-info">
  <i class="glyphicon glyphicon-info-sign"></i>
  <?php echo $error; ?>
</div>
<a href="./" class="btn btn-warning">
  <i class="glyphicon glyphicon-chevron-left"></i>
  Volver
</a>
<?php
// Vista de éxito
} else {
  // Subir imagen
  move_uploaded_file($foto['tmp_name'], $foto_subida);
?>

  <h3>¡Formulario enviado satisfactoriamente!</h3>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Datos enviados</h3>
    </div>
    <div class="panel-body">
      <p>Bienvenido(a) <b><?php echo $nombre; ?></b>,</p>
      
      <p> Rut : <b><?php echo $RUT; ?></b></p>
      <p>Tu correo electrónico es <b><?php echo $correo; ?></b></p>
      <p>Año de nacimiento : <b><?php echo $aniona; ?></b></p>
      <p>Region : <b><?php echo $region; ?></b></p>
      <p>Comuna : <b><?php echo $comuna; ?></b></p>
      <p>Candidato a alcalde : <b><?php echo $candidatoal; ?></b></p>
      <p>Candidato a concejal : <b><?php echo $candidatocon; ?></b></p>
        Tu descripción es: <br />
        <blockquote>
          <?php echo $descripcion; ?>
        </blockquote>
      </p>

      <p>


      </p>

      <p>
        Tu año de nacimiento es: <b><?php echo $aniona; ?></b>
      </p>
      <p>
        Tu sexo es: <b><?php echo ($sexo == 'm' ? 'Masculino' : 'Femenino'); ?></b>
      </p>
      <p>
        Tu <b><?php echo ($terminos == 1 ? 'sí' : 'no'); ?></b> aceptaste los términos y condiciones.</b>
      </p>
       <p>
        Tu <b><?php echo ($terminos2 == 1 ? 'sí' : 'no'); ?></b> aceptaste los términos y condiciones.</b>
      </p>
    </div>
    <div class="panel-footer">
      <div class="text-right">
        <a href="./" class="btn btn-primary">
          <i class="glyphicon glyphicon-chevron-left"></i>
          Volver
        </a>
      </div>
    </div>
  </div>
<?php } ?>
  <!-- Pie de página -->
  <footer>
    <div class="text-center">
      <i class="glyphicon glyphicon-leaf"></i>
      Desarrollado por <a href="https://github.com/allendesfelipe" target="_blank">Felipe Allendes</a>
    </div>
  </footer>
</div>
</body>
</html>