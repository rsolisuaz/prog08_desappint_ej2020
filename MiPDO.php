<?php 
// Singleton para conectarse a base de datos usando PDO (Portable Data Objects)
// Singleton es un patron de diseño que solo crea una instancia/objeto de una clase
// en particular y reutiliza ese objeto en las subsecuentes peticiones
class MiPDO {
  // Guardamos referencia a la instancia.
  private static $instancia = null;
  private $pdo; // Atributo PDO para acceder a la base de datos
   
  // Se establece la conexion a la base de datos en constructor privado.
  private function __construct($host,$user,$pass,$name) {
    $dsn = "mysql:host=$host;dbname=$name";
    $opciones = array(
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'", 
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $this->pdo = new PDO($dsn, $user,$pass, $opciones);
  }
  
  // Este método devuelve la instancia única de la clase
  public static function getInstance() {
    global $hostdb, $usuariodb, $clavedb, $nombredb;
    if(!self::$instancia) {
      self::$instancia = new MiPDO($hostdb, $usuariodb, $clavedb, $nombredb);
    }
    return self::$instancia;
  }
  
  // Metodo para ejecutar sentencias preparadas de manera facil
  // Recibe como argumentos un string con la consulta SQL a realizar
  // y un arreglo opcional con los argumentos a sustituir si es una consulta preparada
  public function run($sql, $args = []) {
    // Si no nos pasan argumentos
    if (!$args) { // asumimos que la consulta no tiene nada que sustituir, la ejecutamos
      return $this->pdo->query($sql);  // y regresamos el resultado
    }
    // Preparamos la consulta
    $stmt = $this->pdo->prepare($sql);
    // Y la ejecutamos indicando el arreglo asociativo con los datos a sustituir
    $stmt->execute($args);
    // Regresamos la sentencia resultante
    return $stmt;
  }

  // exponemos la funcionalidad de obtener el ultimo ID insertado
  // util en el caso de campos autoincrementables
  public function lastInsertId() {
    return $this->pdo->lastInsertId();
  }
}
?>