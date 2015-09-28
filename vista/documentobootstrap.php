<?php
<?php session_start();?>
<?php error_reporting(E_ALL);
ini_set("display_errors", true);?>

header('Content-Type: text/html; charset=utf-8');
require_once ('paravalidar.php');
$nacionalidades = array("Seleccione su Nacionalidad: ", "Argentina", "Extranjero");
$provincias = array('Seleccione una provincia: ', 'Buenos Aires', 'Catamarca', 
	'Chaco','Chubut','Córdoba', 'Corrientes', 'Entre Ríos', 'Formosa', 'Jujuy', 
	'La Pampa','La Rioja', 'Mendoza', 'Misiones', 'Neuquén', 'Río Negro', 'Salta',
	'San Juan','San Luis', 'Santa Cruz', 'Santa Fé', 'Santiago del Estero',
	'Tierra del Fuego', 'Tucumán');

?>	

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Formulario de validación de solicitud de Documento</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
		<h2>Registro Nacional de las personas</h2>
	</head>
	<body>
		<div class="jumbotron">
		<h2>  REPUBLICA ARGENTINA - MERCOSUR
		    DOCUMENTO NACIONAL DE IDENTIDAD
		      REGISTRO NACIONAL DE LAS PERSONAS</h2>nombre
		<?php	echo ($_SESSION["datos"]["provincia"]);//?>
		<?php if(isset($errores)):?>
			<?php foreach($errores as $err):?>
				<p>* <?php echo $err;?>
			<?php endforeach;?>
		<?php endif;?>
		<?php if(isset($datos)):?>
			<?php foreach($datos as $dato):?>
				<p>* <?php echo $dato;?>
			<?php endforeach;?>
		<?php endif;?>


<form action="paravalidar.php" method="post" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Datos Documento</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="apellido">Text Input</label>  
  <div class="col-md-4">
  <input title="Ingrese Apellido/s" id="apellido" name="apellido" type="text" placeholder="Ingrese Apellido/s" class="form-control input-md"
	pattern="[a-zA-Záéíóúñ\s]{2,50}" value = "<?php echo $apellido;?>" required/ >
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Text Input</label>  
  <div class="col-md-4">
  <input id="nombre" name="nombre" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="numeroDocumento">Text Input</label>  
  <div class="col-md-4">
  <input id="numeroDocumento" name="numeroDocumento" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sexo">Multiple Radios</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="sexo-0">
      <input type="radio" name="sexo" id="sexo-0" value="M" checked="checked">
      Masculino
    </label>
	</div>
  <div class="radio">
    <label for="sexo-1">
      <input type="radio" name="sexo" id="sexo-1" value="F">
      Femenino
    </label>
	</div>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="nacionalidad">Select Basic</label>
  <div class="col-md-4">
    <select id="nacionalidad" name="nacionalidad" class="form-control">
    </select>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="archivo">File Button</label>
  <div class="col-md-4">
    <input id="archivo" name="archivo" class="input-file" type="file">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fechaActual">Text Input</label>  
  <div class="col-md-4">
  <input id="fechaActual" name="fechaActual" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fechaVenc">Text Input</label>  
  <div class="col-md-4">
  <input id="fechaVenc" name="fechaVenc" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="domicilio">Text Input</label>  
  <div class="col-md-4">
  <input id="domicilio" name="domicilio" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Text Input</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Text Input</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ciudad">Text Input</label>  
  <div class="col-md-4">
  <input id="ciudad" name="ciudad" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Text Input</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="departamento">Text Input</label>  
  <div class="col-md-4">
  <input id="departamento" name="departamento" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

</fieldset>
</form>
	</div>
	</body>
</html>