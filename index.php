<?php
  session_start();
  if (!isset($_SESSION["usuario"])) {
     header("Location: login.php");
     exit(0);
  }
  include "config.php";
  include "headdoc.php";
?>
<body>
  <?php
    include "barranav.php";
  ?>
  <main class="container">
    <div class="jumbotron">
      <div class="row">
        <div class="row container">
            <div class="col-md-8">
              <h1 class="display-3">Control de Préstamo de Películas</h1>
              <p class="lead">Sistema de control de préstamo de películas de <?= $nombre ?></p>
            </div>
            <div class="col-md-4">
              <img src="images/logo.png" alt="Logo del Sistema de Préstamo" class="img-fluid">
            </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col">
          <p>Seleccione de la barra de navegación lo que quiera administrar</p>
        </div>

      </div>
    </div>
</main>
<?php
  include "footer.php";
?>
  
</body>

</html>
