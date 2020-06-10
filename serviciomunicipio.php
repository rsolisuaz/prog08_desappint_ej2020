<?php

// Clase para manejar las operaciones requeridas para el manejo de municipios
// NOTA: Hay que modificar el codigo para que se hagan uso de excepciones y asi evitar enviar al cliente mensajes de error 
class ServicioMunicipio {
	// Variable que contendra el PDO a usar
    private $db;

    // Constructor de la clase
    public function __construct() {
        $this->db = MiPDO::getInstance();
    }

    // Este metodo devuelve un arreglo con los municipios de la entidad cuyo
    // id es proporcionado como argumento
    public function obtenMunicipios($identidad) {  
    	$sql = "SELECT * FROM municipio WHERE id_municipio DIV 1000 = :ident";      
        $args = array();
        $args[":ident"]=$identidad;
        $datos = $this->db->run($sql, $args)->fetchAll();
        return $datos;
    }
}
?>