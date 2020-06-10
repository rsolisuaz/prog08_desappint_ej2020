<?php
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
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Entrar al Sistema</h5>
            <form class="form-signin">
              <div class="form-label-group">
                <input type="text" id="cuentausuario" class="form-control" placeholder="Cuenta de Usuario" required autofocus>
                
              </div>
              <br/>
              <div class="form-label-group">
                <input type="password" id="claveusuario" class="form-control" placeholder="Clave" required>
                
              </div>
              <br/>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onclick="verificalogin()">Entrar</button>
              <br>
              <div id="errorlogin" class="errormsg">
              </div>
      
            </form>
          </div>
        </div>
      </div>
    </div>
 
</main>
<?php
  include "footer.php";
?>
  <script src="js/sjcl.js"></script>
</body>

</html>
