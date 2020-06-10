/* FUNCIONES RELACIONADAS CON EL LOGIN */
// Esta funcion envia la informacion de usuario y clave de manera asincrona
// enviando la clave como hash SHA256
function verificalogin() {	
	var valido = true;
	$("#errorlogin").html("");
	// Deberia verificarse que se haya introducido usuario y clave
	// de otra manera hay que mostrar de manera visual advertencias
    if (valido) {
    	var bitarray = sjcl.hash.sha256.hash($("#claveusuario").val());
    	datos = {
    		usuario:$("#cuentausuario").val(),
    		clave:sjcl.codec.hex.fromBits(bitarray)
    	}
	
    	$.post('verificalogin.php',datos,respuestaLogin).fail(
    		function() {
    			$("#errorlogin").html("No se pudo hacer login")
    		})
    } 
}

// Esta funcion maneja la respuesta de verificalogin.php
function respuestaLogin(datos) {
	if (datos.indexOf("ERROR")!=-1) {
		// Si en la respuesta viene el texto ERROR mostramos un mensaje con el error
		// particular en el div con id errorlogin
		var partes = datos.split("&");		
		$("#errorlogin").html(partes[1]);
	}
	else { // De otra manera, redireccionamos a index.php 
		location.assign("index.php");		
	}
}



/* FUNCIONES RELACIONADAS CON USUARIOS */

// Esta funcion debe deshabilitar/habilitar todos los campos de la forma
// cuyo ID es dado como primer argumento, el segundo argumento es un booleano
// que indica si se deshabilita (true) o se habilita (false)
// ademas de ocultar (si el segundo argumento es true) los botones de agregar y cancelar
// o mostrarlos (si el segundo argumento es false)
// Los campos a deshabilitar/habilitar son los campos de texto de la forma, los select 
// que no sean la lista de usuarios, actores o peliculas y los botones nuevo, modificar y eliminar
function deshabilitaCampos(idforma,bandera) {
	
}

// Esta funcion se encarga de solicitar de manera asincrona la informacion del
// usuario seleccionado en el Select de usuarios (usando POST y asumiendo que
// la respuesta estará en formato JSON)
function obtenInfoUsuario() {
	
}

// Esta funcion se encarga de llenar los campos de la forma
// con la informacion enviada por el servidor para el usuario seleccionado
function llenacamposusuario(datojson) {
	$("#nombre").val(
		datojson.nombre)
	$("#ap_paterno").val(
		datojson.ap_paterno)
	$("#ap_materno").val(
		datojson.ap_materno)
	$("#RFC").val(
		datojson.RFC)
	$("#email").val(
		datojson.email)
	$("#calle").val(
		datojson.calle)
	$("#colonia").val(
		datojson.colonia)
	$("#codpostal").val(
		datojson.codpostal)
	$("#telefono").val(
		datojson.telefono)
	var entactual=$("#entidad option:selected").val();
	// En caso de que la entidad a cargar no sea la que ya se este mostrando
	if (entactual != datojson.id_entidad) {
		// seleccionamos la entidad del usuario que se acaba de seleccionar
		$("#entidad").prop("selectedIndex",
			datojson.id_entidad-1)
		// y procedemos a solicitar los municipios de la entidad del usuario seleccionado
		// indicando en la solicitud el ID de la entidad y el ID del municipio
		var datos = {
			ident: datojson.id_entidad,
			idmun: datojson.id_municipio
		}
		$.get("obtenmuns.php",datos,
		llenaMunicipios).fail(function() {
		     console.log("error al contactar servicio municipios")
		 })

	}
	else { // Es la misma entidad que ya estaba cargada, solo seleccionamos el municipio adecuado
		$("#municipio").prop("selectedIndex",
			datojson.id_municipio%1000-1)
	}
	// Habilitamos los botones de modificar y eliminar
	$(".deshabilitable").prop("disabled",false)
}

// Esta funcion solicita los municipios de la entidad seleccionada por el usuario
// al servidor
function cambiaMunicipios() {
	var entactual=$("#entidad option:selected").val();
	var datos = {
		ident: entactual
	}
	$.get("obtenmuns.php",datos,
		llenaMunicipios).fail(function() {
		     console.log("error al contactar servicio municipios")
		 })
}

// Esta funcion pone los nuevos datos en el select de municipio
// Se asume que la respuesta ya viene en forma de etiquetas option
function llenaMunicipios(dato) {
	$("#municipio").html(dato)
}

