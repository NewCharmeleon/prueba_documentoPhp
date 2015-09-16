
<?php
	if (!isset($_SESSION)){
	session_start();}
	error_reporting(E_ALL);
	ini_set("display_errors", true);
	
 /*if (!isset($_SESSION)){
		session_start();
}?>
<?php error_reporting(E_ALL);
	ini_set("display_errors", true);*/?>
<?php
	header('Content-Type: text/html; charset=utf-8');
	$apellido= isset($_POST['apellido']) ? $_POST['apellido'] : null;
	$nombre= isset($_POST['nombre']) ? $_POST['nombre'] : null;
	$numeroDocumento= isset($_POST['numeroDocumento']) ? $_POST['numeroDocumento'] : null;
	$sexo= isset($_POST['sexo']) ? $_POST['sexo'] : null;
	$nacionalidad= isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
	//$foto= isset($_POST['foto']) ? $_POST['foto'] : null;
	$domicilio= isset($_POST['domicilio']) ? $_POST['domicilio'] : null;
	$ciudad= isset($_POST['ciudad']) ? $_POST['ciudad'] : null;
	$departamento= isset($_POST['departamento']) ? $_POST['departamento'] : null;
	$provincia= isset($_POST['provincia']) ? $_POST['provincia'] : null;
	$fechaNacimiento= isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : null;
	$lugarNacimiento= isset($_POST['lugarNacimiento']) ? $_POST['lugarNacimiento'] : null;

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
		      REGISTRO NACIONAL DE LAS PERSONAS</h2>
		
	<form action="../paravalidar.php" method="post" class="form-horizontal">
		<fieldset>

			<!-- Form Name -->
			<legend><center>Ingresar datos del Documento</center></legend>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="apellido">Apellido/s: </label>  
					<div class="col-md-4">
						<input title="Ingrese Apellido/s" id="apellido" name="apellido" type="text" placeholder="Ingrese Apellido/s" class="form-control input-md"
							pattern="[a-zA-Záéíóúñ\s]{2,50}" value = "<?php echo $apellido;?>" required >
						<span class="help-block"></span>  
					</div>
			</div>

			<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="nombre">Nombre/s:</label>  
					<div class="col-md-4">
						<input title="Ingrese Nombre/s" id="nombre" name="nombre" type="text" placeholder="Ingrese Nombre/s" pattern="[a-zA-Záéíóúñ\s]{2,50}"
						value = "<?php echo $nombre;?>" required class="form-control input-md">
						<span class="help-block"></span>  
					</div>
				</div>

			<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="numeroDocumento">Numero De Documento:</label>  
						<div class="col-md-4">
							<input title="Ingrese Numero de Documento (8 digitos))" id="numeroDocumento" name="numeroDocumento" type="text" 
								placeholder="Ingrese Numero de Documento" pattern="[0-9]{6,8}"value = "<?php echo $numeroDocumento;?>"
								required class="form-control input-md">
							<span class="help-block"></span>  
						</div>
				</div>

				<!-- Multiple Radios -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="sexo">Sexo:</label>
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
				  <label class="col-md-4 control-label" for="nacionalidad">Nacionalidad:</label>
				  <div class="col-md-4">
					<select id="nacionalidad" name="nacionalidad" class="form-control" ><?php foreach ($nacionalidades as $nacionalidad){?>
							<option value="<?php echo $nacionalidad;?>"><?php echo $nacionalidad;?></option>
							<?php };?>
					</select>
				  </div>
				</div>

				<!-- File Button --> 
				<div class="form-group">
				  <label class="col-md-4 control-label" for="archivo">Archivos Externos del Ciudadano:</label>
				  <div class="col-md-4">
					<input title="Debe adjuntar archivos .jpg o .bmp : Foto, Firma y Digito Pulgar " placeholder="Adjuntar archivo permitidos:.jpg o .bmp : Foto, Firma y Digito Pulgar "
							multiple= true id="archivo" name="archivo" class="input-file" type="file">
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="fechaActual">Fecha De Expedicion:</label>  
				  <div class="col-md-4">
				  <input id="fechaActual" name="fechaActual" type="date" name="fechaActual"value="<?php $fechaActual=date('d-m-Y'); 
							echo $fechaActual;?>" disabled=true class="form-control input-md">
				  <span class="help-block"></span>  
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="fechaVenc">Fecha De Vencimiento:</label>  
				  <div class="col-md-4">
				  <input id="fechaVenc" name="fechaVenc" type="date" name="fechaVenc"
								   value="<?php $fechaVenc= date('d-m-Y',strtotime('+15 Year'));
									echo $fechaVenc; ?>" disabled=true class="form-control input-md">
				  <span class="help-block"></span>  
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="domicilio">Domicilio:</label>  
				  <div class="col-md-4">
				  <input title="Debe ingresar Domicilio" id="domicilio" name="domicilio" type="text" placeholder="Ingrese Domicilio"
				  pattern="[0-9a-zA-Záéíóúñ\s]{5,50}" value = "<?php echo $domicilio;?>"
							required class="form-control input-md">
				  <span class="help-block"></span>  
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textinput">Ciudad:</label>  
				  <div class="col-md-4">
				  <input title="Debe ingresar Ciudad" id="textinput" name="ciudad" type="text" placeholder="Ingrese Ciudad" pattern="[a-zA-Záéíóúñ]{2,30}"	
				  value = "<?php echo $ciudad;?>"
							required class="form-control input-md">
				  <span class="help-block"></span>  
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textinput">Departamento:</label>  
				  <div class="col-md-4">
				  <input title="Debe ingresar Departamento" id="textinput" name="departamento" type="text" placeholder="Ingrese Departamento" pattern="[a-zA-Záéíóúñ\s]{2,30}" 	
				  value = "<?php echo $departamento;?>"
							required class="form-control input-md">
				  <span class="help-block"></span>  
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="provincia">Provincia:</label>
				  <div class="col-md-4">
					<select id="provincia" name="provincia class="form-control"><?php foreach ($provincias as $provincia){?>
							<option value="<?php echo $provincia;?>"><?php echo $provincia;?></option>
							<?php };?>
					</select>
				  </div>
				</div>

				<!-- Select Basic-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="fechaNacimiento">Fecha de Nacimiento: </label>  
				  <div class="col-md-4">
				 <select name="dia">
								<?php
									for ($i=1; $i<=31; $i++){
										if($i==date('d')){
											echo '<option value="'.$i.'" selected>'.$i.'</option>';
										}else{
											echo '<option value="'.$i.'">'.$i.'</option>';
									}}
								?>
							</select>	
							<select name="mes">
								<?php
									for ($i=1; $i<=12; $i++){
										if($i==date('m')){
											echo '<option value="'.$i.'" selected>'.$i.'</option>';
										}else{
											echo '<option value="'.$i.'">'.$i.'</option>';
									}}
									?>
							</select>	
							<select name="anio">
								<?php
									for ($i=date('o'); $i>=1900; $i--){
										if($i==date('o')){
											echo '<option value="'.$i.'" selected>'.$i.'</option>';
										}else{
											echo '<option value="'.$i.'">'.$i.'</option>';
									}}
									?>
							</select>	  
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="lugarNacimiento">Lugar de Nacimiento:</label>  
				  <div class="col-md-4">
				  <input title="Debe ingresar Lugar de Nacimiento" id="lugarNacimiento" name="lugarNacimiento" type="text" placeholder="Ingrese Lugar de Nacimiento"  name="lugarNacimiento"
							pattern="[a-zA-Záéíóúñ\s]{2,30}" 	value = "<?php echo $lugarNacimiento;?>"
							required class="form-control input-md">
				  <span class="help-block"></span>  
				  </div>
				</div>
				<input id="action" type="hidden" name="action" value="insert"/>
					<input type="submit" value="Enviar Datos" >
			</fieldset>
			</form>
		</div>
	</body>
</html>