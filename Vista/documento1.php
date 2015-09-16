<?php
<?php session_start();?>
<?php error_reporting(E_ALL);
ini_set("display_errors", true);?>

header('Content-Type: text/html; charset=utf-8');
require_once ('paravalidar.php');
/*$nacionalidades = array("Seleccione su Nacionalidad: ", "Argentina", "Extranjero");
$provincias = array('Seleccione una provincia: ', 'Buenos Aires', 'Catamarca', 
	'Chaco','Chubut','Córdoba', 'Corrientes', 'Entre Ríos', 'Formosa', 'Jujuy', 
	'La Pampa','La Rioja', 'Mendoza', 'Misiones', 'Neuquén', 'Río Negro', 'Salta',
	'San Juan','San Luis', 'Santa Cruz', 'Santa Fé', 'Santiago del Estero',
	'Tierra del Fuego', 'Tucumán');*/


/*
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
//
if(isset($_SESSION["datos"])){
	$apellido = @$_SESSION["datos"]["apellido"];
	$nombre = @$_SESSION["datos"]["nombre"];
	$numeroDocumento = @$_SESSION["datos"]["numeroDocumento"];
	$sexo = @$_SESSION["datos"]["sexo"];
	$nacionalidad = @$_SESSION["datos"]["nacionalidad"];
	$domicilio = @$_SESSION["datos"]["domicilio"];
	$ciudad = @$_SESSION["datos"]["ciudad"];
	$departamento = @$_SESSION["datos"]["departamento"];
	$provincia = @$_SESSION["datos"]["provincia"];
	$fechaNacimiento = @$_SESSION["datos"]["fechaNacimiento"];
	$lugarNacimiento = @$_SESSION["datos"]["lugarNacimiento"];
}*/
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
	
		<form action="paravalidar.php" method="post">	
			<fieldset>
			
			Apellido/s: <br> <input title="Ingrese Apellido/s" type="text" name="apellido"
			placeholder= "Ingrese Apellido/s" pattern="[a-zA-Záéíóúñ\s]{2,50}" 
			value = "<?php echo $apellido;?>" required/ ><br>
			
			Nombre/s: <br> <input title="Ingrese Nombre/s" type="text" name="nombre"
			placeholder="Ingrese Nombre/s" pattern="[a-zA-Záéíóúñ\s]{2,50}" 
			value = "<?php echo $nombre;?>" required/><br>
			<label>		
			Numero De Documento: <br> <input title="Ingrese Numero de Documento (8 digitos))"type="text"
			placeholder="Ingrese Numero de Documento" name="numeroDocumento"
			pattern="[0-9]{6,8}"value = "<?php echo $numeroDocumento;?>"
			required/><br>
			
			Sexo: <br><label for="M">Masculino</label><input type="radio" name="sexo" id="M" value="Masculino"  >
			<label for="F">Femenino</label><input type="radio" name="sexo" id="F" value="Femenino"><br>
			<br>
			Nacionalidad: <select name="nacionalidad"> <?php foreach ($nacionalidades as $nacionalidad){?>
			<option value="<?php echo $nacionalidad;?>"><?php echo $nacionalidad;?></option>
			<?php };?>	
			</select>
			<br>
			Archivos Externos del Ciudadano: (Foto-Firma-Digito Pulgar): <br><input title="Debe adjuntar archivos .jpg o .bmp : Foto, Firma y Digito Pulgar " type="file" 
			placeholder="Adjuntar archivo permitidos:.jpg o .bmp : Foto, Firma y Digito Pulgar "
			multiple= true name="archivo" ><br>		
			Fecha De Expedicion:<br>
			<input type="date" name="fechaActual"value="<?php $fechaActual=date('d-m-Y'); 
			echo $fechaActual;?>" disabled=true />
			<br>			
			Fecha De Vencimiento: <br>
			<input type="date" name="fechaVenc"
			       value="<?php $fechaVenc= date('d-m-Y',strtotime('+15 Year'));
					echo $fechaVenc; ?>" disabled=true/>
			<br>
			Domicilio: <br>
			<input title="Debe ingresar Domicilio" type="text"
			placeholder="Ingrese Domicilio"	   name="domicilio"
			pattern="[0-9a-zA-Záéíóúñ\s]{5,50}" value = "<?php echo $domicilio;?>"
			required/>
			<br>
			Ciudad: <br>
			<input title="Debe ingresar Ciudad" type="text"
			placeholder="Ingrese Ciudad"	   name="ciudad"
			pattern="[a-zA-Záéíóúñ]{2,30}"	value = "<?php echo $ciudad;?>"
			required/>
			<br>
			Departamento: <br>
			<input title="Debe ingresar Departamento" type="text"
			placeholder="Ingrese Departamento"	   name="departamento"
			pattern="[a-zA-Záéíóúñ\s]{2,30}" 	value = "<?php echo $departamento;?>"
			required/>
			<br>
			Provincia: <br>
			<select name="provincia"> <?php foreach ($provincias as $provincia){?>
			<option value="<?php echo $provincia;?>"><?php echo $provincia;?></option>
			<?php };?>
			</select>
			<br>
			Fecha de Nacimiento: <br>
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
			<br>			
			Lugar de Nacimiento: <br>
			<input title="Debe ingresar Lugar de Nacimiento" type="text"
			placeholder="Ingrese Lugar de Nacimiento"  name="lugarNacimiento"
			pattern="[a-zA-Záéíóúñ\s]{2,30}" 	value = "<?php echo $lugarNacimiento;?>"
			required/>
			<br>
			<input id="action" type="hidden" name="action" value="insert"/>
			<input type="submit" value="Enviar Datos" >
			</fieldset>
		</form>
	
			

	</div>
	</body>
</html>
