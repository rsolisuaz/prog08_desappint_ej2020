<?php

// Clase para manejar las operaciones requeridas para el manejo de usuarios

// NOTA: Hay que modificar el codigo para que se hagan uso de excepciones y asi evitar enviar al cliente mensajes de error 
class ServicioUsuario {
	// Variable que contendra el PDO a usar
    private $db;

    // Constructor de la clase
    public function __construct() {
        $this->db = MiPDO::getInstance();
    }

    // Este metodo devuelve un arreglo con los datos obtenidos en la consulta
    public function obtenUsuarios() {  
    	
    }

    // Este metodo elimina el usuario con el RFC dado como argumento
    // y devuelve un booleano que indica si se pudo o no eliminar
    public function eliminaUsuario($rfc) {
        // Previo a realizar la eliminacion del usuario se deberia 
        // verificar que no hay registros en otras tablas (bitacora_prestamo) asociados con este usuario, si los hay, no deberia borrarse
        
    }

    // Este metodo actualiza la informacion de un usuario, se asume que la información viene en formato JSON
    // y devuelve un booleano que indica si se pudo o no actualizar
    public function actualizaUsuario($info) {
        
    }

    // Este metodo agrega la informacion de un usuario, se asume que la información viene en formato JSON
    // y devuelve un booleano que indica si se pudo o no agregar
    public function agregaUsuario($info) {
        
    }

    // Este metodo devuelve la informacion de un usuario (cuyo RFC es dado como argumento) en formato JSON, por lo cual conviene obtener la información de la base de datos como arreglo asociativo
    // En caso de que el usuario no exista, regresar una cadena vacia
    public function obtenInfoUsuario($rfc) {
        
    }
}
?>