// Esta funcion limpia los campos de la forma indicada cuyo ID es dado como argumento
// los campos de texto deben ser limpiadas y en los select (que no sean la lista de usuarios,
// actores o peliculas) debe indicarse que no este seleccionado nada
function limpiaCampos(idforma) {
	
}

// Esta funcion limpia los campos de la forma con los datos del usuario, 
// los deshabilita, muestra los botones de Agregar y Cancelar,
// limpia la selección de la lista de usuarios, la deshabilita y
// deshabilita los botones a la derecha de la lista de usuarios
function nuevoUsuario() {
	
}

// Esta funcion habilita los campos de la forma de los datos del usuario,
// a excepcion del RFC que es la llave primaria, muestra los botones de Actualizar
// y cancelar, deshabilita la lista de usuarios y 
// deshabilita los botones a la derecha de la lista de usuarios
// NOTA: El boton de Agregar y Actualizar es el mismo pero con texto diferente
function modificaUsuario() {
	
}

// Esta funcion cancela los cambios realizados en los campos de la forma
// de usuario, limpiando los campos, deshabilitandolos, habilitando el boton nuevo
// así como la lista de usuarios
// Ademas, en caso de que se estuvieran modificando los datos de un usuario existente
// debe regresar a los campos los datos originales 
function cancelaUsuario() {
	
}

// Esta funcion muestra el cuadro de dialogo para confirmar la eliminacion de un usuario
function confirmaElimUsuario() {
	$("#modal_confirma_elimina").modal("show")

}

// Esta funcion muestra el cuadro de dialogo para confirmar la cancelacion 
// de las modificaciones hechas en los campos de la forma de usuario
function confirmaCancelaUsuario() {
	$("#modal_confirma_cancela").modal("show")
}

//Esta funcion oculta el cuadro de dialogo de confirmacion de eliminacion
// y solicita al servidor la eliminacion del usuario seleccionado
function eliminaUsuario() {
	
}

// Esta funcion debe ejecutarse al recibir la respuesta a la peticion
// de eliminacion del usuario y en caso de haber sido eliminado por parte del servidor
// entonces proceder a quitarlo del select de usuarios
function quitausuario(respuesta) {
	
}


// Este metodo toma la informacion de los campos de la forma de usuario y crea un objeto
// JSON con esos datos, se procede entonces a solicitar al servidor agregar (o actualizar 
// segun sea el caso) al usuario 
function guardaUsuario() {
	// Primero se deben validar que los campos obligatorios
	// esten presentes y que los campos tengan datos consistentes
	// con el tipo de campo y posibles valores
	var rfc=$("#RFC").val()
	var script="agregausuario.php"
	var frespuesta=agreganuevousuario
	if ($("#usuarios").prop("selectedIndex")!=-1) {
		rfc = $("#usuarios option:selected").val()
		script="actualizausuario.php"
		frespuesta=actualizausuario
	}
	//El siguiente codigo para crear el objeto JSON con la informacion
	//del usuario debe modificarse para tomar en cuenta que hay 
	//campos opcionales que pudieran no tener datos
	var datos = {
		RFC:rfc,
		nombre: $("#nombre").val(),
		ap_paterno: $("#ap_paterno").val(),
		ap_materno: $("#ap_materno").val(),
		email: $("#email").val(),
		calle: $("#calle").val(),
		colonia: $("#colonia").val(),
		id_municipio: $("#municipio option:selected").val(),
		id_entidad: $("#entidad option:selected").val(),
		codpostal: $("#codpostal").val(),
		telefono: $("#telefono").val(),
	}
	var info="info="+JSON.stringify(datos)

	// FALTA SOLICITAR LA EJECUCION DEL SCRIPT EN EL SERVIDOR

}

// Esta funcion se ejecuta al recibir la respuesta de la solicitud al servidor
// de agregar un nuevo usuario, si en efecto se pudo agregar por parte del servidor
// es necesario ahora agregarlo al select, limpiar y dehabilitar los campos de la forma
// ocultar los botones de agregar y cancelar,
// habilitar la lista de usuarios y habilitar el boton de nuevo
function agreganuevousuario(respuesta) {
	
}

// Esta funcion se ejecuta al recibir la respuesta de la solicitud al servidor
// de actualizar un usuario, si en efecto se pudo actualizar por parte del servidor
// es necesario ahora reflejar el cambio en el elemento seleccionado del select
// de usuarios, limpiar y dehabilitar los campos de la forma
// ocultar los botones de actualizar y cancelar,
// habilitar la lista de usuarios haciendo que nada este seleccionado 
// y habilitar el boton de nuevo
function actualizausuario(respuesta) {
	
}


