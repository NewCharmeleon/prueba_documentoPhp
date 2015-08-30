<script type="text/javascript">
//Funcion para validar campos vacios
function validarFormulario(formulario) {
	if (formulario.nombre.value.length=0){
		formulario.nombre.focus();
		alert('No se ingreso un nombre');
		return false;
	}
	return true;
}
</script>