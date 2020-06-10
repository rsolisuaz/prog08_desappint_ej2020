<?php

// Clase para manejar las operaciones requeridas para el manejo de entidades
// NOTA: Hay que modificar el codigo para que se hagan uso de excepciones y asi evitar enviar al cliente mensajes de error 
class ServicioEntidad {
	// Variable que contendra el PDO a usar
    private $db;

    public function __construct() {
        $this->db = MiPDO::getInstance();
    }

    // Metodo que devuelve un arreglo con las entidades de la tabla entidad (cada elemento del arreglo con las dos columnas de la tabla)
    public function obtenEntidades() {  
    	$sql = "SELECT * FROM entidad";      
        $datos = $this->db->run($sql)->fetchAll();
        return $datos;
    }
}
?>