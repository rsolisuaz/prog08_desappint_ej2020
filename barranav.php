<?php 
  // Determinamos el nombre del script que se esta cargando en este momento
  $archactual=basename($_SERVER["SCRIPT_NAME"]);

  // Esta funcion regresa un string "#" si $nomarch es el nombre del archivo actual, de otro manera regresa el valor que tenga $nomarch
  function urlausar(string $nomarch) : string {
    global $archactual;
    if ($archactual==$nomarch) {
      return "#";
    }
    else return $nomarch;
  }

  // Esta funcion regresa un string con el texto active si $nomarch es el nombre del archivo actual, de otro manera regresa una cadena vacia
  function urlactivo(string $nomarch) : string {
    global $archactual;
    if ($archactual==$nomarch) {
      return "active";
    }
    else return "";
  }
  
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">Control de Préstamo de Películas de <?php echo $matricula; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barranavegacion" aria-expanded="false" aria-controls="barranavegacion" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="barranavegacion">
        <ul class="navbar-nav">
          <li class="nav-item <?php echo urlactivo('index.php'); ?>">
            <a class="nav-link" href="<?php echo urlausar('index.php'); ?>">Home</a>
          </li>
          <li class="nav-item <?php echo urlactivo('usuarios.php'); ?>">
            <a class="nav-link" href="<?php echo urlausar('usuarios.php'); ?>">Usuarios</a>
          </li>
          <li class="nav-item <?php echo urlactivo('actores.php'); ?>">
            <a class="nav-link" href="<?php echo urlausar('actores.php'); ?>">Actores</a>
          </li>
          <li class="nav-item <?php echo urlactivo('peliculas.php'); ?>">
            <a class="nav-link" href="<?php echo urlausar('peliculas.php'); ?>">Películas</a>
          </li>
          <li class="nav-item <?php echo urlactivo('prestamos.php'); ?>">
            <a class="nav-link" href="<?php echo urlausar('prestamos.php'); ?>">Préstamos</a>
          </li>          
        </ul>
        
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
              </li>
          </ul>
        
      </div>

  </nav>