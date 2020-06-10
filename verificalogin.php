<?php
  session_start();
  if (!isset($_POST["usuario"]) || 
    !isset($_POST["clave"])) {
  	header("Location: login.php");
    exit(0);
  }

  // Aqui debe modificarse la logica para determinar si el usuario
  // y clave son correctos usando la base de datos.
  // Por el momento se compara con datos estaticos
  $usuario_valido = "DesApp";
  $clave_valida=hash("sha256","UAZej2020");
  if ($_POST["usuario"]!=$usuario_valido ||  
      $_POST["clave"]!=$clave_valida) {
      echo "ERROR&Datos Inválidos";
  }
  else {
      $_SESSION["usuario"]=$_POST["usuario"];  
      echo "EXITO";
  }
?>
