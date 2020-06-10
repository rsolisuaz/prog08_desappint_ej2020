<?php
  // Verifica que haya una sesión activa, si no es así redireccionar a login.php
  include "config.php";
  include "MiPDO.php";
  include "headdoc.php";
?>

<body>
  <?php
    $nomfuncioneliminar="eliminaActor";
    $nomfuncioncancelar="cancelaActor";
    include "modaleliminar.php";
    include "modalcancelar.php";
    include "barranav.php";
  ?>
  <main class="container">
    <div class="py-4">      
      <form id="formaactores" onsubmit="return false">
      <div class="row">
        <div class="col">
          <h5>Información del Actor</h5>
        </div>
      </div>
    </form>


    </div>
  </main>

  <?php
  include "footer.php";
  ?>

  <script>
    $(document).ready(function() {
        deshabilitaCampos("#formaactores",true)
        $("#botonnuevoactor").prop("disabled",false)
    })
  </script>
</body>

</html>
